<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthAdvice extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'advice'];

    // 定义与User的反向关系
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
