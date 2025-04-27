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
        $date = $this->input('datetime'); // Lấy giá trị input

        if (!$date) return Helper::thrownExceptionValidator('birth_datetime', 'Invalid date format, please check and try again.'); // Nếu rỗng thì để rules xử lý tiếp (required)

        $timestamp = strtotime($date);

        if (!$timestamp) {
            return Helper::thrownExceptionValidator('birth_datetime', 'Invalid date format, please check and try again.');
        }

        $day = date('d', $timestamp);
        $month = date('m', $timestamp);
        $year = date('Y', $timestamp);

        if (!checkdate($month, $day, $year)) {
            return Helper::thrownExceptionValidator('birth_datetime', 'Ngày tháng năm không hợp lệ, vui lòng kiểm tra lại.');
        }

        $hour = date('H', $timestamp);
        $minute = date('i', $timestamp);
        $second = date('s', $timestamp);
        if (!$hour) {
            return Helper::thrownExceptionValidator('birth_datetime', 'Vui lòng nhập giờ sinh.');
        }
        if (!$minute) {
            return Helper::thrownExceptionValidator('birth_datetime', 'Vui lòng nhập phút sinh.');
        }

        if ($hour > 23 || $hour < 0) {
            return Helper::thrownExceptionValidator('birth_datetime', 'Giờ sinh không hợp lệ, vui lòng kiểm tra lại.');
        }
        if ($minute > 59 || $minute < 0) {
            return Helper::thrownExceptionValidator('birth_datetime', 'Phút sinh không hợp lệ, vui lòng kiểm tra lại.');
        }

        $this->merge([
            'datetime' => date('Y-m-d H:i:s', $timestamp),
        ]);
    }
}
