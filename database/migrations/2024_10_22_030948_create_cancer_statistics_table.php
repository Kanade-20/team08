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
            $table->integer('cancer_diagnosis_year')->comment('癌症診斷年');
            $table->string('gender', 10)->comment('性別');
            $table->string('city_county', 50)->comment('縣市別');
            $table->string('cancer_type', 100)->comment('癌症別');
            $table->double('age_standardized_incidence_rate_who_2000')->comment('年齡標準化發生率 (每10萬人口)');
            $table->integer('cancer_cases')->comment('癌症發生數');
            $table->double('average_age')->comment('平均年齡');
            $table->double('median_age')->comment('年齡中位數');
            $table->double('crude_rate')->comment('粗率 (每10萬人口)');
            $table->timestamps(); // 包含 created_at 和 updated_at
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
