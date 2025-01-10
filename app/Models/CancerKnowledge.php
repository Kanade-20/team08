<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancerKnowledge extends Model
{
    use HasFactory;

    protected $table = "cancer_knowledge";
    
    protected $fillable = [
        'title',
        'content',
        'category',
        'keywords'
    ];
}
