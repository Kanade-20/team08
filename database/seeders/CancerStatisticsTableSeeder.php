<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\FAcades\DB;

class CancerStatisticsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table("cancer_statistics")->insert([
            ['cancer_diagnosis_year' => '1979', 'gender' => '全', 'city_county' => '全國', 'cancer_type' => '口腔、口咽及下咽', 'age_standardized_incidence_rate_who_2000' => '3.4', 'cancer_cases' => '439', 'average_age' => '53.37', 'median_age' => '55', 'crude_rate' => '2.5', 'created_at' => now(), 'updated_at' => now()],
            ['cancer_diagnosis_year' => '1979', 'gender' => '全', 'city_county' => '全國', 'cancer_type' => '主唾液腺', 'age_standardized_incidence_rate_who_2000' => '0.36', 'cancer_cases' => '49', 'average_age' => '46.67', 'median_age' => '47', 'crude_rate' => '0.28', 'created_at' => now(), 'updated_at' => now()],
            ['cancer_diagnosis_year' => '1979', 'gender' => '全', 'city_county' => '全國', 'cancer_type' => '鼻咽', 'age_standardized_incidence_rate_who_2000' => '7.73', 'cancer_cases' => '1047', 'average_age' => '46.82', 'median_age' => '47', 'crude_rate' => '5.97', 'created_at' => now(), 'updated_at' => now()],
            ['cancer_diagnosis_year' => '1979', 'gender' => '全', 'city_county' => '全國', 'cancer_type' => '食道', 'age_standardized_incidence_rate_who_2000' => '3.16', 'cancer_cases' => '377', 'average_age' => '59.23', 'median_age' => '59', 'crude_rate' => '2.15', 'created_at' => now(), 'updated_at' => now()],
            ['cancer_diagnosis_year' => '1979', 'gender' => '全', 'city_county' => '全國', 'cancer_type' => '胃', 'age_standardized_incidence_rate_who_2000' => '12.09', 'cancer_cases' => '1471', 'average_age' => '57.39', 'median_age' => '59', 'crude_rate' => '8.39', 'created_at' => now(), 'updated_at' => now()],
            ['cancer_diagnosis_year' => '1979', 'gender' => '全', 'city_county' => '全國', 'cancer_type' => '小腸', 'age_standardized_incidence_rate_who_2000' => '0.32', 'cancer_cases' => '37', 'average_age' => '57.41', 'median_age' => '59', 'crude_rate' => '0.21', 'created_at' => now(), 'updated_at' => now()],
            ['cancer_diagnosis_year' => '1979', 'gender' => '全', 'city_county' => '全國', 'cancer_type' => '結直腸', 'age_standardized_incidence_rate_who_2000' => '10.08', 'cancer_cases' => '1254', 'average_age' => '54.31', 'median_age' => '57', 'crude_rate' => '7.15', 'created_at' => now(), 'updated_at' => now()],
            ['cancer_diagnosis_year' => '1979', 'gender' => '全', 'city_county' => '全國', 'cancer_type' => '肝及肝內膽管', 'age_standardized_incidence_rate_who_2000' => '8.78', 'cancer_cases' => '1138', 'average_age' => '51.8', 'median_age' => '53', 'crude_rate' => '6.49', 'created_at' => now(), 'updated_at' => now()],
            ['cancer_diagnosis_year' => '1979', 'gender' => '全', 'city_county' => '全國', 'cancer_type' => '膽囊及肝外膽管', 'age_standardized_incidence_rate_who_2000' => '0.51', 'cancer_cases' => '64', 'average_age' => '56.95', 'median_age' => '57.5', 'crude_rate' => '0.36', 'created_at' => now(), 'updated_at' => now()],
            ['cancer_diagnosis_year' => '1979', 'gender' => '全', 'city_county' => '全國', 'cancer_type' => '胰', 'age_standardized_incidence_rate_who_2000' => '1.11', 'cancer_cases' => '138', 'average_age' => '56.64', 'median_age' => '58', 'crude_rate' => '0.79', 'created_at' => now(), 'updated_at' => now()],
            ['cancer_diagnosis_year' => '1979', 'gender' => '全', 'city_county' => '全國', 'cancer_type' => '後腹膜腔及腹膜', 'age_standardized_incidence_rate_who_2000' => '0.13', 'cancer_cases' => '20', 'average_age' => '35.3', 'median_age' => '32', 'crude_rate' => '0.11', 'created_at' => now(), 'updated_at' => now()],
            ['cancer_diagnosis_year' => '1979', 'gender' => '全', 'city_county' => '全國', 'cancer_type' => '消化器官其他分界不明部位', 'age_standardized_incidence_rate_who_2000' => '0.13', 'cancer_cases' => '14', 'average_age' => '59.57', 'median_age' => '61', 'crude_rate' => '0.08', 'created_at' => now(), 'updated_at' => now()],
            ['cancer_diagnosis_year' => '1979', 'gender' => '全', 'city_county' => '全國', 'cancer_type' => '鼻腔、中耳及副鼻竇', 'age_standardized_incidence_rate_who_2000' => '0.61', 'cancer_cases' => '78', 'average_age' => '52.04', 'median_age' => '53', 'crude_rate' => '0.44', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
