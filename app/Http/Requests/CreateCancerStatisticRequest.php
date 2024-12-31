<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCancerStatisticRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cancer_diagnosis_year' => 'required|numeric|min:1979|max:'.date('Y'),
            'gender' => 'required|nullable|string', 
            'city_county' => 'required|regex:/^[x{4e00}-\x{9fa5}]+$/u|min:2|max:191',
            'cancer_type' => 'required|regex:/^[x{4e00}-\x{9fa5}]+$/u|min:2|max:191',
            'age_standardized_incidence_rate_who_2000' => 'required|nullable|regex:/^\d+(\.\d{1,2})?$/',
            'cancer_cases' => 'required|numeric|min:0',
            'average_age' => 'required|nullable|numeric|min:0|max:70|regex:/^\d+(\.\d{1,2})?$/',
            'median_age' => 'required|nullable|numeric|min:0|max:90|regex:/^\d+(\.\d{1,1})?$/',
            'crude_rate' => 'required|nullable|numeric|min:0|max:100|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }
    

    public function messages(){
        return [
            'cancer_diagnosis_year.required' => '癌症診斷年份是必填欄位。',
            'cancer_diagnosis_year.numeric' => '癌症診斷年份必須是數字。',
            'cancer_diagnosis_year.min' => '癌症診斷年份不能早於 1979 年。',
            'cancer_diagnosis_year.max' => '癌症診斷年份不能超過當前年份。',
            'gender.required' => '性別是必填欄位。',
            'city_county.required' => '城市/縣區是必填欄位。',
            'city_county.min' => '城市/縣區名稱最少需要 2 個字符。',
            'city_county.max' => '城市/縣區名稱最多 191 個字符。',
            'cancer_type.required' => '癌症類型是必填欄位。',
            'cancer_type.regex' => '癌症類型必須是文字。',
            'cancer_type.min' => '癌症類型名稱最少需要 2 個字符。',
            'cancer_type.max' => '癌症類型名稱最多 191 個字符。',
            'age_standardized_incidence_rate_who_2000.required' => '標準化發病率是必填欄位。',
            'age_standardized_incidence_rate_who_2000.regex' => '標準化發病率必須是數字，且最多可以有 2 位小數。',
            'cancer_cases.required' => '癌症案例數是必填欄位。',
            'cancer_cases.numeric' => '癌症案例數必須是數字。',
            'cancer_cases.min' => '癌症案例數不能小於 0。',
            'average_age.required' => '平均年齡是必填欄位。',
            'average_age.numeric' => '平均年齡必須是數字。',
            'average_age.min' => '平均年齡不能小於 0。',
            'average_age.max' => '平均年齡不能超過 70。',
            'average_age.regex' => '平均年齡必須是數字，且最多可以有 2 位小數。',
            'median_age.required' => '中位數年齡是必填欄位。',
            'median_age.numeric' => '中位數年齡必須是數字。',
            'median_age.min' => '中位數年齡不能小於 0。',
            'median_age.max' => '中位數年齡不能超過 90。',
            'median_age.regex' => '中位數年齡必須是數字，且最多可以有 1 位小數。',
            'crude_rate.required' => '粗率是必填欄位。',
            'crude_rate.numeric' => '粗率必須是數字。',
            'crude_rate.min' => '粗率不能小於 0。',
            'crude_rate.max' => '粗率不能超過 100。',
            'crude_rate.regex' => '粗率必須是數字，且最多可以有 2 位小數。',
        ];

    }
}
