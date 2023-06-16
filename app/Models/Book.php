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
        "start_time",
        "end_time",
        'user_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function club()
    {
        return $this->belongsTo(Clubs::class, "club_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
