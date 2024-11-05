<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\FAcades\DB;
use Faker\Factory as Faker;




class CancerStatisticsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     public function generateRandomType() {
        $Type = array();
        $Type[] = "膀胱";
        $Type[] = "腎";
        $Type[] = "腎盂及其他泌尿系統";
        $Type[] = "眼及淚腺";
        $Type[] = "腦";
        $Type[] = "甲狀腺";
        $Type[] = "其他分界不明的部位";
        $Type[] = "不明原發部位";
        $Type[] = "白血病";
        $Type[] = "非何杰金氏淋巴瘤";
        $Type[] = "全癌症";
        $Type[] = "口腔、口咽及下咽";
        $Type[] = "主唾液腺";
        $Type[] = "鼻咽";
        $Type[] = "食道";
        $Type[] = "胃";
        $Type[] = "小腸";
        $Type[] = "結直腸";
        $Type[] = "肝及肝內膽管";
        $Type[] = "膽囊及肝外膽管";
        $Type[] = "胰";
        $Type[] = "後腹膜腔及腹膜";
        $Type[] = "鼻腔、中耳及副鼻竇";
        $Type[] = "喉";
        $Type[] = "肺、支氣管及氣管";
        $Type[] = "胸膜";
        $Type[] = "胸腺、心臟與中隔";
        $Type[] = "骨、關節及關節軟骨";
        $Type[] = "結締組織、皮下組織及其他軟組織";
        $Type[] = "皮膚";
        $Type[] = "其他神經系統";
        $Type[] = "其他內分泌腺";
        $Type[] = "漿細胞瘤";    
        return $Type[rand(0, count($Type) - 1)];
    }

    public function run()
    {
        $Gender = array('全','女','男');
        $cities = array("台北市", "高雄市", "台中市", "台南市", "新北市", "桃園市", "彰化縣", "宜蘭縣", "花蓮縣", "嘉義市", "基隆市", "南投縣", "雲林縣", "屏東縣", "新竹市", "苗栗縣");
        $faker = Faker::create();
        for($i = 0; $i<100; $i++)
        {
            $cancer_diagnosis_year = Carbon::now()->subYears(rand(3, 45))->year;
            $gender = $Gender[rand(0, count($Gender) -1)];
            $city_county = $cities[rand(0, count($cities) - 1)];
            $cancer_type = $this->generateRandomType();
            $random_datetime = Carbon::now()->subMinutes(rand(1, 55));

            DB::table("cancer_statistics")->insert([
                'cancer_diagnosis_year' => $cancer_diagnosis_year,
                'gender' => $gender,
                'city_county' => $city_county,
                'cancer_type' => $cancer_type,
                'age_standardized_incidence_rate_who_2000' => $faker->randomFloat(2, 0, 100),
                'cancer_cases' => rand(1,9000),
                'average_age' => $faker->randomFloat(2, 0, 70),
                'median_age' => rand(0,90),
                'crude_rate' => $faker->randomFloat(2, 0, 100),
                'created_at' => $random_datetime,
                'updated_at' => $random_datetime
            ]);
        }
    }
}
