<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $fillable = [
        'name',
        'da',
        'pa',
        'qa',
        'os',
        'ss',
        'bidding_time',
        'user_id'
    ];

    protected $casts = [
        // 'bidding_time' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
