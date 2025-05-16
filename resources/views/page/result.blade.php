@extends('layouts.app')

@section('content')
<div class="p-6 bg-gray-100 result-page-container">
    <!-- 1. LÁ SỐ -->
    <h2 class="text-2xl font-bold mb-4">1. LÁ SỐ</h2>
    <div class="bg-white shadow rounded-lg p-4">
        <div class="text-center mb-4">
            <h3 class="text-xl font-semibold">{{ $result->name }}</h3>
            <p class="text-sm text-gray-500">
                {{ (isset($result->input->hour) ? $result->input->hour : 0) . "h" . (isset($result->input->minute) ? $result->input->minute : 0) }}
                 - 
                {{ $result->input->day . "/" . $result->input->month . "/" . $result->input->year }}
                 - 
                {{ isset($result->gender) ? ($result->gender == 'male' ? 'Male' : 'Female') : 'unknown' }}
            </p>
        </div>
        <table class="table-fixed w-full text-center border border-collapse border-gray-400 text-sm">
            <thead>
                <tr class="bg-[#c8b48c]">
                    <th class="border border-gray-400 bg-[#5c5c2e]" colspan="2">
                        <i>Lá số bát tự</i>
                    </th>
                    <th class="border border-gray-400">TRỤ NĂM</th>
                    <th class="border border-gray-400">TRỤ THÁNG</th>
                    <th class="border border-gray-400">TRỤ NGÀY</th>
                    <th class="border border-gray-400">TRỤ GIỜ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- Ô dọc chiếm 3 dòng -->
                    <td rowspan="3" class="border border-gray-400 bg-[#f5e4c3] font-semibold text-xs text-center" style="height: 150px;">
                        <div style="writing-mode: vertical-rl; transform: rotate(180deg); height: 100%; width: 100%; display: flex; justify-content: center; align-items: center;">
                            Lịch pháp
                        </div>
                    </td>
                    <!-- Dòng 1: DƯƠNG LỊCH -->
                    <td class="border border-gray-400 bg-[#f5e4c3] text-[#8b3c14] font-bold">DƯƠNG LỊCH</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ $result->input->year }}</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ $result->input->month }}</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ $result->input->day }}</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]" rowspan="3">{{ isset($result->input->hour) ? $result->input->hour : 0 }}:{{ isset($result->input->minute) ? $result->input->minute : 0 }}</td>
                </tr>
                <tr>
                    <!-- Dòng 2: ÂM LỊCH -->
                    <td class="border border-gray-400 bg-[#f5e4c3] text-[#8b3c14] font-bold">ÂM LỊCH</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ $result->input->lunar_year }}</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ $result->input->lunar_month }}</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ $result->input->lunar_day }}</td>
                </tr>
                <tr>
                    <!-- Dòng 3: NÔNG LỊCH -->
                    <td class="border border-gray-400 bg-[#f5e4c3] text-[#8b3c14] font-bold">NÔNG LỊCH</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ $result->input->year }}</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ isset($result->agricultural->selected_range->name) ? $result->agricultural->selected_range->name : 'unknown' }}</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ $result->input->day }}</td>
                </tr>

                <tr class="bg-white">
                    <td rowspan="1" class="border border-gray-400 bg-[#f5e4c3] font-semibold text-xs text-center" style="height: 150px;">
                        <div style="writing-mode: vertical-rl; transform: rotate(180deg); height: 100%; width: 100%; display: flex; justify-content: center; align-items: center;">
                            Thiên
                        </div>
                    </td>
                    <!-- Dòng 4: THIÊN CAN -->
                    <td class="border border-gray-400">THIÊN CAN</td>
                     <!-- Ô Canh Ất -->
                    <td class="border border-gray-400 bg-[#fdf8ec] text-center text-xs">
                        <div class="text-[11px] text-gray-600 mb-1">{{ $result->heavenly_stem->hidden_stem_by_year->name }}</div>
                        <div class="{{ $result->heavenly_stem->color }} font-semibold text-base leading-tight">{{ $result->heavenly_stem->name }}</div>
                        <div class="text-[11px] {{ $result->heavenly_stem->color }}">{{ ($result->heavenly_stem->polarity == "Dương" ? "+" : "-") . $result->heavenly_stem->yin_yang }}</div>
                    </td>

                    <td class="border border-gray-400 bg-[#fdf8ec] text-center text-xs">
                        <div class="text-[11px] text-gray-600 mb-1">{{ $result->heavenly_stem_month->hidden_stem_by_month->name }}</div>
                        <div class="{{ $result->heavenly_stem_month->color }} font-semibold text-base leading-tight">{{ $result->heavenly_stem_month->name }}</div>
                        <div class="text-[11px] {{ $result->heavenly_stem_month->color }}">{{ ($result->heavenly_stem_month->polarity == "Dương" ? "+" : "-") . $result->heavenly_stem_month->yin_yang }}</div>
                    </td>

                    <!-- Ô đặc biệt: Nhật Chủ -->
                    <td class="border border-gray-400 bg-[#f0f0ea] text-center text-xs">
                        <div class="text-[11px] text-red-600 font-bold mb-1">{{ $result->heavenly_stem_day->hidden_stem_by_day->name }}</div>
                        <div class="{{ $result->heavenly_stem_day->color }} font-semibold text-base leading-tight">{{ $result->heavenly_stem_day->name }}</div>
                        <div class="text-[11px] {{ $result->heavenly_stem_day->color }}">{{ ($result->heavenly_stem_day->polarity == "Dương" ? "+" : "-") . $result->heavenly_stem_day->yin_yang }}</div>
                    </td>

                    <td class="border border-gray-400 bg-[#fdf8ec] text-center text-xs">
                        <div class="text-[11px] text-gray-600 mb-1">{{ isset($result->heavenly_stem_hour->hidden_stem_by_hour) ? $result->heavenly_stem_hour->hidden_stem_by_hour->name : '' }}</div>
                        <div class="{{ isset($result->heavenly_stem_hour->color) ? $result->heavenly_stem_hour->color : '' }} font-semibold text-base leading-tight">
                            {{ isset($result->heavenly_stem_hour->name) ? $result->heavenly_stem_hour->name : '' }}
                        </div>
                        <div class="text-[11px] {{ isset($result->heavenly_stem_hour->color) ? $result->heavenly_stem_hour->color : '' }}">
                            {{ (isset($result->heavenly_stem_hour->polarity) ? ($result->heavenly_stem_hour->polarity == "Dương" ? "+" : "-") : '') . (isset($result->heavenly_stem_hour->yin_yang) ? $result->heavenly_stem_hour->yin_yang : '') }}
                        </div>
                    </td>
                </tr>

                <tr class="bg-white">
                    <td rowspan="1" class="border border-gray-400 bg-[#f5e4c3] font-semibold text-xs text-center" style="height: 150px;">
                        <div style="writing-mode: vertical-rl; transform: rotate(180deg); height: 100%; width: 100%; display: flex; justify-content: center; align-items: center;">
                            Địa
                        </div>
                    </td>
                    <td class="border border-gray-400">ĐỊA CHI</td>
                    <!-- Theo năm -->
                    <td class="border border-gray-400 {{ $result->earthly_branch->color }} font-bold">
                        {{ $result->earthly_branch->name }}
                        <br>
                        <span class="text-xs">
                            {{ ($result->earthly_branch->polarity == "Dương" ? "+" : "-") . $result->earthly_branch->yin_yang }}
                        </span>
                    </td>
                    <!-- Theo tháng -->
                    <td class="border border-gray-400 {{ $result->earthly_branch_month->color }} font-bold">
                        {{ $result->earthly_branch_month->name }}
                        <br>
                        <span class="text-xs">
                            {{ ($result->earthly_branch_month->polarity == "Dương" ? "+" : "-") . $result->earthly_branch_month->yin_yang }}
                        </span>
                    </td>
                    <!-- Theo ngày -->
                    <td class="border border-gray-400 {{ $result->earthly_branch_day->color }} font-bold">
                        {{ $result->earthly_branch_day->name }}
                        <br>
                        <span class="text-xs">
                            {{ ($result->earthly_branch_day->polarity == "Dương" ? "+" : "-") . $result->earthly_branch_day->yin_yang }}    
                        </span>
                    </td>
                    <!-- Theo giờ -->
                    <td class="border border-gray-400 {{ isset($result->earthly_branch_hour->color) ? $result->earthly_branch_hour->color : '' }} font-bold">
                        {{ isset($result->earthly_branch_hour->name) ? $result->earthly_branch_hour->name : '' }}
                        <br>
                        <span class="text-xs">
                            {{ (isset($result->earthly_branch_hour->polarity) ? ($result->earthly_branch_hour->polarity == "Dương" ? "+" : "-") : '') . (isset($result->earthly_branch_hour->yin_yang) ? $result->earthly_branch_hour->yin_yang : '') }}
                        </span>
                    </td>
                </tr>

                <tr class="bg-white">
                    <td rowspan="1" class="border border-gray-400 bg-[#f5e4c3] font-semibold text-xs text-center" style="height: 150px;">
                        <div style="writing-mode: vertical-rl; transform: rotate(180deg); height: 100%; width: 100%; display: flex; justify-content: center; align-items: center;">
                            Nhân
                        </div>
                    </td>
                    <td class="border border-gray-400">TÀNG CAN</td>
                    <td class="border border-gray-400 p-1 align-top">
                        <div class="flex justify-center gap-1">
                            
                        </div>
                    </td>
                    <td class="border border-gray-400 p-1 align-top">
                        <div class="flex justify-center gap-1">
                            
                        </div>
                    </td>
                    <td class="border border-gray-400 p-1 align-top">
                        <div class="flex justify-center gap-1">
                            
                        </div>
                    </td>
                    <td class="border border-gray-400 p-1 align-top">
                        <div class="flex justify-center gap-1">
                            
                        </div>
                    </td>
                </tr>

                <tr class="bg-white">
                    <td class="border border-gray-400" colspan="2">NẠP ÂM</td>
                    <td class="border border-gray-400">Phú Đăng <span class="text-yellow-600 font-bold">Kim</span></td>
                    <td class="border border-gray-400">Bạch Lạp <span class="text-yellow-600 font-bold">Kim</span></td>
                    <td class="border border-gray-400">Đại Hải <span class="text-blue-600 font-bold">Thủy</span></td>
                    <td class="border border-gray-400">Tích Lịch <span class="text-red-600 font-bold">Hỏa</span></td>
                </tr>
                <tr class="bg-white">
                    <td class="border border-gray-400" colspan="2">TRƯỜNG SINH</td>
                    <td class="border border-gray-400">Mộc Dục</td>
                    <td class="border border-gray-400">Dưỡng</td>
                    <td class="border border-gray-400">Quan Đới</td>
                    <td class="border border-gray-400">Thai</td>
                </tr>
                <tr class="bg-white">
                    <td class="border border-gray-400" colspan="2">THẦN SÁT</td>
                    <td class="border border-gray-400">Thiên Hỷ<br>Địa Võng</td>
                    <td class="border border-gray-400"></td>
                    <td class="border border-gray-400">Cô Thần<br>Lục Quý Hợp</td>
                    <td class="border border-gray-400">Tướng Tinh<br>Quý Thực</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- 2. DỤNG THẦN -->
    <h2 class="text-2xl font-bold mt-8 mb-4">2. DỤNG THẦN</h2>
    <div class="bg-white shadow rounded-lg p-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <h3 class="font-semibold text-green-700">Mệnh Khuyết: Mộc</h3>
                <p class="text-sm mt-1">Mộc là cây cối sinh sôi, tượng trưng cho sự phát triển, đổi mới. Người khuyết Mộc thiếu sự linh hoạt trong tư duy, dễ rơi vào bế tắc, chậm thay đổi. Cuộc sống dễ bị rơi vào trì trệ khi thiếu tính sáng tạo, thiếu ý tưởng hoặc thiếu khát vọng vươn lên.</p>
            </div>
            <div>
                <h3 class="font-semibold text-red-700">Mệnh Yếu: Hỏa</h3>
                <p class="text-sm mt-1">Hỏa là nguồn nhiệt huyết, tượng trưng cho đam mê, sáng tạo, lòng dũng cảm. Người yếu Hỏa dễ thiếu năng lượng, ít cảm xúc, sống thiếu đam mê. Khó quyết đoán, thiếu tự tin và không dám mạo hiểm theo đuổi điều mình yêu thích.</p>
            </div>
            <div>
                <h3 class="font-semibold">Ngũ Hành Đối Ứng</h3>
                <ul class="text-sm list-disc ml-5 mt-1">
                    <li>Thổ: 1</li>
                    <li>Thủy: 5</li>
                    <li>Mộc: -1</li>
                    <li>Kim: 4</li>
                    <li>Hỏa: -2</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
