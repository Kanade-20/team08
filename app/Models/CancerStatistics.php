<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancerStatistics extends Model
{
    use HasFactory;

    protected $table = "cancer_statistics";
    
    protected $fillable = [
        'cancer_diagnosis_year',
            'gender',
            'city_county',
            'cancer_type',
            'age_standardized_incidence_rate_who_2000',
            'cancer_cases',
            'average_age',
            'median_age',
            'crude_rate',
    ];
}
