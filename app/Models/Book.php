<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "book";
    protected $fillable = [
        'status',
        'bookDate',
        'club_id',
        'admin_id',
        'user_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
