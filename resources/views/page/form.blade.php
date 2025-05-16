@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-blue-100 to-indigo-200">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">🔮 Tra cứu Thiên Can Địa Chi</h2>

        @if ($errors->any())
        <div class="mb-4 p-2 bg-red-100 text-red-700 rounded">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif

        <form method="POST" action="{{ route('page.calculate') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Họ và tên (Không bắt buộc):</label>
                <input type="text" name="name" value="{{ old('name') ? old('name') : 'Battu' }}" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block mb-1">Giới tính (Không bắt buộc):</label>
                <select name="gender" class="w-full border p-2 rounded">
                    <option value="">-- Chọn --</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Nam</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Nữ</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Ngày sinh (Dương lịch):</label>
                <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Giờ sinh (Không bắt buộc):</label>
                <input type="time" name="birth_time" value="{{ old('birth_time') }}" class="w-full border p-2 rounded">
            </div>

            <div class="flex justify-between mt-6">
                <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white py-2 px-4 rounded">
                    🔮 Xem kết quả
                </button>
                <a href="{{ route('page.form') }}" class="bg-gray-400 hover:bg-gray-500 text-white py-2 px-4 rounded">
                    ♻️ Reset
                </a>
            </div>
        </form>
    </div>
</div>
@endsection