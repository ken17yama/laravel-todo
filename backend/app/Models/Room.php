<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    public $timestamps = true;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function rooms()
    {
        return $this->belongsToMany('App\Models\User');
    }

}
