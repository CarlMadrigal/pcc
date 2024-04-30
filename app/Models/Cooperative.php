<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperative extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'address',
        'contact'
    ];

    public function head() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function users() {
        return $this->hasMany(User::class);
    }
}
