<?php

namespace App\Services;

use App\Models\UserInfo;
use App\Models\QueryHistory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class HealthAdviceService
{
    // 根据用户提供的部分信息生成健康建议
    public function generateAdvice($gender, $birthdate, $medical_history)
    {
        $advice = [];

        // 1. 根据病历生成建议
        $advice = array_merge($advice, $this->generateAdviceFromMedicalHistory($medical_history));

        // 2. 根据用户性别生成建议
        $advice = array_merge($advice, $this->generateAdviceFromGender($gender));

        // 3. 根据用户年龄生成建议
        $advice = array_merge($advice, $this->generateAdviceFromAge($birthdate));

        // 如果没有生成任何建议，返回默认建议
        if (empty($advice)) {
            $advice = $this->getDefaultAdvice();
        } else{
            // 去重
            $advice = array_unique($advice);
        }

        return $advice;
    }

    // 默认健康建议
    public function getDefaultAdvice()
    {
        return [
            '建议保持健康的生活方式，包括均衡饮食、适量运动和充足睡眠。',
            '建议定期体检，监测身体指标，及早发现潜在健康问题。',
            '保持心理健康，避免压力过大，适时寻求专业帮助。',
            '建议多喝水，少吃加工食品，远离烟酒。'
        ];
    }

    // 1. 根据病历生成建议
    public function generateAdviceFromMedicalHistory($medical_history)
    {
        $advice = [];

        if (Str::contains($medical_history, '高血压')) {
            $advice[] = '建议低盐饮食，避免高血压加重。';
            $advice[] = '建议定期监测血压，保持健康体重。';
            $advice[] = '避免高脂肪和高胆固醇食物。';
        }

        if (Str::contains($medical_history, '糖尿病')) {
            $advice[] = '建议保持均衡饮食，控制糖分摄入。';
            $advice[] = '建议定期监测血糖，避免血糖波动过大。';
            $advice[] = '每天进行适量运动，有助于稳定血糖水平。';
        }

        if (Str::contains($medical_history, '高胆固醇')) {
            $advice[] = '建议增加膳食纤维的摄入，避免高脂肪食物。';
            $advice[] = '建议定期检查血脂水平，保持健康的胆固醇水平。';
        }

        if (Str::contains($medical_history, '哮喘')) {
            $advice[] = '建议避免接触过敏源，使用医生开具的药物进行控制。';
            $advice[] = '保持居住环境的通风，避免空气污染。';
        }

        if (Str::contains($medical_history, '关节炎')) {
            $advice[] = '建议定期进行温和的运动，如游泳或瑜伽。';
            $advice[] = '避免长时间保持同一姿势，注意关节保护。';
            $advice[] = '可以考虑补充抗炎药物或其他治疗方案。';
        }

        if (Str::contains($medical_history, '癌症')) {
            $advice[] = '建议进行定期癌症筛查，根据医生建议选择适当的检测项目。';
            $advice[] = '保持积极的心态，进行癌症后康复期的适度运动。';
            $advice[] = '避免接触可能的致癌物质，保持良好的生活习惯。';
        }

        return $advice;
    }

    // 2. 根据用户性别生成建议
    private function generateAdviceFromGender($gender)
    {
        $advice = [];

        if ($gender == 'female') {
            $advice[] = '建议定期进行乳腺癌筛查，特别是40岁以上的女性。';
            $advice[] = '保持乳房健康，关注任何不寻常的变化并及时就医。';
        } elseif ($gender == 'male') {
            $advice[] = '建议定期进行前列腺检查，尤其是50岁以上的男性。';
            $advice[] = '保持正常体重，避免过度饮酒，保持健康的生活方式。';
        }

        return $advice;
    }

    // 3. 根据用户年龄生成建议
    private function generateAdviceFromAge($birthdate)
    {
        $advice = [];
        // 计算用户的年龄
        $age = \Carbon\Carbon::parse($birthdate)->age;

        if ($age < 18) {
            $advice[] = '建议保持均衡饮食，增加蛋白质和蔬菜的摄入。';
            $advice[] = '每天保证充足的睡眠，有助于身体发育。';
            $advice[] = '建议进行适度的运动，促进骨骼和肌肉的发展。';
        } elseif ($age >= 18 && $age < 40) {
            $advice[] = '保持良好的作息，避免过度熬夜。';
            $advice[] = '增加有氧运动，如跑步、游泳，有助于保持心脏健康。';
            $advice[] = '建议定期体检，确保身体健康。';
        } elseif ($age >= 40 && $age < 60) {
            $advice[] = '建议定期检查血糖、血脂和血压，预防慢性疾病。';
            $advice[] = '保持体重，避免肥胖，控制脂肪摄入。';
            $advice[] = '保持心理健康，适度减压，避免过度焦虑。';
        } elseif ($age >= 60) {
            $advice[] = '建议保持适当的运动，如散步或太极，有助于保持关节灵活性。';
            $advice[] = '定期检查骨密度，预防骨质疏松症。';
            $advice[] = '保持社交活动，参与集体活动，增强心理健康。';
        }

        return $advice;
    }
}