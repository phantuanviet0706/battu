@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-green-100 to-blue-100">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md text-center">
        <h2 class="text-2xl font-bold mb-6">🌟 Kết quả Bát Tự 🌟</h2>

        <div class="text-lg mb-4">
            <p><strong>Ngày Sinh:</strong> {{ $result->input->day }}/{{ $result->input->month }}/{{ $result->input->year }} {{ $result->input->hour }}:{{ sprintf("%02d", $result->input->minute) }}</p>
            
            <!-- Dữ kiện nông lịch -->
            <p><strong>Nông Lịch:</strong> {{ isset($result->agricultural->name) ? $result->agricultural->name : '---' }}</p>

            <!-- Dữ kiện Thiên can của năm -->
            <p><strong>Thiên can của năm:</strong></p>
            <div class="overflow-x-auto mb-6">
                <table class="table-auto w-full border-collapse border border-gray-300 text-center">
                    <thead class="bg-indigo-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Thiên Can</th>
                            <th class="border border-gray-300 px-4 py-2">Ngũ Hành</th>
                            <th class="border border-gray-300 px-4 py-2">Dương / Âm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $result->heavenly_stem->name }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2" style="color: {{ $result->heavenly_stem->color }}">
                                {{ $result->heavenly_stem->element }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2" style="color: {{ $result->heavenly_stem->color }}">
                                {{ $result->heavenly_stem->sub_elemet }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Dữ kiện Địa chi của năm -->
            <p><strong>Địa chi của năm:</strong></p>
            <div class="overflow-x-auto mb-6">
                <table class="table-auto w-full border-collapse border border-gray-300 text-center">
                    <thead class="bg-green-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Địa Chi</th>
                            <th class="border border-gray-300 px-4 py-2">Ngũ Hành</th>
                            <th class="border border-gray-300 px-4 py-2">Dương / Âm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $result->earthly_branch->name }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2" style="color: {{ $result->earthly_branch->color }}">
                                {{ $result->earthly_branch->element }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2" style="color: {{ $result->earthly_branch->color }}">
                                {{ $result->earthly_branch->sub_elemet }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Dữ kiện Thiên can của tháng -->
            <p><strong>Thiên Can của Tháng:</strong></p>
            <div class="overflow-x-auto mb-6">
                <table class="table-auto w-full border-collapse border border-gray-300 text-center">
                    <thead class="bg-purple-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Thiên Can</th>
                            <th class="border border-gray-300 px-4 py-2">Ngũ Hành</th>
                            <th class="border border-gray-300 px-4 py-2">Dương / Âm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $result->heavenly_stem_month->name }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2" style="color: {{ $result->heavenly_stem_month->color }}">
                                {{ $result->heavenly_stem_month->element }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2" style="color: {{ $result->heavenly_stem_month->color }}">
                                {{ $result->heavenly_stem_month->sub_elemet }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Dữ kiện Địa chi của tháng -->
            <p><strong>Địa Chi của Tháng:</strong></p>
            <div class="overflow-x-auto mb-6">
                <table class="table-auto w-full border-collapse border border-gray-300 text-center">
                    <thead class="bg-blue-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Địa Chi</th>
                            <th class="border border-gray-300 px-4 py-2">Ngũ Hành</th>
                            <th class="border border-gray-300 px-4 py-2">Dương / Âm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $result->earthly_branch_month->name }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2" style="color: {{ $result->earthly_branch_month->color }}">
                                {{ $result->earthly_branch_month->element }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2" style="color: {{ $result->earthly_branch_month->color }}">
                                {{ $result->earthly_branch_month->sub_elemet }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Dữ kiện Thiên can của ngày -->
            <p><strong>Thiên Can của Ngày:</strong></p>
            <div class="overflow-x-auto mb-6">
                <table class="table-auto w-full border-collapse border border-gray-300 text-center">
                    <thead class="bg-yellow-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Địa Chi</th>
                            <th class="border border-gray-300 px-4 py-2">Ngũ Hành</th>
                            <th class="border border-gray-300 px-4 py-2">Dương / Âm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $result->heavenly_stem_day->name }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2" style="color: {{ $result->heavenly_stem_day->color }}">
                                {{ $result->heavenly_stem_day->element }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2" style="color: {{ $result->heavenly_stem_day->color }}">
                                {{ $result->heavenly_stem_day->sub_elemet }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Dữ kiện Địa chi của ngày -->
            <p><strong>Địa Chi của Ngày:</strong> {{ $result->earthly_branch_day }}</p>

            <p><small>JDN: {{ $result->jdn }}</small></p>
        </div>

        <a href="{{ route('page.form') }}" class="inline-block bg-indigo-500 hover:bg-indigo-600 text-white py-2 px-4 rounded mt-4">
            ⟵ Tra cứu lại
        </a>
    </div>
</div>
@endsection
