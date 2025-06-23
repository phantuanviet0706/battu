<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ImageCaptureController extends Controller
{
    public function captureHtml(Request $request)
    {
        $request->validate([
            'html' => 'required|string',
            'targetWidth' => 'required|integer',
        ]);

        $htmlContent = $request->input('html');
        $targetWidth = $request->input('targetWidth');

        // Lấy đường dẫn wkhtmltoimage từ biến môi trường
        // Đảm bảo bạn đã thêm biến này vào file .env của mình:
        // WKHTMLTOIMAGE_BINARY=/usr/bin/wkhtmltoimage (hoặc đường dẫn chính xác trên server của bạn)
        $wkhtmltoimagePath = env('WKHTMLTOIMAGE_BINARY', '/usr/bin/wkhtmltoimage');

        // KIỂM TRA SỰ TỒN TẠI: Nên làm một lần khi deploy hoặc trong quá trình khởi động ứng dụng
        // Việc kiểm tra File::exists() trên mỗi request có thể gây overhead nhỏ.
        // Tuy nhiên, nếu bạn không chắc chắn về môi trường, việc giữ lại vẫn an toàn hơn.
        // Loại bỏ phần `exec('which wkhtmltoimage')` trong runtime vì nó tốn tài nguyên.
        if (!File::exists($wkhtmltoimagePath)) {
            Log::error('wkhtmltoimage executable not found at configured path.', ['path_attempted' => $wkhtmltoimagePath]);
            return response()->json(['error' => 'WKHTMLTOIMAGE executable not found. Please ensure it is installed and the WKHTMLTOIMAGE_BINARY environment variable is correctly set.'], 500);
        }

        // Tạo thư mục tạm thời nếu chưa có
        $tempDir = storage_path('app/temp/');
        if (!File::exists($tempDir)) {
            File::makeDirectory($tempDir, 0755, true);
        }

        // Tạo file HTML tạm thời trên server
        $tempHtmlFileName = 'temp_' . Str::random(16) . '.html';
        $tempHtmlFilePath = $tempDir . $tempHtmlFileName;

        // --- Đọc nội dung của các file CSS/JS cục bộ để inline ---
        // Việc inline trực tiếp vào HTML thường là cách tốt nhất cho wkhtmltoimage
        // vì nó không cần thực hiện thêm HTTP requests để tải các file này.
        $cssResultContent = '';
        $absoluteCssResultPath = public_path('css/result.css');
        if (File::exists($absoluteCssResultPath)) {
            $cssResultContent = File::get($absoluteCssResultPath);
        } else {
            Log::warning('File result.css không tìm thấy', ['path' => $absoluteCssResultPath]);
        }

        $jsResultContent = '';
        $absoluteJsResultPath = public_path('js/result.js');
        if (File::exists($absoluteJsResultPath)) {
            $jsResultContent = File::get($absoluteJsResultPath);
        } else {
            Log::warning('File result.js không tìm thấy', ['path' => $absoluteJsResultPath]);
        }

        // QUAN TRỌNG: Nếu bạn đã chuyển đổi canvas thành ảnh Base64 ở phía client
        // (sử dụng html2canvas trong `result.blade.php`), thì phần Chart.js
        // và JavaScript để re-initialize Chart.js ở phía server này là KHÔNG CẦN THIẾT
        // và sẽ làm chậm quá trình. Hãy xóa các thẻ <script> này khỏi $fullHtml
        // và bỏ qua phần logic Chart.js ở dưới nếu bạn đã xử lý client-side.
        $chartJsCdnPath = 'https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js';
        $chartJsSource = $chartJsCdnPath; // Mặc định dùng CDN

        $absoluteChartJsPath = public_path('js/chart.min.js');
        if (File::exists($absoluteChartJsPath)) {
            // Nếu có file Chart.js cục bộ, ưu tiên dùng nó
            // Chú ý: wkhtmltoimage cần '--enable-local-file-access' để đọc file://
            $chartJsSource = 'file:///' . str_replace('\\', '/', $absoluteChartJsPath);
            Log::info('Sử dụng Chart.js cục bộ', ['path' => $absoluteChartJsPath]);
        } else {
            Log::info('Sử dụng Chart.js CDN', ['url' => $chartJsCdnPath]);
        }

        // Tạo nội dung HTML đầy đủ cho wkhtmltoimage
        $fullHtml = <<<HTML
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captured Image</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        /* CSS từ result.css được inline */
        {$cssResultContent}

        /* Các style ghi đè để tối ưu hiển thị trên wkhtmltoimage */
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
        table {
            width: 100% !important;
            table-layout: auto !important;
            border-collapse: collapse !important;
        }
        table, th, td {
            border-collapse: collapse !important;
        }
        /* Đảm bảo chữ dọc hiển thị ngang - quan trọng cho Tàng Can */
        .flex.items-center.justify-center.h-full.w-full[style*="writing-mode: vertical-rl"] {
            writing-mode: horizontal-tb !important;
            transform: none !important;
        }
        /* Tùy chỉnh width của td cha cho Tàng Can khi chữ chuyển sang ngang */
        td[style*="width: 25px; min-width: 25px;"] {
            width: 70px !important;
            min-width: 70px !important;
            white-space: normal !important;
            text-align: center !important;
            padding: 8px !important; /* Đảm bảo padding đủ rộng */
        }
        /* Các quy tắc ghi đè chung cho các container */
        .container, .max-w-screen-md, .mx-auto, .w-full, .h-full {
            max-width: {$targetWidth}px !important;
            width: 100% !important;
            margin-left: auto !important;
            margin-right: auto !important;
            padding: 20px !important;
            box-sizing: border-box !important;
            min-width: unset !important;
            min-height: unset !important;
        }
        /* Ghi đè cụ thể cho các id như #lasotuvi, #dungthan nếu có */
        #lasotuvi, #dungthan {
            width: auto !important;
            max-width: none !important;
            overflow: visible !important; /* Đảm bảo nội dung không bị ẩn */
        }
        /* Ép các div/component có width/max-width trên mobile thành desktop */
        .result-page-container, .bg-white.shadow.rounded-lg {
            padding: 24px !important;
            box-sizing: border-box !important;
            overflow: visible !important;
        }
        /* Đảm bảo Chart.js render đúng kích thước và không bị bó */
        canvas {
            width: 100% !important;
            height: auto !important; /* Rất quan trọng: cho phép chiều cao tự động */
            max-width: none !important;
            max-height: none !important;
            box-sizing: border-box !important;
            display: block !important; /* Đôi khi canvas có thể cần display block */
        }
        /* Thêm các quy tắc khác nếu bạn phát hiện phần nào bị co */
        .flex-container {
            flex-direction: row !important;
            flex-wrap: wrap !important;
        }
        .grid-container {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)) !important;
        }
    </style>
