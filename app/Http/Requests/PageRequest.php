<?php

namespace App\Http\Requests;

use App\Shared\Helper;
use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [];
    }

    public function prepareForValidation()
    {
        $gender = $this->input('gender');
        if (!Helper::isEmpty($gender)) {
            $gender = strtolower($gender);
            if (!Helper::inset($gender, 'male', 'female')) {
                return Helper::thrownExceptionValidator('gender', 'Giới tính không hợp lệ, vui lòng kiểm tra lại.');
            }
        }

        $date = $this->input('birth_date'); // Lấy giá trị input

        if (!$date) return Helper::thrownExceptionValidator('birth_date', 'Invalid date format, please check and try again.'); // Nếu rỗng thì để rules xử lý tiếp (required)

        $timestamp = strtotime($date);

        if (!$timestamp) {
            return Helper::thrownExceptionValidator('birth_date', 'Invalid date format, please check and try again.');
        }

        $day = date('d', $timestamp);
        $month = date('m', $timestamp);
        $year = date('Y', $timestamp);

        if (!checkdate($month, $day, $year)) {
            return Helper::thrownExceptionValidator('birth_date', 'Ngày tháng năm không hợp lệ, vui lòng kiểm tra lại.');
        }

        $birth_time = $this->input('birth_time');
        $is_input_time = false;
        if (!$birth_time) {
            $ts_birth_time = 0;
            $time = "00:00";
        } else {
            $ts_birth_time = strtotime($birth_time);
            $hour = date('H', $ts_birth_time);
            $minute = date('i', $ts_birth_time);
            $second = date('s', $ts_birth_time);
            if (!$hour) {
                return Helper::thrownExceptionValidator('birth_time', 'Vui lòng nhập giờ sinh.');
            }
            if (!$minute) {
                return Helper::thrownExceptionValidator('birth_time', 'Vui lòng nhập phút sinh.');
            }
    
            if ($hour > 23 || $hour < 0) {
                return Helper::thrownExceptionValidator('birth_time', 'Giờ sinh không hợp lệ, vui lòng kiểm tra lại.');
            }
            if ($minute > 59 || $minute < 0) {
                return Helper::thrownExceptionValidator('birth_time', 'Phút sinh không hợp lệ, vui lòng kiểm tra lại.');
            }
            $time = date('H:i', $ts_birth_time);
            $is_input_time = true;
        }

        $this->merge([
            'gender' => $gender,
            'birth_date' => date('Y-m-d', $timestamp),
            'birth_time' => $time,
            'is_input_time' => $is_input_time,
        ]);
    }
}
