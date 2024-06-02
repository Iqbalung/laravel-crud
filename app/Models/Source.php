<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $primaryKey = 'source_id';

    protected $fillable = [
        'sumber',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function domains()
    {
        return $this->hasMany(Domain::class, 'source_id', 'source_id');
    }
}