</head>
<body>
    <div id="capture-content">
        {$htmlContent}
    </div>

    <script src="{$chartJsSource}"></script>

    <script>
        {$jsResultContent}
    </script>

    <script>
        // Logic JS này chỉ cần thiết nếu `wkhtmltoimage` CẦN chạy lại Chart.js
        // và các thao tác JS khác để render đúng nội dung.
        // Nếu `htmlContent` đã chứa ảnh Base64 từ canvas và đầy đủ CSS,
        // thì có thể bỏ qua toàn bộ khối script này.
        console.log('Main JS wrapper: DOMContentLoaded fired, starting JS operations...');

        document.addEventListener('DOMContentLoaded', function() {
            // Giảm delay cho setTimeout. Nếu client-side rendering tốt, có thể giảm xuống 0ms.
            // Điều này chỉ là delay bổ sung sau DOMContentLoaded.
            // `javascript-delay` của wkhtmltoimage quan trọng hơn.
            setTimeout(function() {
                console.log('Main JS wrapper: Timeout finished, re-initializing charts...');
                
                var canvases = document.querySelectorAll('canvas');
                console.log('Main JS wrapper: Found canvases:', canvases.length);

                canvases.forEach(function(canvas) {
                    if (typeof Chart !== 'undefined') {
                        if (canvas.chart) {
                            console.log('Main JS wrapper: Destroying existing chart for', canvas.id);
                            canvas.chart.destroy(); // Hủy instance cũ nếu có
                        }

                        var chartConfig = JSON.parse(canvas.getAttribute('data-chart-config') || '{}');
                        if (Object.keys(chartConfig).length > 0) {
                            try {
                                new Chart(canvas, chartConfig);
                                console.log('Main JS wrapper: Re-initialized Chart for:', canvas.id);
                            } catch (e) {
                                console.error('Main JS wrapper: Error re-initializing chart:', canvas.id, e);
                            }
                        } else {
                            console.warn('Main JS wrapper: No data-chart-config found for canvas:', canvas.id);
                        }
                    } else {
                        console.error('Main JS wrapper: Chart.js is not loaded or "Chart" object is not defined.');
                    }
                });

                console.log('Main JS wrapper: All JS operations attempted.');
            }, 500); // Giảm delay xuống 500ms để tăng tốc
        });
    </script>
