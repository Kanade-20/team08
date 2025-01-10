<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $table = 'user_info'; 

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'gender',
        'phone',
        'birthdate',
        'medical_history',
        'password'
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',  // 自动转换为 Carbon 日期实例
        'birthdate' => 'datetime',          // 将 birthdate 转换为 Carbon 日期实例
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $dates = ['birthdate'];

    public function getBirthdateAttribute($value)
    {
        return $value ? \Carbon\Carbon::parse($value)->format('Y-m-d') : null;
    }

}
