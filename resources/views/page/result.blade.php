@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-green-100 to-blue-100">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md text-center">
        <h2 class="text-2xl font-bold mb-6">🌟 Kết quả Bát Tự 🌟</h2>

        <div class="text-lg mb-4">
            <p><strong>Ngày Sinh:</strong> {{ $result->input->day }}/{{ $result->input->month }}/{{ $result->input->year }} {{ $result->input->hour }}:{{ sprintf("%02d", $result->input->minute) }}</p>
            <p><strong>Nông Lịch:</strong> {{ $result->agricultural }}</p>
            <p><strong>Thiên Can của Năm:</strong> {{ $result->heavenly_stem }}</p>
            <p><strong>Địa Chi của Năm:</strong> {{ $result->earthly_branch }}</p>
            <p><strong>Thiên Can của Tháng:</strong> {{ $result->heavenly_stem_month }}</p>
            <p><strong>Địa Chi của Tháng:</strong> {{ $result->earthly_branch_month }}</p>
            <p><strong>Thiên Can của Ngày:</strong> {{ $result->heavenly_stem_day }}</p>
            <p><strong>Địa Chi của Ngày:</strong> {{ $result->earthly_branch_day }}</p>
            <p><small>JDN: {{ $result->jdn }}</small></p>
        </div>

        <a href="{{ route('page.form') }}" class="inline-block bg-indigo-500 hover:bg-indigo-600 text-white py-2 px-4 rounded mt-4">
            ⟵ Tra cứu lại
        </a>
    </div>
</div>
@endsection
