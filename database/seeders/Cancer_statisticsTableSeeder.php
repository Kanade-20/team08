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
        $genders = ['全', '男', '女'];
        $cities = ['全國', '台北市', '高雄市', '台中市', '台南市', '新北市', '桃園市', '基隆市', '新竹市', '嘉義市', '台北縣', '桃園縣', '新竹縣', '苗栗縣', '台中縣', '彰化縣', '南投縣', '雲林縣', '嘉義縣', '台南縣', '高雄縣', '屏東縣', '花蓮縣', '台東縣', '澎湖縣', '金門縣', '連江縣'];
        $cancer_types = ['口腔癌', '肺癌', '乳癌', '結腸癌', '肝癌', '肾癌', '骨癌', '胃癌', '食道癌', '胰臟癌', '腦癌', '皮膚癌', '淋巴癌', '白血病'];

        for ($index = 1;$index <= 100; $index++) {
            DB::table('cancer_statistics') -> insert([
                'cancer_diagnosis_year' => rand(1979 , 2021),
                'gender' => $genders[array_rand($genders)],
                'city' => $cities[array_rand($cities)],
                'cancer_type' => $cancer_types[array_rand($cancer_types)],
                'age_standardized_incidence_rate' => number_format(mt_rand() / mt_getrandmax(),2),
                'cancer_cases' => mt_rand(0, 5000),
                'average_age' => number_format(mt_rand(0, 90),2),
                'median_age' => mt_rand(0, 100),
                'crude_rate' => number_format(mt_rand() / mt_getrandmax(),2),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
