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

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 relative">
            <div class="bg-white rounded-lg shadow p-4 h-[300px] relative">
                <h3 class="text-lg font-semibold mb-2">Ngũ Hành Thập Thần</h3>
                <canvas id="chartThapThan"></canvas>
            </div>

            <!--<div class="relative bg-white rounded-lg shadow p-4 w-full h-[400px]">
                <h3 class="text-lg font-semibold text-center mb-4 h-[30px]">Ngũ Hành Phân Phối</h3>

                <div class="item-content relative">
                    <div class="item-center absolute w-40 h-40 -translate-x-1/2 -translate-y-1/2 rounded-full border-4 border-black bg-white flex flex-col items-center justify-center z-10">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-40 -40 80 80">
                            <circle r="39" />
                            <path fill="#fff" d="M0,38a38,38 0 0 1 0,-76a19,19 0 0 1 0,38a19,19 0 0 0 0,38" />
                            <circle r="5" cy="19" fill="#fff" />
                            <circle r="5" cy="-19" />
                            <savior-host xmlns="http://www.w3.org/1999/xhtml" style="all: unset; position: absolute; top: 0; left: 0; z-index: 99999999999999; display: block !important; overflow: unset"></savior-host><en2vi-host xmlns="http://www.w3.org/1999/xhtml" class="corom-element" version="3" style="all: initial; position: absolute; top: 0; left: 0; right: 0; height: 0; margin: 0; text-align: left; z-index: 10000000000; pointer-events: none; border: none; display: block"></en2vi-host><savior-host xmlns="http://www.w3.org/1999/xhtml" style="all: unset; position: absolute; top: 0; left: 0; z-index: 99999999999999; display: block !important; overflow: unset"></savior-host>
                        </svg>

                        <div class="absolute z-10 text-center">
                            <div class="text-xs font-semibold text-white">Nhâm</div>
                            <div class="text-sm font-bold text-white">Thủy</div>
                        </div>
                    </div>

                    <div class="item-top-center absolute top-[8%] left-1/2 -translate-x-1/2">
                        <div class="w-24 h-24 rounded-full bg-green-600 text-white text-xs font-semibold flex flex-col items-center justify-center shadow">
                            <div>Mộc</div>
                            <div class="text-[10px]">-1</div>
                        </div>
                        <div class="svg-line">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" width="96px" height="10px" viewBox="0 0 290.658 290.658" xml:space="preserve">
                                <g>
                                    <g>
                                        <rect y="139.474" style="fill:rgba(5,150,105);" width="800" height="200" />
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="item-top-right absolute top-[28%] right-[5%]">
                        <div class="w-24 h-24 rounded-full bg-red-500 text-white text-xs font-semibold flex flex-col items-center justify-center shadow">
                            <div>Hỏa</div>
                            <div class="text-[10px]">-2</div>
                        </div>
                        <div class="svg-line">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" width="96px" height="10px" viewBox="0 0 290.658 290.658" xml:space="preserve">
                                <g>
                                    <g>
                                        <rect y="139.474" style="fill:rgba(239, 68, 68);" width="800" height="200" />
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="item-bottom-right absolute bottom-[8%] right-[20%]">
                        <div class="w-24 h-24 rounded-full bg-yellow-900 text-white text-xs font-semibold flex flex-col items-center justify-center shadow">
                            <div>Thổ</div>
                            <div class="text-[10px]">+10</div>
                        </div>
                        <div class="svg-line">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" width="96px" height="10px" viewBox="0 0 290.658 290.658" xml:space="preserve">
                                <g>
                                    <g>
                                        <rect y="139.474" style="fill:rgba(120, 53, 15);" width="800" height="200" />
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="item-bottom-left absolute bottom-[8%] left-[20%]">
                        <div class="w-24 h-24 rounded-full bg-yellow-300 text-black text-xs font-semibold flex flex-col items-center justify-center shadow">
                            <div>Kim</div>
                            <div class="text-[10px]">+4</div>
                        </div>
                        <div class="svg-line">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" width="96px" height="10px" viewBox="0 0 290.658 290.658" xml:space="preserve">
                                <g>
                                    <g>
                                        <rect y="139.474" style="fill:rgba(252, 211, 77);" width="800" height="200" />
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="item-top-left absolute top-[28%] left-[5%]">
                        <div class="w-24 h-24 rounded-full bg-blue-900 text-white text-xs font-semibold flex flex-col items-center justify-center shadow">
                            <div>Thủy</div>
                            <div class="text-[10px]">+5</div>
                        </div>
                        <div class="svg-line">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" width="96px" height="10px" viewBox="0 0 290.658 290.658" xml:space="preserve">
                                <g>
                                    <g>
                                        <rect y="139.474" style="fill:rgba(30, 58, 138);" width="800" height="200" />
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>-->

            <div class="relative bg-white rounded-lg shadow p-4 max-w-xl aspect-square">
                <h3 class="text-lg font-semibold text-center mb-4">Ngũ Hành Phân Phối</h3>

                <!-- Vòng tròn bố cục -->
                <div class="relative w-full h-full flex items-center justify-center">
                    <!-- Trung tâm Âm Dương -->
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-32 h-32 rounded-full border-4 border-black bg-white flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-40 -40 80 80" class="absolute w-full h-full">
                            <circle r="39" fill="black" />
                            <path fill="white" d="M0,38a38,38 0 0 1 0,-76a19,19 0 0 1 0,38a19,19 0 0 0 0,38" />
                            <circle r="5" cy="19" fill="white" />
                            <circle r="5" cy="-19" fill="black" />
                        </svg>
                        <div class="z-10 text-center">
                            <div class="text-xs font-semibold text-white">Nhâm</div>
                            <div class="text-sm font-bold text-white">Thủy</div>
                        </div>
                    </div>

                    <!-- Đường nối -->
                    <svg class="absolute w-full h-full z-0" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid slice">
                        <line x1="50" y1="10" x2="84" y2="30" stroke="#ccc" stroke-width="1.5" marker-end="url(#arrow)" />
                        <line x1="84" y1="30" x2="75" y2="84" stroke="#ccc" stroke-width="1.5" marker-end="url(#arrow)" />
                        <line x1="75" y1="84" x2="25" y2="84" stroke="#ccc" stroke-width="1.5" marker-end="url(#arrow)" />
                        <line x1="25" y1="84" x2="16" y2="30" stroke="#ccc" stroke-width="1.5" marker-end="url(#arrow)" />
                        <line x1="16" y1="30" x2="50" y2="10" stroke="#ccc" stroke-width="1.5" marker-end="url(#arrow)" />
                        <defs>
                            <marker id="arrow" markerWidth="6" markerHeight="6" refX="5" refY="3" orient="auto" markerUnits="strokeWidth">
                                <path d="M0,0 L0,6 L6,3 z" fill="#ccc" />
                            </marker>
                        </defs>
                    </svg>

                    <!-- Các hành xung quanh -->
                    <div class="absolute top-[5%] left-1/2 transform -translate-x-1/2">
                        <div class="w-20 h-20 rounded-full bg-green-600 text-white text-xs font-semibold flex flex-col items-center justify-center shadow">
                            <div>Mộc</div>
                            <div class="text-[10px]">-1</div>
                        </div>
                    </div>

                    <div class="absolute top-[20%] right-[5%]">
                        <div class="w-20 h-20 rounded-full bg-red-500 text-white text-xs font-semibold flex flex-col items-center justify-center shadow">
                            <div>Hỏa</div>
                            <div class="text-[10px]">-2</div>
                        </div>
                    </div>

                    <div class="absolute bottom-[5%] right-[20%]">
                        <div class="w-20 h-20 rounded-full bg-yellow-900 text-white text-xs font-semibold flex flex-col items-center justify-center shadow">
                            <div>Thổ</div>
                            <div class="text-[10px]">+10</div>
                        </div>
                    </div>

                    <div class="absolute bottom-[5%] left-[20%]">
                        <div class="w-20 h-20 rounded-full bg-yellow-300 text-black text-xs font-semibold flex flex-col items-center justify-center shadow">
                            <div>Kim</div>
                            <div class="text-[10px]">+4</div>
                        </div>
                    </div>

                    <div class="absolute top-[20%] left-[5%]">
                        <div class="w-20 h-20 rounded-full bg-blue-900 text-white text-xs font-semibold flex flex-col items-center justify-center shadow">
                            <div>Thủy</div>
                            <div class="text-[10px]">+5</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-4 h-[300px] relative">
                <h3 class="text-lg font-semibold mb-2">Ngũ Hành Tương Quan</h3>
                <canvas id="chartTuongQuan"></canvas>
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
    // Block 1: Ngũ Hành Thập Thần
    new Chart(document.getElementById('chartThapThan'), {
        type: 'bar',
        data: {
            labels: [
                'Thiên Tài',
                'Tỷ Kiên',
                'Kiếp Tài',
                'Chính Ấn',
                'Thực Thần',
                'Thương Quan',
                'Chính Quan',
                'Thất Sát',
                'Thiên Ấn',
                'Chính Tài'
            ],
            datasets: [{
                label: '%',
                data: [90, 82, 76, 72, 50, 48],
                backgroundColor: '#89d8f5',
                borderRadius: 6,
                barPercentage: 0.8,
                categoryPercentage: 0.7
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.parsed.x}%`;
                        }
                    }
                },
                datalabels: {
                    anchor: 'end',
                    align: 'right',
                    formatter: (value) => value + '%',
                    color: '#000',
                    font: {
                        weight: 'bold'
                    }
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    max: 100,
                    grid: {
                        display: false
                    }
                },
                y: {
                    position: 'left',
                    ticks: {
                        align: 'start',
                        padding: 10,
                        color: (context) => {
                            const label = context.tick.label;
                            const colorMap = {
                                'Thiên Tài': '#26a269',
                                'Tỷ Kiên': '#585858',
                                'Kiếp Tài': '#8d8d8d',
                                'Chính Ấn': '#c69c6d',
                                'Thực Thần': '#1f4e79',
                                'Thương Quan': '#3366cc',
                                'Chính Quan': '#cc0000',
                                'Thất Sát': '#d43f00',
                                'Thiên Ấn': '#d4aa00',
                                'Chính Tài': '#1f7a1f'
                            };
                            return colorMap[label] || '#000';
                        }
                    },
                    grid: {
                        display: false
                    }
                }
            }
        }
    });


    // Block 2: Ngũ Hành Phân Phối

    // Block 3: Ngũ Hành Tương Quan
    new Chart(document.getElementById('chartTuongQuan'), {
        type: 'pie',
        data: {
            labels: ['Mộc', 'Hỏa', 'Thổ', 'Kim', 'Thủy'],
            datasets: [{
                data: [4, 9, 45, 18, 22],
                backgroundColor: ['#4ade80', '#f87171', '#a78bfa', '#facc15', '#38bdf8']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endpush