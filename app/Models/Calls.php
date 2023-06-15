<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calls extends Model
{
    use HasFactory;

    protected $table = "calls";
    protected $fillable = [
        "creationdate",
        "admin_id",
        "user_id",
        "club_id",
        "start_time",
        "end_time"
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function club()
    {
        return $this->belongsTo(Clubs::class, "club_id");
    }
}
