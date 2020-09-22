<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'todos';
    public $timestamps = true;

    protected $guarded = [
        'id',
        'room_id',
        'created_at',
        'updated_at',
    ];

    protected $attributes = [
        'room_id' => 'default',
    ];

    protected $dates = [
        'start_date',
        'due_date',
    ];

}
