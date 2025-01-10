<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancerStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancer_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('cancer_diagnosis_year')->comment('癌症诊断年份');
            $table->enum('gender', ['男', '女', '全'])->comment('性別');
            $table->string('city', 50)->comment('县市別');
            $table->string('cancer_type', 100)->comment('癌症类型');
            $table->decimal('age_standardized_incidence_rate', 8, 2)->comment('年龄标准化发生率 (每10万人口)');
            $table->integer('cancer_cases')->comment('癌症发生数');
            $table->decimal('average_age', 5, 2)->comment('平均年龄');  
            $table->decimal('median_age', 5, 2)->comment('年龄中位数'); 
            $table->decimal('crude_rate', 8, 2)->comment('粗率 (每10万人口)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cancer_statistics');
    }
}
