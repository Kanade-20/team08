<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CancerStatistics;
use League\Csv\Reader;
use DB;

class ImportCancerStatistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:cancer_statistics {file}';
    

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '导入癌症统计数据CSV文件';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // 临时设置更高的内存限制
        ini_set('memory_limit', '512M');
        
        // 获取文件路径
        $file = $this->argument('file');
        
        // 创建 CSV 读取器
        $csv = Reader::createFromPath($file, 'r');
        $csv->setHeaderOffset(0); // 设置表头偏移

        // 批量插入
        $data = [];

        //開始事務
        DB::beginTransaction();

        try {
            // 遍历 CSV 文件的每一行
            foreach ($csv as $record) {
                // 清理數據，去除字段值的空格
                $cancer_diagnosis_year = trim($record['癌症诊断年份']);
                $gender = trim($record['性別']);
                $city = trim($record['县市別']);
                $cancer_type = trim($record['癌症类型']);
                $age_standardized_incidence_rate = trim($record['年龄标准化发生率（每10万人口）']);
                $cancer_cases = trim($record['癌症发生数']);
                $average_age = trim($record['平均年龄']);
                $median_age = trim($record['年龄中位数']);
                $crude_rate = trim($record['粗率（每10万人口）']);

                // 數值轉換
                $age_standardized_incidence_rate = is_numeric($age_standardized_incidence_rate) ? (float) $age_standardized_incidence_rate : null;
                $cancer_cases = is_numeric($cancer_cases) ? (int) $cancer_cases : null;
                $average_age = is_numeric($average_age) ? (float) $average_age : null;
                $median_age = is_numeric($median_age) ? (float) $median_age : null;
                $crude_rate = is_numeric($crude_rate) ? (float) $crude_rate : null;

                // 收集數據
                $data[] = [
                    'cancer_diagnosis_year' => trim($record['癌症诊断年份']),
                    'gender' => trim($record['性別']),
                    'city' => trim($record['县市別']),
                    'cancer_type' => trim($record['癌症类型']),
                    'age_standardized_incidence_rate' => $age_standardized_incidence_rate,
                    'cancer_cases' => $cancer_cases,
                    'average_age' => $average_age,
                    'median_age' => $median_age,
                    'crude_rate' => $crude_rate,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                // 每1000条数据进行一次批量插入
                if (count($data) >= 1000) {
                    CancerStatistics::insert($data);
                    $data = [];  // 清空数据
                }
            }

            // 插入剩余数据
            if (count($data) > 0) {
                CancerStatistics::insert($data);
            }

            DB::commit();  // 提交事务
            $this->info('数据导入成功！');
        
        } catch (\Exception $e) {
                DB::rollBack();  // 回滚事务
                $this->error('数据导入失败：' . $e->getMessage());
        }
    }
}