<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clubs extends Model
{
    use HasFactory;

    protected $table = "clubs";
    protected $fillable = [
        "price",
        "name",
        "wc",
        "cafe",
        "address",
        "notes",
        "creationDate",
        "image",
        "admin_id",
        "area_id"
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'review'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, "admin_id");
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function review(){
        return $this->hasMany(Reviews::class, 'club_id');
    }
}
