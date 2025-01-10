<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CancerKnowledgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['基础知识', '预防与筛选', '患者护理', '科研动态'];
        $titles = [
            '什么是癌症？', '如何预防乳腺癌？', '癌症患者的心理护理',
            '最新癌症治疗方法研究', '癌症的早期症状', '癌症复发怎么办？',
            '免疫疗法的应用', '癌症治疗的副作用管理', '饮食与癌症的关系',
            '癌症患者的运动建议', '化疗后的营养管理', '癌症治疗的常见误区',
            '如何识别癌症的早期信号', '癌症患者家属的心理调适', '如何进行癌症筛查',
            '放射治疗的作用与风险', '癌症与遗传的关系', '癌症的疼痛管理',
            '儿童癌症的特殊护理', '晚期癌症的安宁疗护', '癌症康复期的锻炼建议',
            '癌症的不同治疗方式', '如何帮助癌症患者重建信心', '癌症的免疫系统治疗',
            '癌症患者的社会支持', '癌症的流行病学', '癌症治疗的最新突破',
            '癌症患者如何缓解压力', '癌症的多学科治疗模式', '癌症治疗的个性化方法'
        ];
        $keywords = ['癌症', '乳腺癌', '心理护理', '基因编辑', '免疫疗法', '早期信号', '癌症筛查'];

        $data = [];
        for ($i = 0; $i <= 200; $i++) {
            $category = $categories[array_rand($categories)];
            $title = $titles[array_rand($titles)];
            $content = "这是一篇关于 {$title} 的文章，讨论了其相关的知识点。";
            $keyword = $keywords[array_rand($keywords)];

            $data[] = [
                'title' => $title,
                'content' => $content,
                'category' => $category,
                'keywords' => $keyword,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('cancer_knowledge')->insert($data);
    }
}