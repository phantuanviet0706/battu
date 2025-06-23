@extends('layouts.app')

@section('content')
{{-- Main container with responsive padding --}}
<div class="p-4 sm:p-6 bg-gray-100 result-page-container">
    {{-- Main content block with responsive padding and shadow --}}
    <div id="lasotuvi" class="bg-white shadow rounded-lg p-4 sm:p-6 relative">
        {{-- Export button for Lá Số: Positioned absolutely for fixed placement, with responsive padding and font size --}}
        <button id="exportLaSoBtn" class="absolute top-3 right-3 px-2 py-1 text-[10px] bg-blue-500 text-white rounded-md cursor-pointer z-10 hover:bg-blue-600 transition-colors duration-200 sm:top-5 sm:right-5 sm:px-4 sm:py-2 sm:text-sm">
            Export
        </button>
        {{-- Section title with responsive text size and adjusted width to prevent overlap with absolute button --}}
        <h1 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-8 text-center text-gray-800 w-full max-w-[calc(100%-100px)] mx-auto sm:max-w-none">1. LÁ SỐ</h1>
        {{-- Head container for name and birth info --}}
        <div class="head-container text-center mb-4">
            <h3 class="text-lg sm:text-xl font-bold">{{ $result->name }}</h3>
            <p class="text-xs sm:text-sm">
                {{ (isset($result->input->hour) ? $result->input->hour : 0) . "h" . (isset($result->input->minute) ? $result->input->minute : 0) }}
                -
                {{ $result->input->day . "/" . $result->input->month . "/" . $result->input->year }}
                -
                {{ isset($result->gender) ? ($result->gender == 'male' ? 'Nam' : 'Nữ') : 'unknown' }}
            </p>
        </div>

        {{-- Responsive table container for horizontal scrolling --}}
        <div class="overflow-x-auto">
            {{-- Table with minimum width for content, responsive text size --}}
            <table class="min-w-full text-center border border-collapse border-gray-400 text-xs sm:text-sm">
                <thead>
                    <tr class="bg-[#c8b48c]">
                        {{-- Table header for Lá số bát tự, with responsive min-width --}}
                        <th class="text-custom-gray border border-gray-400 bg-[#5c5c2e]" colspan="2" style="width: 200px; min-width: 120px;">
                            <i>Lá số bát tự</i>
                        </th>
                        {{-- Responsive table headers for columns --}}
                        <th class="text-custom-header border border-gray-400 p-2" style="min-width: 80px;">TRỤ NĂM</th>
                        <th class="text-custom-header border border-gray-400 p-2" style="min-width: 80px;">TRỤ THÁNG</th>
                        <th class="text-custom-header border border-gray-400 p-2" style="min-width: 80px;">TRỤ NGÀY</th>
                        <th class="text-custom-header border border-gray-400 p-2" style="min-width: 80px;">TRỤ GIỜ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        {{-- Vertical header for Lịch pháp, with responsive sizing --}}
                        <td rowspan="3" class="text-custom-gray border border-gray-400 bg-[#f5e4c3] font-semibold text-xs text-center" style="height: 150px; width: 25px; min-width: 25px;">
                            <div class="flex items-center justify-center h-full w-full" style="writing-mode: vertical-rl; transform: rotate(180deg);">
                                Lịch pháp
                            </div>
                        </td>
                        {{-- Dương Lịch row --}}
                        <td class="text-custom-yellow border border-gray-400 bg-[#f5e4c3] text-[#8b3c14] font-bold p-2" style="width: 175px; min-width: 90px;">DƯƠNG LỊCH</td>
                        <td class="border border-gray-400 bg-[#f5e4c3] p-2">{{ $result->input->year }}</td>
                        <td class="border border-gray-400 bg-[#f5e4c3] p-2">{{ $result->input->month }}</td>
                        <td class="border border-gray-400 bg-[#f5e4c3] p-2">{{ $result->input->day }}</td>
                        {{-- Hour/Minute cell spanning 3 rows --}}
                        <td class="border border-gray-400 bg-[#f5e4c3] p-2" rowspan="3">{{ isset($result->input->hour) ? $result->input->hour : 0 }}:{{ isset($result->input->minute) ? $result->input->minute : 0 }}</td>
                    </tr>
                    <tr>
                        {{-- Âm Lịch row --}}
                        <td class="text-custom-yellow border border-gray-400 bg-[#f5e4c3] text-[#8b3c14] font-bold p-2">ÂM LỊCH</td>
                        <td class="border border-gray-400 bg-[#f5e4c3] p-2">{{ $result->input->lunar_year }}</td>
                        <td class="border border-gray-400 bg-[#f5e4c3] p-2">{{ $result->input->lunar_month }}</td>
                        <td class="border border-gray-400 bg-[#f5e4c3] p-2">{{ $result->input->lunar_day }}</td>
                    </tr>
                    <tr>
                        {{-- Nông Lịch row --}}
                        <td class="text-custom-yellow border border-gray-400 bg-[#f5e4c3] text-[#8b3c14] font-bold p-2">NÔNG LỊCH</td>
                        <td class="border border-gray-400 bg-[#f5e4c3] p-2">{{ $result->input->lunar_year }}</td>
                        <td class="border border-gray-400 bg-[#f5e4c3] p-2">{{ isset($result->agricultural->selected_range->name) ? $result->agricultural->selected_range->name : 'unknown' }}</td>
                        <td class="border border-gray-400 bg-[#f5e4c3] p-2">{{ $result->input->lunar_day }}</td>
                    </tr>

                    <tr>
                        {{-- Vertical header for Thiên --}}
                        <td rowspan="1" class="text-custom-gray border border-gray-400 bg-[#f5e4c3] font-semibold text-xs text-center" style="height: 150px; width: 25px; min-width: 25px;">
                            <div class="flex items-center justify-center h-full w-full" style="writing-mode: vertical-rl; transform: rotate(180deg);">
                                Thiên
                            </div>
                        </td>
                        {{-- Thiên Can row --}}
                        <td class="text-custom-yellow border border-gray-400 font-bold p-2">THIÊN CAN</td>
                        {{-- Thiên Can by Year --}}
                        <td class="border border-gray-400 bg-[#fdf8ec] text-center text-xs p-2">
                            <div class="text-[11px] text-gray-600 mb-1">{{ $result->heavenly_stem->hidden_stem_by_year->name }}</div>
                            <div class="text-container {{ $result->heavenly_stem->color }} font-normal text-base leading-tight">{{ $result->heavenly_stem->name }}</div>
                            <div class="text-[11px] {{ $result->heavenly_stem->color }}">{{ ($result->heavenly_stem->polarity == "Dương" ? "+" : "-") . $result->heavenly_stem->yin_yang }}</div>
                        </td>
                        {{-- Thiên Can by Month --}}
                        <td class="border border-gray-400 bg-[#fdf8ec] text-center text-xs p-2">
                            <div class="text-[11px] text-gray-600 mb-1">{{ $result->heavenly_stem_month->hidden_stem_by_month->name }}</div>
                            <div class="text-container {{ $result->heavenly_stem_month->color }} font-normal text-base leading-tight">{{ $result->heavenly_stem_month->name }}</div>
                            <div class="text-[11px] {{ $result->heavenly_stem_month->color }}">{{ ($result->heavenly_stem_month->polarity == "Dương" ? "+" : "-") . $result->heavenly_stem_month->yin_yang }}</div>
                        </td>
                        {{-- Nhật Chủ --}}
                        <td class="text-custom-size border border-gray-400 bg-[#f0f0ea] text-center text-xs p-2">
                            <div class="font-custom-size text-[11px] font-bold mb-1">Nhật Chủ</div>
                            <div class="text-container {{ $result->heavenly_stem_day->color }} font-normal text-base leading-tight">{{ $result->heavenly_stem_day->name }}</div>
                            <div class="text-[11px] {{ $result->heavenly_stem_day->color }}">{{ ($result->heavenly_stem_day->polarity == "Dương" ? "+" : "-") . $result->heavenly_stem_day->yin_yang }}</div>
                        </td>
                        {{-- Thiên Can by Hour --}}
                        <td class="border border-gray-400 bg-[#fdf8ec] text-center text-xs p-2">
                            <div class="text-[11px] text-gray-600 mb-1">{{ isset($result->heavenly_stem_hour->hidden_stem_by_hour) ? $result->heavenly_stem_hour->hidden_stem_by_hour->name : '' }}</div>
                            <div class="text-container {{ isset($result->heavenly_stem_hour->color) ? $result->heavenly_stem_hour->color : '' }} font-normal text-base leading-tight">
                                {{ isset($result->heavenly_stem_hour->name) ? $result->heavenly_stem_hour->name : '' }}
                            </div>
                            <div class="text-[11px] {{ isset($result->heavenly_stem_hour->color) ? $result->heavenly_stem_hour->color : '' }}">
                                {{ (isset($result->heavenly_stem_hour->polarity) ? ($result->heavenly_stem_hour->polarity == "Dương" ? "+" : "-") : '') . (isset($result->heavenly_stem_hour->yin_yang) ? $result->heavenly_stem_hour->yin_yang : '') }}
                            </div>
                        </td>
                    </tr>

                    <tr>
                        {{-- Vertical header for Địa --}}
                        <td rowspan="1" class="text-custom-gray border border-gray-400 bg-[#f5e4c3] font-semibold text-xs text-center" style="height: 150px; width: 25px; min-width: 25px;">
                            <div class="flex items-center justify-center h-full w-full" style="writing-mode: vertical-rl; transform: rotate(180deg);">
                                Địa
                            </div>
                        </td>
                        {{-- Địa Chi row --}}
                        <td class="text-custom-yellow border border-gray-400 font-bold p-2">ĐỊA CHI</td>
                        {{-- Địa Chi by Year --}}
                        <td class="border border-gray-400 {{ $result->earthly_branch->color }} font-bold p-2">
                            <span class="text-container font-normal">{{ $result->earthly_branch->name }}</span>
                            <br>
                            <span class="text-xs">
                                {{ ($result->earthly_branch->polarity == "Dương" ? "+" : "-") . $result->earthly_branch->yin_yang }}
                            </span>
                        </td>
                        {{-- Địa Chi by Month --}}
                        <td class="border border-gray-400 {{ $result->earthly_branch_month->color }} font-bold p-2">
                            <span class="text-container font-normal">{{ $result->earthly_branch_month->name }}</span>
                            <br>
                            <span class="text-xs">
                                {{ ($result->earthly_branch_month->polarity == "Dương" ? "+" : "-") . $result->earthly_branch_month->yin_yang }}
                            </span>
                        </td>
                        {{-- Địa Chi by Day --}}
                        <td class="border border-gray-400 {{ $result->earthly_branch_day->color }} font-bold p-2">
                            <span class="text-container font-normal">{{ $result->earthly_branch_day->name }}</span>
                            <br>
                            <span class="text-xs">
                                {{ ($result->earthly_branch_day->polarity == "Dương" ? "+" : "-") . $result->earthly_branch_day->yin_yang }}
                            </span>
                        </td>
                        {{-- Địa Chi by Hour --}}
                        <td class="border border-gray-400 {{ isset($result->earthly_branch_hour->color) ? $result->earthly_branch_hour->color : '' }} font-bold p-2">
                            <span class="text-container font-normal">{{ isset($result->earthly_branch_hour->name) ? $result->earthly_branch_hour->name : '' }}</span>
                            <br>
                            <span class="text-xs">
                                {{ (isset($result->earthly_branch_hour->polarity) ? ($result->earthly_branch_hour->polarity == "Dương" ? "+" : "-") : '') . (isset($result->earthly_branch_hour->yin_yang) ? $result->earthly_branch_hour->yin_yang : '') }}
                            </span>
                        </td>
                    </tr>

                    <tr>
                        {{-- Vertical header for Nhân --}}
                        <td rowspan="1" class="text-custom-gray border border-gray-400 bg-[#f5e4c3] font-semibold text-xs text-center" style="height: 150px; width: 25px; min-width: 25px;">
                            <div class="flex items-center justify-center h-full w-full" style="writing-mode: vertical-rl; transform: rotate(180deg);">
                                Nhân
                            </div>
                        </td>

                        {{-- Tàng Can row header --}}
                        <td class="text-custom-yellow border border-gray-400 font-bold p-2 text-center">TÀNG CAN</td>

                        {{-- Tàng Can by Year --}}
                        <td class="border border-gray-400 p-1 align-top">
                            {{-- Adjusted flex container for hidden items for horizontal stacking and even distribution --}}
                            <div class="flex flex-row items-center justify-around gap-1 mt-2 sm:mt-8 h-full"> {{-- Added h-full to make sure content fills the cell for proper distribution --}}
                                @if (isset($result->heavenly_stem->hidden_hs_in_eb_by_year))
                                @php
                                $hidden_items_by_year = $result->heavenly_stem->hidden_hs_in_eb_by_year;
                                @endphp
                                @if ($hidden_items_by_year && isset($hidden_items_by_year->hidden))
                                @foreach ($hidden_items_by_year->hidden as $hidden_item)
                                {{-- Individual hidden item with responsive padding and text sizes --}}
                                <div class="px-1 text-center flex-1"> {{-- Added flex-1 to make items share space equally --}}
                                    <div class="mb-1 text-gray-700 text-[10px] sm:text-[11px]">{{ $hidden_item->hidden_combo }}</div>
                                    <div class="text-sub-container mb-1 {{ $hidden_item->text_color }} font-semibold text-sm sm:text-base">{{ $hidden_item->heavenly_stem }}</div>
                                    <div class="mb-1 {{ $hidden_item->text_color }} text-[10px] sm:text-[11px]">{{ ($hidden_item->polarity == 'Dương' ? "+" : "-") . $hidden_item->yin_yang }}</div>
                                </div>
                                @endforeach
                                @endif
                                @endif
                            </div>
                        </td>

                        {{-- Tàng Can by Month --}}
                        <td class="border border-gray-400 p-1 align-top">
                            <div class="flex flex-row items-center justify-around gap-1 mt-2 sm:mt-8 h-full">
                                @if (isset($result->heavenly_stem_month->hidden_hs_in_eb_by_month))
                                @php
                                $hidden_items_by_month = $result->heavenly_stem_month->hidden_hs_in_eb_by_month;
                                @endphp
                                @if ($hidden_items_by_month && isset($hidden_items_by_month->hidden))
                                @foreach ($hidden_items_by_month->hidden as $hidden_item)
                                <div class="px-1 text-center flex-1">
                                    <div class="mb-1 text-gray-700 text-[10px] sm:text-[11px]">{{ $hidden_item->hidden_combo }}</div>
                                    <div class="text-sub-container mb-1 {{ $hidden_item->text_color }} font-semibold text-sm sm:text-base">{{ $hidden_item->heavenly_stem }}</div>
                                    <div class="mb-1 {{ $hidden_item->text_color }} text-[10px] sm:text-[11px]">{{ ($hidden_item->polarity == 'Dương' ? "+" : "-") . $hidden_item->yin_yang }}</div>
                                </div>
                                @endforeach
                                @endif
                                @endif
                            </div>
                        </td>

                        {{-- Tàng Can by Day --}}
                        <td class="border border-gray-400 p-1 align-top">
                            <div class="flex flex-row items-center justify-around gap-1 mt-2 sm:mt-8 h-full">
                                @if (isset($result->heavenly_stem_day->hidden_hs_in_eb_by_day))
                                @php
                                $hidden_items_by_day = $result->heavenly_stem_day->hidden_hs_in_eb_by_day;
                                @endphp
                                @if ($hidden_items_by_day && isset($hidden_items_by_day->hidden))
                                @foreach ($hidden_items_by_day->hidden as $hidden_item)
                                <div class="px-1 text-center flex-1">
                                    <div class="mb-1 text-gray-700 text-[10px] sm:text-[11px]">{{ $hidden_item->hidden_combo }}</div>
                                    <div class="text-sub-container mb-1 {{ $hidden_item->text_color }} font-semibold text-sm sm:text-base">{{ $hidden_item->heavenly_stem }}</div>
                                    <div class="mb-1 {{ $hidden_item->text_color }} text-[10px] sm:text-[11px]">{{ ($hidden_item->polarity == 'Dương' ? "+" : "-") . $hidden_item->yin_yang }}</div>
                                </div>
                                @endforeach
                                @endif
                                @endif
                            </div>
                        </td>

                        {{-- Tàng Can by Hour --}}
                        <td class="border border-gray-400 p-1 align-top">
                            <div class="flex flex-row items-center justify-around gap-1 mt-2 sm:mt-8 h-full">
                                @if (isset($result->heavenly_stem_hour->hidden_hs_in_eb_by_hour))
                                @php
                                $hidden_items_by_hour = $result->heavenly_stem_hour->hidden_hs_in_eb_by_hour;
                                @endphp
                                @if ($hidden_items_by_hour && isset($hidden_items_by_hour->hidden))
                                @foreach ($hidden_items_by_hour->hidden as $hidden_item)
                                <div class="px-1 text-center flex-1">
                                    <div class="mb-1 text-gray-700 text-[10px] sm:text-[11px]">{{ $hidden_item->hidden_combo }}</div>
                                    <div class="text-sub-container mb-1 {{ $hidden_item->text_color }} font-semibold text-sm sm:text-base">{{ $hidden_item->heavenly_stem }}</div>
                                    <div class="mb-1 {{ $hidden_item->text_color }} text-[10px] sm:text-[11px]">{{ ($hidden_item->polarity == 'Dương' ? "+" : "-") . $hidden_item->yin_yang }}</div>
                                </div>
                                @endforeach
                                @endif
                                @endif
                            </div>
                        </td>
                    </tr>

                    <tr>
                        {{-- Nạp Âm row --}}
                        <td class="text-custom-brown text-right pr-4 sm:pr-6 border border-gray-400 font-bold p-2" colspan="2">NẠP ÂM</td>
                        @if (isset($result->data_sound->elemental_sound))
                        <td class="border border-gray-400 p-2 text-xs sm:text-sm">{{ $result->data_sound->elemental_sound->name }} <span class="{{ $result->data_sound->elemental_sound->color }} font-bold">{{ $result->data_sound->elemental_sound->element }}</span></td>
                        @else
                        <td class="border border-gray-400 p-2"><span class="font-bold"></span></td>
                        @endif

                        @if (isset($result->data_sound->elemental_sound_month))
                        <td class="border border-gray-400 p-2 text-xs sm:text-sm">{{ $result->data_sound->elemental_sound_month->name }} <span class="{{ $result->data_sound->elemental_sound_month->color }} font-bold">{{ $result->data_sound->elemental_sound_month->element }}</span></td>
                        @else
                        <td class="border border-gray-400 p-2"><span class="font-bold"></span></td>
                        @endif

                        @if (isset($result->data_sound->elemental_sound_day))
                        <td class="border border-gray-400 p-2 text-xs sm:text-sm">{{ $result->data_sound->elemental_sound_day->name }} <span class="{{ $result->data_sound->elemental_sound_day->color }} font-bold">{{ $result->data_sound->elemental_sound_day->element }}</span></td>
                        @else
                        <td class="border border-gray-400 p-2"><span class="font-bold"></span></td>
                        @endif

                        @if (isset($result->data_sound->elemental_sound_hour))
                        <td class="border border-gray-400 p-2 text-xs sm:text-sm">{{ $result->data_sound->elemental_sound_hour->name }} <span class="{{ $result->data_sound->elemental_sound_hour->color }} font-bold">{{ $result->data_sound->elemental_sound_hour->element }}</span></td>
                        @else
                        <td class="border border-gray-400 p-2"><span class="font-bold"></span></td>
                        @endif
                    </tr>
                    <tr>
                        {{-- Trường Sinh row --}}
                        <td class="text-custom-brown text-right pr-4 sm:pr-6 border border-gray-400 font-bold p-2" colspan="2">TRƯỜNG SINH</td>
                        @if (isset($result->data_growth_stage->growth_stage->name))
                        <td class="border border-gray-400 p-2 text-xs sm:text-sm">{{ $result->data_growth_stage->growth_stage->name }}</td>
                        @else
                        <td class="border border-gray-400 p-2"></td>
                        @endif

                        @if (isset($result->data_growth_stage->growth_stage_month->name))
                        <td class="border border-gray-400 p-2 text-xs sm:text-sm">{{ $result->data_growth_stage->growth_stage_month->name }}</td>
                        @else
                        <td class="border border-gray-400 p-2"></td>
                        @endif

                        @if (isset($result->data_growth_stage->growth_stage_day->name))
                        <td class="border border-gray-400 p-2 text-xs sm:text-sm">{{ $result->data_growth_stage->growth_stage_day->name }}</td>
                        @else
                        <td class="border border-gray-400 p-2"></td>
                        @endif

                        @if (isset($result->data_growth_stage->growth_stage_hour->name))
                        <td class="border border-gray-400 p-2 text-xs sm:text-sm">{{ $result->data_growth_stage->growth_stage_hour->name }}</td>
                        @else
                        <td class="border border-gray-400 p-2"></td>
                        @endif
                    </tr>
                    <tr>
                        {{-- Thần Sát row --}}
                        <td class="text-custom-brown text-right pr-4 sm:pr-6 border border-gray-400 font-bold p-2" colspan="2">THẦN SÁT</td>
                        <td class="border border-gray-400 p-2 text-xs sm:text-sm">
                            @foreach ($result->shensha_system['year'] as $shensha)
                            <span>{{ $shensha }}</span><br />
                            @endforeach
                        </td>
                        <td class="border border-gray-400 p-2 text-xs sm:text-sm">
                            @foreach ($result->shensha_system['month'] as $shensha)
                            <span>{{ $shensha }}</span><br />
                            @endforeach
                        </td>
                        <td class="border border-gray-400 p-2 text-xs sm:text-sm">
                            @foreach ($result->shensha_system['day'] as $shensha)
                            <span>{{ $shensha }}</span><br />
                            @endforeach
                        </td>
                        <td class="border border-gray-400 p-2 text-xs sm:text-sm">
                            @foreach ($result->shensha_system['hour'] as $shensha)
                            <span>{{ $shensha }}</span><br />
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Content charts section --}}
        <div class="content-charts mt-5">
            {{-- Grid layout for charts, stacking on small screens and 3 columns on medium screens --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6 relative">

                {{-- Ngũ Hành Thập Thần Chart --}}
                <div class="chart-wrapper col-span-1 bg-white rounded-xl shadow-md flex flex-col items-center p-4">
                    <h2 class="text-lg sm:text-xl font-bold text-gray-800 text-center p-2 sm:p-4">Ngũ Hành Thập Thần</h2>
                    <div class="flex flex-col items-start justify-center w-full flex-grow p-2 sm:p-6">
                        <div class="relative w-full h-full min-h-[200px] sm:min-h-[250px]">
                            <canvas id="thapThanChart"></canvas>
                        </div>
                    </div>
                </div>

                {{-- Ngũ Hành phân phối Chart --}}
                <div class="chart-wrapper col-span-1 bg-white rounded-xl shadow-md flex flex-col items-center p-4">
                    <h2 class="text-lg sm:text-xl font-bold text-gray-800 text-center p-2 sm:p-4">Ngũ Hành phân phối</h2>
                    <div class="flex flex-col items-center justify-center w-full flex-grow p-2 sm:p-6">
                        <div class="nguhanh-container relative w-full max-w-[200px] sm:max-w-[250px] aspect-square">
                            {{-- Yin-Yang and elements styling --}}
                            <div class="absolute yin-yang">
                                <div class="yin-yang-dot-black"></div>
                                <div class="yin-yang-dot-white"></div>
                                <div class="absolute text-nham">{{ $result->heavenly_stem_day->name }}</div>
                                <div class="absolute text-thuy">{{ $result->earthly_branch_day->name }}</div>
                            </div>

                            <div class="nguhanh-element" data-element="Moc" style="background-color: #7CB342;">
                                Mộc <br /> {{ $result->calculated_data_point['Mộc'] }}
                            </div>
                            <div class="nguhanh-element" data-element="Hoa" style="background-color: #D9534F;">
                                Hỏa <br /> {{ $result->calculated_data_point['Hỏa'] }}
                            </div>
                            <div class="nguhanh-element" data-element="Tho" style="background-color: #4A201B;">
                                Thổ <br /> {{ $result->calculated_data_point['Thổ'] }}
                            </div>
                            <div class="nguhanh-element" data-element="Kim" style="background-color: #F0AD4E;">
                                Kim <br /> {{ $result->calculated_data_point['Kim'] }}
                            </div>
                            <div class="nguhanh-element" data-element="Thuy" style="background-color: #337AB7;">
                                Thủy <br /> {{ $result->calculated_data_point['Thủy'] }}
                            </div>

                            {{-- SVG for connections, pointer-events: none to allow interaction with elements below --}}
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

                {{-- Ngũ Hành tương quan Chart --}}
                <div class="chart-wrapper col-span-1 bg-white rounded-xl shadow-md flex flex-col items-center p-4">
                    <h2 class="text-lg sm:text-xl font-bold text-gray-800 text-center p-2 sm:p-4">Ngũ Hành tương quan</h2>
                    <div class="relative flex items-center justify-center w-full max-w-[200px] sm:max-w-[250px] aspect-square flex-grow p-2 sm:p-6">
                        <canvas id="nguHanhChart"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Dung Than content block with responsive padding and shadow --}}
    <div id="dungthan" class="bg-white p-4 sm:p-6 rounded-lg shadow-lg mt-5 relative">
        {{-- Export button for Dụng Thần: Positioned absolutely for fixed placement, with responsive padding and font size --}}
        <button id="exportDungThanBtn" class="absolute top-3 right-3 px-2 py-1 text-[10px] bg-blue-500 text-white rounded-md cursor-pointer z-10 hover:bg-blue-600 transition-colors duration-200 sm:top-5 sm:right-5 sm:px-4 sm:py-2 sm:text-sm">
            Export
        </button>
        {{-- Section title with responsive text size and adjusted width to prevent overlap with absolute button --}}
        <h1 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-8 text-center text-gray-800 w-full max-w-[calc(100%-100px)] mx-auto sm:max-w-none">2. DỤNG THẦN</h1>

        {{-- Grid layout for Mệnh Khuyết, Mệnh Yếu, and Ngũ Hành đối ứng --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">
            {{-- Mệnh Khuyết Section --}}
            <div class="chart-wrapper border rounded-lg bg-red-50 border-red-200 p-4">
                <h2 class="text-lg sm:text-xl font-semibold mb-2 text-red-600 text-center">Mệnh Khuyết</h2>
                {{-- Conditional display of missing elements data --}}
                @if (isset($result->missing_elements->missing_elements_data))
                    @foreach ($result->missing_elements->missing_elements_data as $missing_element)
                        <h3 class="text-xl sm:text-2xl font-bold mb-3 text-red-700 text-center" style="color: {{ $missing_element->color }}">{{ $missing_element->name }}</h3>
                        <p class="text-gray-700 text-sm mb-4">{!! $missing_element->html !!}</p>
                    @endforeach
                @else
                    {{-- Placeholder content if data is not available --}}
                    <h3 class="text-xl sm:text-2xl font-bold mb-3 text-red-700 text-center">Mộc</h3>
                    <p class="text-gray-700 text-sm">Mộc là cây cối sinh sôi, trăm hoa đua nở, là mùa xuân tươi mới khi vạn vật phát triển, sinh lực dồi dào. Người khuyết Mộc thường thiếu sự linh hoạt trong tư duy, dễ trở nên bảo thủ, chậm thay đổi hoặc thiếu động lực phát triển. Trong giao tiếp, họ có thể ít sự mềm mại, dễ lặp lại lời nói cũ mà khó tìm đường mới. Cuộc sống dễ bị trì trệ thiếu cảm hứng, thiếu ý tưởng hoặc thiếu khát vọng vươn lên.</p>
                @endif
            </div>

            {{-- Mệnh Yếu Section --}}
            <div class="chart-wrapper border rounded-lg bg-yellow-50 border-yellow-200 p-4">
                <h2 class="text-lg sm:text-xl font-semibold mb-2 text-yellow-600 text-center">Mệnh Yếu</h2>
                {{-- Conditional display of weak elements data --}}
                @if (isset($result->missing_elements->weak_elements_data))
                    @foreach ($result->missing_elements->weak_elements_data as $weak_element)
                        <h3 class="text-xl sm:text-2xl font-bold mb-3 text-yellow-700 text-center" style="color: {{ $weak_element->color }}">{{ $weak_element->name }}</h3>
                        <p class="text-gray-700 text-sm mb-4">{!! $weak_element->html !!}</p>
                    @endforeach
                @else
                    {{-- Placeholder content if data is not available --}}
                    <h3 class="text-xl sm:text-2xl font-bold mb-3 text-yellow-700 text-center">Hỏa</h3>
                    <p class="text-gray-700 text-sm">Hỏa là ngọn lửa rực cháy, là mặt trời giữa mùa hạ - tỏa sáng, ấm áp, rực rỡ và đầy nhiệt huyết. Hỏa biểu trưng cho đam mê, sự thể hiện bản thân, lòng can đảm và tinh thần chủ động. Người khuyết Hỏa thường thiếu năng lượng, dễ mất động lực, ít bộc lộ cảm xúc hoặc cảm thấy lạc lõng giữa đám đông. Họ có xu hướng sống hướng nội, khó thể hiện bản thân và dễ để lỡ những cơ hội tốt vì thiếu sự bứt phá hay quyết đoán.</p>
                @endif
            </div>

            {{-- Ngũ Hành đối ứng (Chart) Section --}}
            <div class="chart-wrapper border rounded-lg bg-blue-50 border-blue-200 flex flex-col items-center justify-between p-4">
                <h2 class="text-lg sm:text-xl font-semibold mb-4 text-blue-600 text-center">Ngũ Hành đối ứng</h2>
                <div class="relative w-full max-w-[200px] sm:max-w-xs mx-auto">
                    <canvas id="nguHanhChart1"></canvas>
                </div>
            </div>
        </div>
        {{-- Bố cục text with responsive text size and alignment --}}
        <div class="text-xs sm:text-sm text-gray-700 mt-4 text-right">
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