<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\FAcades\DB;

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
        $age_standardized = array(3.4,0.36,7.73,3.16,12.09,0.32,10.08,8.78,0.51,1.11,0.13,0.05,0.37,1.78,0.24,1.92,0.34,0.21,100.38);
        $Average = array(
            53.37, 46.67, 46.82, 59.23, 57.39, 57.41, 54.31, 51.8,
            56.95, 56.64, 35.3, 59.57, 52.04, 59.48, 58.4, 42.4,
            46.04, 31.47, 37.91, 53.63, 57.68, 49.16, 57.35, 26.83
        );
        $Madian = array(
            57.5,58,32,61,53,61,59,42,
            48,26.5,35.5,56,58,56,60,
            8,34,17.5,44,9,48.5
        );
        $Crude_rate = array(
            2.5, 0.28, 5.97, 2.15, 8.39, 0.21, 
            7.15, 6.49, 0.36, 0.79, 0.11, 0.08, 
            0.44, 0.95, 7.97, 0.03, 0.16, 0.42
        );

        $cancer_diagnosis_year = Carbon::now()->subYears(rand(3,45))->subMonths(rand(0,12))->subDays(rand(0,31));
        $gender = $Gender[rand(0, count($Gender) -1)];
        $city_county = $cities[rand(0, count($cities) - 1)];
        $cancer_type = $this->generateRandomType();
        $age_standardized_incidence_rate_who_2000 = $age_standardized[rand(0,count($age_standardized) - 1)];
        $average_age = $Average[rand(0, count($Average) - 1)];
        $median_age = $Madian[rand(0, count($Madian) - 1)];
        $crude_rate = $Crude_rate[rand(0, count($Crude_rate) - 1)];
        $random_datetime = Carbon::now()->subMinutes(rand(1, 55));

        DB::table("cancer_statistics")->insert([
            'cancer_diagnosis_year' => $cancer_diagnosis_year,
             'gender' => $gender,
             'city_county' => $city_county,
             'cancer_type' => $cancer_type,
             'age_standardized_incidence_rate_who_2000' => $age_standardized_incidence_rate_who_2000,
             'cancer_cases' => rand(1,9000),
             'average_age' => $average_age,
             'median_age' => $median_age,
             'crude_rate' => $crude_rate,
             'created_at' => $random_datetime,
             'updated_at' => $random_datetime
       ]);
    }
}
