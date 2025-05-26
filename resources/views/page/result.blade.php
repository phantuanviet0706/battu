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
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ $result->input->lunar_year }}</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ isset($result->agricultural->selected_range->name) ? $result->agricultural->selected_range->name : 'unknown' }}</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ $result->input->lunar_day }}</td>
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
                        <div class="text-[11px] font-bold mb-1">Nhật Chủ</div>
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
                            @if (isset($result->heavenly_stem->hidden_hs_in_eb_by_year))
                            @php
                            $hidden_items_by_year = $result->heavenly_stem->hidden_hs_in_eb_by_year;
                            @endphp
                            @if ($hidden_items_by_year && isset($hidden_items_by_year->hidden))
                            @foreach ($hidden_items_by_year->hidden as $hidden_item)
                            <div class="px-2" style="height: 100%;">
                                <div class="mb-1 text-gray-700">{{ $hidden_item->hidden_combo }}</div>
                                <div class="mb-1 {{ $hidden_item->text_color }} font-semibold">{{ $hidden_item->heavenly_stem }}</div>
                                <div class="mb-1 {{ $hidden_item->text_color }}">{{ ($hidden_item->polarity == 'Dương' ? "+" : "-") . $hidden_item->yin_yang }}</div>
                            </div>
                            @endforeach
                            @endif
                            @endif
                        </div>
                    </td>
                    <td class="border border-gray-400 p-1 align-top">
                        <div class="flex justify-center gap-1">
                            @if (isset($result->heavenly_stem_month->hidden_hs_in_eb_by_month))
                            @php
                            $hidden_items_by_month = $result->heavenly_stem_month->hidden_hs_in_eb_by_month;
                            @endphp
                            @if ($hidden_items_by_month && isset($hidden_items_by_month->hidden))
                            @foreach ($hidden_items_by_month->hidden as $hidden_item)
                            <div class="px-2" style="height: 100%;">
                                <div class="mb-1 text-gray-700">{{ $hidden_item->hidden_combo }}</div>
                                <div class="mb-1 {{ $hidden_item->text_color }} font-semibold">{{ $hidden_item->heavenly_stem }}</div>
                                <div class="mb-1 {{ $hidden_item->text_color }}">{{ ($hidden_item->polarity == 'Dương' ? "+" : "-") . $hidden_item->yin_yang }}</div>
                            </div>
                            @endforeach
                            @endif
                            @endif
                        </div>
                    </td>
                    <td class="border border-gray-400 p-1 align-top">
                        <div class="flex justify-center gap-1">
                            @if (isset($result->heavenly_stem_day->hidden_hs_in_eb_by_day))
                            @php
                            $hidden_items_by_day = $result->heavenly_stem_day->hidden_hs_in_eb_by_day;
                            @endphp
                            @if ($hidden_items_by_day && isset($hidden_items_by_day->hidden))
                            @foreach ($hidden_items_by_day->hidden as $hidden_item)
                            <div class="px-2" style="height: 100%;">
                                <div class="mb-1 text-gray-700">{{ $hidden_item->hidden_combo }}</div>
                                <div class="mb-1 {{ $hidden_item->text_color }} font-semibold">{{ $hidden_item->heavenly_stem }}</div>
                                <div class="mb-1 {{ $hidden_item->text_color }}">{{ ($hidden_item->polarity == 'Dương' ? "+" : "-") . $hidden_item->yin_yang }}</div>
                            </div>
                            @endforeach
                            @endif
                            @endif
                        </div>
                    </td>
                    <td class="border border-gray-400 p-1 align-top">
                        <div class="flex justify-center gap-1">
                            @if (isset($result->heavenly_stem_hour->hidden_hs_in_eb_by_hour))
                            @php
                            $hidden_items_by_hour = $result->heavenly_stem_hour->hidden_hs_in_eb_by_hour;
                            @endphp
                            @if ($hidden_items_by_hour && isset($hidden_items_by_hour->hidden))
                            @foreach ($hidden_items_by_hour->hidden as $hidden_item)
                            <div class="px-2" style="height: 100%;">
                                <div class="mb-1 text-gray-700">{{ $hidden_item->hidden_combo }}</div>
                                <div class="mb-1 {{ $hidden_item->text_color }} font-semibold">{{ $hidden_item->heavenly_stem }}</div>
                                <div class="mb-1 {{ $hidden_item->text_color }}">{{ ($hidden_item->polarity == 'Dương' ? "+" : "-") . $hidden_item->yin_yang }}</div>
                            </div>
                            @endforeach
                            @endif
                            @endif
                        </div>
                    </td>
                </tr>

                <tr class="bg-white">
                    <td class="border border-gray-400" colspan="2">NẠP ÂM</td>
                    @if (isset($result->data_sound->elemental_sound))
                    <td class="border border-gray-400">{{ $result->data_sound->elemental_sound->name }} <span class="{{ $result->data_sound->elemental_sound->color }} font-bold">{{ $result->data_sound->elemental_sound->element }}</span></td>
                    @else
                    <td class="border border-gray-400"><span class="font-bold"></span></td>
                    @endif

                    @if (isset($result->data_sound->elemental_sound_month))
                    <td class="border border-gray-400">{{ $result->data_sound->elemental_sound_month->name }} <span class="{{ $result->data_sound->elemental_sound_month->color }} font-bold">{{ $result->data_sound->elemental_sound_month->element }}</span></td>
                    @else
                    <td class="border border-gray-400"><span class="font-bold"></span></td>
                    @endif

                    @if (isset($result->data_sound->elemental_sound_day))
                    <td class="border border-gray-400">{{ $result->data_sound->elemental_sound_day->name }} <span class="{{ $result->data_sound->elemental_sound_day->color }} font-bold">{{ $result->data_sound->elemental_sound_day->element }}</span></td>
                    @else
                    <td class="border border-gray-400"><span class="font-bold"></span></td>
                    @endif

                    @if (isset($result->data_sound->elemental_sound_hour))
                    <td class="border border-gray-400">{{ $result->data_sound->elemental_sound_hour->name }} <span class="{{ $result->data_sound->elemental_sound_hour->color }} font-bold">{{ $result->data_sound->elemental_sound_hour->element }}</span></td>
                    @else
                    <td class="border border-gray-400"><span class="font-bold"></span></td>
                    @endif
                </tr>
                <tr class="bg-white">
                    <td class="border border-gray-400" colspan="2">TRƯỜNG SINH</td>
                    @if (isset($result->data_growth_stage->growth_stage->name))
                    <td class="border border-gray-400">{{ $result->data_growth_stage->growth_stage->name }}</td>
                    @else
                    <td class="border border-gray-400"></td>
                    @endif

                    @if (isset($result->data_growth_stage->growth_stage_month->name))
                    <td class="border border-gray-400">{{ $result->data_growth_stage->growth_stage_month->name }}</td>
                    @else
                    <td class="border border-gray-400"></td>
                    @endif

                    @if (isset($result->data_growth_stage->growth_stage_day->name))
                    <td class="border border-gray-400">{{ $result->data_growth_stage->growth_stage_day->name }}</td>
                    @else
                    <td class="border border-gray-400"></td>
                    @endif

                    @if (isset($result->data_growth_stage->growth_stage_hour->name))
                    <td class="border border-gray-400">{{ $result->data_growth_stage->growth_stage_hour->name }}</td>
                    @else
                    <td class="border border-gray-400"></td>
                    @endif
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

        <div class="content-charts">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 relative">

                <div class="col-span-1 bg-white rounded-xl shadow-md p-6 flex flex-col items-center">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Ngũ Hành Thập Thần</h2>
                    <div class="flex flex-col items-start justify-center w-full flex-grow">
                        <div class="relative w-full h-full min-h-[250px]">
                            <canvas id="thapThanChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-span-1 bg-white rounded-xl shadow-md p-6 flex flex-col items-center">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Ngũ Hành phân phối</h2>
                    <div class="flex flex-col items-center justify-center w-full flex-grow">
                        <div class="nguhanh-container">
                            <div class="absolute yin-yang">
                                <div class="yin-yang-dot-black"></div>
                                <div class="yin-yang-dot-white"></div>
                                <div class="absolute text-nham">Nhâm</div>
                                <div class="absolute text-thuy">Thủy</div>
                            </div>

                            <div class="nguhanh-element" data-element="Moc" style="background-color: #4CAF50;">
                                Mộc <br /> -1
                            </div>
                            <div class="nguhanh-element" data-element="Hoa" style="background-color: #F44336;">
                                Hỏa <br /> -2
                            </div>
                            <div class="nguhanh-element" data-element="Tho" style="background-color: #FFC107;">
                                Thổ <br /> +10
                            </div>
                            <div class="nguhanh-element" data-element="Kim" style="background-color: #9E9E9E;">
                                Kim <br /> +4
                            </div>
                            <div class="nguhanh-element" data-element="Thuy" style="background-color: #2196F3;">
                                Thủy <br /> +5
                            </div>

                            <svg class="absolute w-full h-full" viewBox="0 0 250 250" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" style="pointer-events: none; z-index: 0;">
                                <defs>
                                    <marker id="arrowhead" markerWidth="10" markerHeight="7" refX="0" refY="3.5" orient="auto">
                                        <polygon points="0 0, 10 3.5, 0 7" fill="currentColor" />
                                    </marker>
                                </defs>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="col-span-1 bg-white rounded-xl shadow-md p-6 flex flex-col items-center">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Ngũ Hành tương quan</h2>
                    <div class="relative flex items-center justify-center w-full max-w-[250px] aspect-square flex-grow">
                        <canvas id="nguHanhChart"></canvas>
                    </div>
                </div>

            </div>
        </div>
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

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Dữ liệu cho biểu đồ Ngũ Hành tương quan (Pie Chart)
        const nguHanhData = {
            labels: ['Mộc', 'Hỏa', 'Thủy', 'Thổ', 'Kim'],
            datasets: [{
                data: [4.08, 9.18, 22.45, 18.37, 45.92], // Đã điều chỉnh để tổng là 100%
                backgroundColor: [
                    '#4CAF50', // Mộc (Green)
                    '#F44336', // Hỏa (Red)
                    '#2196F3', // Thủy (Blue)
                    '#FFC107', // Thổ (Yellow)
                    '#673AB7' // Kim (Purple)
                ],
                hoverOffset: 4
            }]
        };

        const nguHanhConfig = {
            type: 'pie',
            data: nguHanhData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false // Ẩn chú giải mặc định
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed !== null) {
                                    label += context.parsed.toFixed(2) + '%';
                                }
                                return label;
                            }
                        }
                    }
                }
            }
        };

        const nguHanhChart = new Chart(
            document.getElementById('nguHanhChart'),
            nguHanhConfig
        );

        // Plugin tùy chỉnh để hiển thị phần trăm bên trong thanh
        const percentageInBarPlugin = {
            id: 'percentageInBar',
            afterDatasetDraw(chart, args, options) {
                const {
                    ctx,
                    chartArea: {
                        left,
                        right,
                        top,
                        bottom,
                        width,
                        height
                    },
                    scales: {
                        x,
                        y
                    }
                } = chart;
                ctx.save();

                args.meta.data.forEach((bar, index) => {
                    const value = chart.data.datasets[0].data[index];
                    const percentage = value.toFixed(0) + '%'; // Lấy phần trăm và làm tròn

                    const xPos = bar.x;
                    const yPos = bar.y;
                    const barWidth = bar.width;

                    ctx.fillStyle = 'white'; // Màu chữ
                    ctx.textAlign = 'right'; // Căn chữ sang phải
                    ctx.textBaseline = 'middle'; // Căn giữa theo chiều dọc
                    ctx.font = 'bold 12px Inter, sans-serif'; // Font chữ

                    let textX = xPos - 5; // Dịch sang trái 5px từ mép phải của thanh
                    let textY = yPos;

                    // Đảm bảo chữ không bị tràn ra ngoài thanh nếu thanh quá ngắn
                    if (barWidth < ctx.measureText(percentage).width + 10) {
                        ctx.fillStyle = 'black'; // Đổi màu chữ sang đen
                        ctx.textAlign = 'left'; // Căn chữ sang trái
                        textX = xPos + 5; // Vẽ ở bên ngoài thanh
                    }

                    ctx.fillText(percentage, textX, textY);
                });
                ctx.restore();
            }
        };

        // Dữ liệu cho biểu đồ Ngũ Hành Thập Thần (Horizontal Bar Chart)
        const thapThanData = {
            labels: [
                'Thiên Tài', 'Tỷ Kiên', 'Kiếp Tải', 'Chính Ấn', 'Thực Thần',
                'Thương Quan', 'Chính Quan', 'Thất Sát', 'Thiên Ấn', 'Chính Tài'
            ],
            datasets: [{
                label: 'Phần trăm',
                data: [58, 70, 76, 70, 50, 40, 0, 0, 0, 0],
                backgroundColor: [
                    '#4CAF50', // Màu xanh lá cây (Mộc - Thiên Tài)
                    '#9E9E9E', // Màu xám (Kim - Tỷ Kiên)
                    '#757575', // Màu xám đậm (Kim - Kiếp Tải)
                    '#FFC107', // Màu vàng (Thổ - Chính Ấn)
                    '#2196F3', // Màu xanh dương (Thủy - Thực Thần)
                    '#1976D2', // Màu xanh dương đậm (Thủy - Thương Quan)
                    '#F44336', // Màu đỏ (Hỏa - Chính Quan)
                    '#D32F2F', // Màu đỏ đậm (Hỏa - Thất Sát)
                    '#689F38', // Màu xanh lá cây đậm (Mộc - Thiên Ấn)
                    '#8BC34A' // Màu xanh lá cây nhạt (Mộc - Chính Tài)
                ],
                borderColor: [
                    '#4CAF50',
                    '#9E9E9E',
                    '#757575',
                    '#FFC107',
                    '#2196F3',
                    '#1976D2',
                    '#F44336',
                    '#D32F2F',
                    '#689F38',
                    '#8BC34A'
                ],
                borderWidth: 1,
                borderRadius: 5, // Bo tròn góc của thanh
                barThickness: 15 // Độ dày của thanh
            }]
        };

        const thapThanConfig = {
            type: 'bar',
            data: thapThanData,
            options: {
                indexAxis: 'y', // Biểu đồ thanh ngang
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false // Ẩn chú giải
                    },
                    tooltip: {
                        enabled: false // Tắt tooltip mặc định để dùng plugin tùy chỉnh
                    },
                    percentageInBar: {} // Kích hoạt plugin
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        max: 100, // Đặt giới hạn tối đa là 100%
                        ticks: {
                            display: false // Ẩn nhãn trục X
                        },
                        grid: {
                            display: false // Ẩn đường lưới trục X
                        }
                    },
                    y: {
                        grid: {
                            display: false // Ẩn đường lưới ngang
                        },
                        ticks: {
                            color: 'black', // Màu chữ nhãn
                            font: {
                                size: 12,
                                weight: 'bold'
                            },
                            align: 'start', // Căn trái nhãn trục Y
                            padding: 10 // Thêm padding để nhãn không quá sát mép
                        }
                    }
                }
            },
            plugins: [percentageInBarPlugin] // Đăng ký plugin
        };

        const thapThanChart = new Chart(
            document.getElementById('thapThanChart'),
            thapThanConfig
        );

        // --- Logic cho Ngũ Hành phân phối (mũi tên) ---
        const nguhanhElements = {
            Moc: {
                el: document.querySelector('[data-element="Moc"]'),
                color: '#4CAF50',
                x: 0,
                y: 0
            },
            Hoa: {
                el: document.querySelector('[data-element="Hoa"]'),
                color: '#F44336',
                x: 0,
                y: 0
            },
            Tho: {
                el: document.querySelector('[data-element="Tho"]'),
                color: '#FFC107',
                x: 0,
                y: 0
            },
            Kim: {
                el: document.querySelector('[data-element="Kim"]'),
                color: '#9E9E9E',
                x: 0,
                y: 0
            },
            Thuy: {
                el: document.querySelector('[data-element="Thuy"]'),
                color: '#2196F3',
                x: 0,
                y: 0
            }
        };

        const nguhanhContainer = document.querySelector('.nguhanh-container');
        const svgArrows = nguhanhContainer.querySelector('svg');
        const containerSize = 250; // Kích thước viewBox của SVG
        const elementRadius = 22.5; // Bán kính của mỗi yếu tố (45px/2)
        const pentagonCircumradius = 100; // Bán kính của đường tròn đi qua tâm các yếu tố (tăng để phù hợp với Âm Dương lớn hơn)
        const centerX = containerSize / 2;
        const centerY = containerSize / 2;
        const arrowHeadLength = 10; // Chiều dài của đầu mũi tên

        // Hàm tính toán vị trí tâm của yếu tố trên đường tròn ngũ giác
        function calculateElementPosition(angleDegrees) {
            const angleRadians = (angleDegrees - 90) * Math.PI / 180.0; // -90 để Mộc ở trên cùng
            return {
                x: centerX + pentagonCircumradius * Math.cos(angleRadians),
                y: centerY + pentagonCircumradius * Math.sin(angleRadians)
            };
        }

        // Đặt vị trí cho các yếu tố và lưu tâm của chúng
        const positions = {
            Moc: calculateElementPosition(0), // Top
            Hoa: calculateElementPosition(72), // Top-right
            Tho: calculateElementPosition(144), // Bottom-right
            Kim: calculateElementPosition(216), // Bottom-left
            Thuy: calculateElementPosition(288) // Top-left
        };

        // Gán vị trí cho các phần tử HTML và lưu tâm
        for (const key in nguhanhElements) {
            const pos = positions[key];
            nguhanhElements[key].el.style.left = `${(pos.x / containerSize) * 100}%`;
            nguhanhElements[key].el.style.top = `${(pos.y / containerSize) * 100}%`;
            nguhanhElements[key].x = pos.x;
            nguhanhElements[key].y = pos.y;
        }

        // Hàm tính điểm trên viền của một hình tròn hướng về một điểm khác
        function getPointOnCircleEdgeTowards(cx, cy, targetX, targetY, radius) {
            const angle = Math.atan2(targetY - cy, targetX - cx);
            return {
                x: cx + radius * Math.cos(angle),
                y: cy + radius * Math.sin(angle)
            };
        }

        // Vẽ các mũi tên theo chu trình tương sinh
        const flowOrder = ['Moc', 'Hoa', 'Tho', 'Kim', 'Thuy', 'Moc']; // Chu trình tương sinh

        // Xóa các mũi tên cũ trước khi vẽ lại
        svgArrows.innerHTML = `
                <defs>
                    <marker id="arrowhead" markerWidth="10" markerHeight="7" refX="0" refY="3.5" orient="auto">
                        <polygon points="0 0, 10 3.5, 0 7" fill="currentColor" />
                    </marker>
                </defs>
            `;

        for (let i = 0; i < flowOrder.length - 1; i++) {
            const startElement = nguhanhElements[flowOrder[i]];
            const endElement = nguhanhElements[flowOrder[i + 1]];

            // Điểm trên viền của yếu tố bắt đầu, hướng về yếu tố kết thúc
            const startPoint = getPointOnCircleEdgeTowards(startElement.x, startElement.y, endElement.x, endElement.y, elementRadius);

            // Điểm trên viền của yếu tố kết thúc, hướng về yếu tố bắt đầu (để mũi tên không đi vào trong)
            const endPointForArrowTip = getPointOnCircleEdgeTowards(endElement.x, endElement.y, startElement.x, startElement.y, elementRadius);

            // Tính toán điểm cuối thực sự của đường thẳng để mũi tên không bị cắt
            // Di chuyển điểm cuối lùi lại một chút từ endPointForArrowTip bằng chiều dài đầu mũi tên
            const dx = endPointForArrowTip.x - startPoint.x;
            const dy = endPointForArrowTip.y - startPoint.y;
            const distance = Math.sqrt(dx * dx + dy * dy);

            let actualLineEndX = endPointForArrowTip.x;
            let actualLineEndY = endPointForArrowTip.y;

            if (distance > arrowHeadLength) {
                const unitDx = dx / distance;
                const unitDy = dy / distance;
                actualLineEndX = endPointForArrowTip.x - unitDx * arrowHeadLength;
                actualLineEndY = endPointForArrowTip.y - unitDy * arrowHeadLength;
            } else {
                actualLineEndX = startPoint.x + dx / 2;
                actualLineEndY = startPoint.y + dy / 2;
            }


            const path = document.createElementNS("http://www.w3.org/2000/svg", "line");
            path.setAttribute("x1", startPoint.x);
            path.setAttribute("y1", startPoint.y);
            path.setAttribute("x2", actualLineEndX);
            path.setAttribute("y2", actualLineEndY);
            path.setAttribute("stroke", "rgba(107, 114, 128, 0.7)"); // text-gray-400 opacity-70
            path.setAttribute("stroke-width", "1.5"); // Giảm độ dày cho thanh thoát
            path.setAttribute("marker-end", "url(#arrowhead)"); // Thêm đầu mũi tên

            svgArrows.appendChild(path);
        }
    });
</script>
@endpush