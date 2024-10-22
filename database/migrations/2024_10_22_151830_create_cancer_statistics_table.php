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
            $table->integer('cancer_diagnosis_year')->comment('癌症診斷的年份');
            $table->string('gender')->comment('性別（例如：男性、女性、全等）');
            $table->string('city')->comment('縣市別');
            $table->string('cancer_type')->comment('癌症類型（例如：口腔、胃等）');
            $table->double('age_standardized_incidence_rate')->comment('年齡標準化發生率 (WHO 2000 世界標準人口 每10萬人口)');
            $table->integer('cancer_cases')->comment('癌症的發生數量');
            $table->double('average_age')->comment('平均年齡');  
            $table->double('median_age')->comment('年齡中位數');  
            $table->double('crude_rate')->comment('粗率 (每10萬人口)');
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
