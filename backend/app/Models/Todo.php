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
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'start_date',
        'due_date',
    ];

}
