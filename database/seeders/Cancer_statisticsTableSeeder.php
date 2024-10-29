<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Cancer_statisticsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $cancer_diagnosis_years = [1981, 1986, 1991, 1996, 2001, 2006, 2011, 2016, 2021];
        $genders = ['全', '男', '女'];
        $cities = ['全國', '台北市', '高雄市', '台中市', '台南市', '新北市', '桃園市', '基隆市', '新竹市', '嘉義市', '台北縣', '桃園縣', '新竹縣', '苗栗縣', '台中縣', '彰化縣', '南投縣', '雲林縣', '嘉義縣', '台南縣', '高雄縣', '屏東縣', '花蓮縣', '台東縣', '澎湖縣', '金門縣', '連江縣'];
        $cancer_types = ['口腔癌', '肺癌', '乳癌', '結腸癌', '肝癌', '卵巢癌', '前列腺癌', '胃癌', '食道癌', '胰臟癌', '腦癌', '皮膚癌', '淋巴癌', '白血病'];
        $age_standardized_incidence_rates = [0.65, 1.5, 2.1, 4.7, 11.0, 16.0, 21.3, 28.5, 32.1, 48.9];
        $cancer_cases = [55, 130, 85, 40, 50, 20, 65, 95, 120, 140];
        $average_ages = [56.5, 63.0, 58.8, 61.5, 59.3, 55.0, 62.0, 60.2, 64.0, 57.5];
        $median_ages = [57, 64, 59, 62, 60, 55, 63, 61, 65, 58];
        $crude_rates = [26.0, 31.5, 21.0, 16.5, 19.0, 23.0, 28.0, 20.5, 25.0, 22.5];

        foreach (range(1, 100) as $index) {
        DB::table('cancer_statistics') -> insert([
            'cancer_diagnosis_year' => $cancer_diagnosis_years[array_rand($cancer_diagnosis_years)],
            'gender' => $genders[array_rand($genders)],
            'city' => $cities[array_rand($cities)],
            'cancer_type' => $cancer_types[array_rand($cancer_types)],
            'age_standardized_incidence_rate' => $age_standardized_incidence_rates[array_rand($age_standardized_incidence_rates)],
            'cancer_cases' => $cancer_cases[array_rand($cancer_cases)],
            'average_age' => $average_ages[array_rand($average_ages)],
            'median_age' => $median_ages[array_rand($median_ages)],
            'crude_rate' => $crude_rates[array_rand($crude_rates)],
            'created_at' => now(),
            'updated_at' => now()
        ]);
        }
    }
}