</body>
</html>
HTML;

        echo $fullHtml;
        die();
        // Lưu HTML vào file tạm thời
        File::put($tempHtmlFilePath, $fullHtml);
        Log::info('HTML tạm thời đã được tạo', ['path' => $tempHtmlFilePath]);

        // Tạo tên file ảnh đầu ra tạm thời
        $outputImageFileName = 'output_' . Str::random(16) . '.png'; // PNG cho chất lượng tốt hơn, hoặc JPG nếu kích thước là ưu tiên
        $outputImagePath = $tempDir . $outputImageFileName;

        // Chuẩn bị lệnh wkhtmltoimage
        $command = escapeshellcmd(
            "{$wkhtmltoimagePath} " .
                "--enable-javascript " .
                // Giảm delay tối thiểu. Nếu client-side html2canvas đã xử lý chart,
                // có thể giảm xuống 500ms hoặc thậm chí 100ms. Cần thử nghiệm.
                "--javascript-delay 1000 " .
                "--width {$targetWidth} " .
                // Giảm chất lượng từ 100 xuống 90-95 để giảm kích thước file và thời gian xử lý
                "--quality 90 " .
                "--disable-smart-width " . // Giữ nguyên nếu nó giúp layout ổn định
                "--enable-local-file-access " . // Quan trọng khi dùng file:// cho Chart.js cục bộ
                "--no-stop-slow-scripts " . // Giữ nguyên để tránh script bị dừng giữa chừng
                "\"{$tempHtmlFilePath}\" " .
                "\"{$outputImagePath}\""
        );

        Log::info('Lệnh wkhtmltoimage', ['command' => $command]);

        // Thực thi lệnh shell
        $output = null;
        $status = null;
        exec($command, $output, $status);

        // Xóa file HTML tạm thời
        File::delete($tempHtmlFilePath);

        if ($status !== 0) {
            if (File::exists($outputImagePath)) {
                File::delete($outputImagePath);
            }
            Log::error('wkhtmltoimage error', ['command' => $command, 'output' => $output, 'status' => $status]);
            Log::error('wkhtmltoimage detailed output:', ['output' => $output]);
            return response()->json(['error' => 'Failed to capture image. WKHTMLTOIMAGE error. Check server logs for details.'], 500);
        }

        if (!File::exists($outputImagePath)) {
            Log::error('wkhtmltoimage output file missing', ['path' => $outputImagePath]);
            return response()->json(['error' => 'Output image file not created.'], 500);
        }

        // Đọc ảnh và gửi về response
        $imageData = File::get($outputImagePath);
        File::delete($outputImagePath); // Luôn xóa file ảnh tạm thời sau khi đọc

        return Response::make($imageData, 200, [
            'Content-Type' => 'image/png', // Hoặc 'image/jpeg' nếu bạn thay đổi định dạng đầu ra
            'Content-Disposition' => 'attachment; filename="exported_image.png"',
        ]);
    }
}