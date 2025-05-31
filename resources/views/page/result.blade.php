@extends('layouts.app')

@section('content')
<div class="p-6 bg-gray-100 result-page-container">
    <!-- 1. LÁ SỐ -->
    <div class="bg-white shadow rounded-lg p-4">
        <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">1. LÁ SỐ</h1>
        <div class="head-container text-center mb-4">
            <h3 class="text-xl font-bold">{{ $result->name }}</h3>
            <p class="text-sm">
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
                    <th class="text-custom-gray border border-gray-400 bg-[#5c5c2e]" colspan="2" style="width: 200px;">
                        <i>Lá số bát tự</i>
                    </th>
                    <th class="text-custom-header border border-gray-400">TRỤ NĂM</th>
                    <th class="text-custom-header border border-gray-400">TRỤ THÁNG</th>
                    <th class="text-custom-header border border-gray-400">TRỤ NGÀY</th>
                    <th class="text-custom-header border border-gray-400">TRỤ GIỜ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- Ô dọc chiếm 3 dòng -->
                    <td rowspan="3" class="text-custom-gray border border-gray-400 bg-[#f5e4c3] font-semibold text-xs text-center" style="height: 150px; width: 25px;">
                        <div style="writing-mode: vertical-rl; transform: rotate(180deg); height: 100%; width: 100%; display: flex; justify-content: center; align-items: center;">
                            Lịch pháp
                        </div>
                    </td>
                    <!-- Dòng 1: DƯƠNG LỊCH -->
                    <td class="text-custom-yellow border border-gray-400 bg-[#f5e4c3] text-[#8b3c14] font-bold" style="width: 175px;">DƯƠNG LỊCH</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ $result->input->year }}</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ $result->input->month }}</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ $result->input->day }}</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]" rowspan="3">{{ isset($result->input->hour) ? $result->input->hour : 0 }}:{{ isset($result->input->minute) ? $result->input->minute : 0 }}</td>
                </tr>
                <tr>
                    <!-- Dòng 2: ÂM LỊCH -->
                    <td class="text-custom-yellow border border-gray-400 bg-[#f5e4c3] text-[#8b3c14] font-bold">ÂM LỊCH</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ $result->input->lunar_year }}</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ $result->input->lunar_month }}</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ $result->input->lunar_day }}</td>
                </tr>
                <tr>
                    <!-- Dòng 3: NÔNG LỊCH -->
                    <td class="text-custom-yellow border border-gray-400 bg-[#f5e4c3] text-[#8b3c14] font-bold">NÔNG LỊCH</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ $result->input->lunar_year }}</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ isset($result->agricultural->selected_range->name) ? $result->agricultural->selected_range->name : 'unknown' }}</td>
                    <td class="border border-gray-400 bg-[#f5e4c3]">{{ $result->input->lunar_day }}</td>
                </tr>

                <tr>
                    <td rowspan="1" class="text-custom-gray border border-gray-400 bg-[#f5e4c3] font-semibold text-xs text-center" style="height: 150px; width: 25px;">
                        <div style="writing-mode: vertical-rl; transform: rotate(180deg); height: 100%; width: 100%; display: flex; justify-content: center; align-items: center;">
                            Thiên
                        </div>
                    </td>
                    <!-- Dòng 4: THIÊN CAN -->
                    <td class="text-custom-yellow border border-gray-400 font-bold">THIÊN CAN</td>
                    <!-- Ô Canh Ất -->
                    <td class="border border-gray-400 bg-[#fdf8ec] text-center text-xs">
                        <div class="text-[11px] text-gray-600 mb-1">{{ $result->heavenly_stem->hidden_stem_by_year->name }}</div>
                        <div class="text-container {{ $result->heavenly_stem->color }} font-semibold text-base leading-tight">{{ $result->heavenly_stem->name }}</div>
                        <div class="text-[11px] {{ $result->heavenly_stem->color }}">{{ ($result->heavenly_stem->polarity == "Dương" ? "+" : "-") . $result->heavenly_stem->yin_yang }}</div>
                    </td>

                    <td class="border border-gray-400 bg-[#fdf8ec] text-center text-xs">
                        <div class="text-[11px] text-gray-600 mb-1">{{ $result->heavenly_stem_month->hidden_stem_by_month->name }}</div>
                        <div class="text-container {{ $result->heavenly_stem_month->color }} font-semibold text-base leading-tight">{{ $result->heavenly_stem_month->name }}</div>
                        <div class="text-[11px] {{ $result->heavenly_stem_month->color }}">{{ ($result->heavenly_stem_month->polarity == "Dương" ? "+" : "-") . $result->heavenly_stem_month->yin_yang }}</div>
                    </td>

                    <!-- Ô đặc biệt: Nhật Chủ -->
                    <td class="text-custom-size border border-gray-400 bg-[#f0f0ea] text-center text-xs">
                        <div class="font-custom-size text-[11px] font-bold mb-1">Nhật Chủ</div>
                        <div class="text-container {{ $result->heavenly_stem_day->color }} font-semibold text-base leading-tight">{{ $result->heavenly_stem_day->name }}</div>
                        <div class="text-[11px] {{ $result->heavenly_stem_day->color }}">{{ ($result->heavenly_stem_day->polarity == "Dương" ? "+" : "-") . $result->heavenly_stem_day->yin_yang }}</div>
                    </td>

                    <td class="border border-gray-400 bg-[#fdf8ec] text-center text-xs">
                        <div class="text-[11px] text-gray-600 mb-1">{{ isset($result->heavenly_stem_hour->hidden_stem_by_hour) ? $result->heavenly_stem_hour->hidden_stem_by_hour->name : '' }}</div>
                        <div class="text-container {{ isset($result->heavenly_stem_hour->color) ? $result->heavenly_stem_hour->color : '' }} font-semibold text-base leading-tight">
                            {{ isset($result->heavenly_stem_hour->name) ? $result->heavenly_stem_hour->name : '' }}
                        </div>
                        <div class="text-[11px] {{ isset($result->heavenly_stem_hour->color) ? $result->heavenly_stem_hour->color : '' }}">
                            {{ (isset($result->heavenly_stem_hour->polarity) ? ($result->heavenly_stem_hour->polarity == "Dương" ? "+" : "-") : '') . (isset($result->heavenly_stem_hour->yin_yang) ? $result->heavenly_stem_hour->yin_yang : '') }}
                        </div>
                    </td>
                </tr>

                <tr>
                    <td rowspan="1" class="text-custom-gray border border-gray-400 bg-[#f5e4c3] font-semibold text-xs text-center" style="height: 150px; width: 25px;">
                        <div style="writing-mode: vertical-rl; transform: rotate(180deg); height: 100%; width: 100%; display: flex; justify-content: center; align-items: center;">
                            Địa
                        </div>
                    </td>
                    <td class="text-custom-yellow border border-gray-400 font-bold">ĐỊA CHI</td>
                    <!-- Theo năm -->
                    <td class="border border-gray-400 {{ $result->earthly_branch->color }} font-bold">
                        <span class="text-container">{{ $result->earthly_branch->name }}</span>
                        <br>
                        <span class="text-xs">
                            {{ ($result->earthly_branch->polarity == "Dương" ? "+" : "-") . $result->earthly_branch->yin_yang }}
                        </span>
                    </td>
                    <!-- Theo tháng -->
                    <td class="border border-gray-400 {{ $result->earthly_branch_month->color }} font-bold">
                        <span class="text-container">{{ $result->earthly_branch_month->name }}</span>
                        <br>
                        <span class="text-xs">
                            {{ ($result->earthly_branch_month->polarity == "Dương" ? "+" : "-") . $result->earthly_branch_month->yin_yang }}
                        </span>
                    </td>
                    <!-- Theo ngày -->
                    <td class="border border-gray-400 {{ $result->earthly_branch_day->color }} font-bold">
                        <span class="text-container">{{ $result->earthly_branch_day->name }}</span>
                        <br>
                        <span class="text-xs">
                            {{ ($result->earthly_branch_day->polarity == "Dương" ? "+" : "-") . $result->earthly_branch_day->yin_yang }}
                        </span>
                    </td>
                    <!-- Theo giờ -->
                    <td class="border border-gray-400 {{ isset($result->earthly_branch_hour->color) ? $result->earthly_branch_hour->color : '' }} font-bold">
                        <span class="text-container">{{ isset($result->earthly_branch_hour->name) ? $result->earthly_branch_hour->name : '' }}</span>
                        <br>
                        <span class="text-xs">
                            {{ (isset($result->earthly_branch_hour->polarity) ? ($result->earthly_branch_hour->polarity == "Dương" ? "+" : "-") : '') . (isset($result->earthly_branch_hour->yin_yang) ? $result->earthly_branch_hour->yin_yang : '') }}
                        </span>
                    </td>
                </tr>

                <tr>
                    <td rowspan="1" class="text-custom-gray border border-gray-400 bg-[#f5e4c3] font-semibold text-xs text-center" style="height: 150px; width: 25px;">
                        <div style="writing-mode: vertical-rl; transform: rotate(180deg); height: 100%; width: 100%; display: flex; justify-content: center; align-items: center;">
                            Nhân
                        </div>
                    </td>
                    <td class="text-custom-yellow border border-gray-400 font-bold">TÀNG CAN</td>
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

                <tr>
                    <td class="text-custom-brown text-right pr-6 border border-gray-400" colspan="2">NẠP ÂM</td>
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
                <tr>
                    <td class="text-custom-brown text-right pr-6 border border-gray-400" colspan="2">TRƯỜNG SINH</td>
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
                <tr>
                    <td class="text-custom-brown text-right pr-6 border border-gray-400" colspan="2">THẦN SÁT</td>
                    <td class="border border-gray-400">Thiên Hỷ<br>Địa Võng</td>
                    <td class="border border-gray-400"></td>
                    <td class="border border-gray-400">Cô Thần<br>Lục Quý Hợp</td>
                    <td class="border border-gray-400">Tướng Tinh<br>Quý Thực</td>
                </tr>
            </tbody>
        </table>

        <div class="content-charts mt-5">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 relative">

                <div class="chart-wrapper col-span-1 bg-white rounded-xl shadow-md flex flex-col items-center">
                    <h2 class="text-xl font-bold text-gray-800 text-center p-4">Ngũ Hành Thập Thần</h2>
                    <div class="flex flex-col items-start justify-center w-full flex-grow p-6">
                        <div class="relative w-full h-full min-h-[250px]">
                            <canvas id="thapThanChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="chart-wrapper col-span-1 bg-white rounded-xl shadow-md flex flex-col items-center">
                    <h2 class="text-xl font-bold text-gray-800 text-center p-4">Ngũ Hành phân phối</h2>
                    <div class="flex flex-col items-center justify-center w-full flex-grow p-6">
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

                <div class="chart-wrapper col-span-1 bg-white rounded-xl shadow-md flex flex-col items-center">
                    <h2 class="text-xl font-bold text-gray-800 text-center p-4">Ngũ Hành tương quan</h2>
                    <div class="relative flex items-center justify-center w-full max-w-[250px] aspect-square flex-grow p-6">
                        <canvas id="nguHanhChart"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- 2. DỤNG THẦN -->
    <div class="container mx-auto bg-white p-6 rounded-lg shadow-lg mt-5">
        <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">2. DỤNG THẦN</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Mệnh Khuyết Section --}}
            <div class="chart-wrapper border rounded-lg bg-red-50 border-red-200">
                <h2 class="text-xl font-semibold mb-2 text-red-600 text-center p-4">Mệnh Khuyết</h2>
                <h3 class="text-2xl font-bold mb-3 text-red-700 text-center pl-4 pr-4">Mộc</h3>
                <p class="text-gray-700 text-sm pl-4 pr-4">Mộc là cây cối sinh sôi, trăm hoa đua nở, là mùa xuân tươi mới khi vạn vật phát triển, sinh lực dồi dào. Người khuyết Mộc thường thiếu sự linh hoạt trong tư duy, dễ trở nên bảo thủ, chậm thay đổi hoặc thiếu động lực phát triển. Trong giao tiếp, họ có thể ít sự mềm mại, dễ lặp lại lời nói cũ mà khó tìm đường mới. Cuộc sống dễ bị trì trệ thiếu cảm hứng, thiếu ý tưởng hoặc thiếu khát vọng vươn lên.</p>
            </div>

            {{-- Mệnh Yếu Section --}}
            <div class="chart-wrapper border rounded-lg bg-yellow-50 border-yellow-200">
                <h2 class="text-xl font-semibold mb-2 text-yellow-600 text-center p-4">Mệnh Yếu</h2>
                <h3 class="text-2xl font-bold mb-3 text-yellow-700 text-center pl-4 pr-4">Hỏa</h3>
                <p class="text-gray-700 text-sm pl-4 pr-4">Hỏa là ngọn lửa rực cháy, là mặt trời giữa mùa hạ - tỏa sáng, ấm áp, rực rỡ và đầy nhiệt huyết. Hỏa biểu trưng cho đam mê, sự thể hiện bản thân, lòng can đảm và tinh thần chủ động. Người khuyết Hỏa thường thiếu năng lượng, dễ mất động lực, ít bộc lộ cảm xúc hoặc cảm thấy lạc lõng giữa đám đông. Họ có xu hướng sống hướng nội, khó thể hiện bản thân và dễ để lỡ những cơ hội tốt vì thiếu sự bứt phá hay quyết đoán.</p>
            </div>

            {{-- Ngũ Hành đối ứng (Chart) Section --}}
            <div class="chart-wrapper border rounded-lg bg-blue-50 border-blue-200 flex flex-col items-center justify-between">
                <h2 class="text-xl font-semibold mb-4 text-blue-600 text-center p-4">Ngũ Hành đối ứng</h2>
                <div class="relative w-full max-w-xs mx-auto pl-4 pr-4">
                    <canvas id="nguHanhChart1"></canvas>
                </div>
            </div>
        </div>
        <div class="text-sm text-gray-700 mt-4 text-right">
            Bố cục 10 thành tố: 
            1 <span style="color:#4A201B;">Thổ</span> - 
            1 <span style="color:#337AB7;">Thủy</span> - 
            4 <span style="color:#7CB342;">Mộc</span> - 
            2 <span style="color:#F0AD4E;">Kim</span> - 
            2 <span style="color:#D9534F;">Hỏa</span>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    window.LaravelData = @json($result);
</script>
@endpush