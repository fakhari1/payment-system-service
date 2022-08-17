<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['is_online'];

    protected $attributes = [
        'status' => 0,
    ];

    public function getIsOnlineAttribute()
    {
        return $this->method = 'online';
    }
}
