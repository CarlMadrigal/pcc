<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperative extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'contact',
    ];

    public function head() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function users() {
        return $this->hasMany(User::class);
    }

    public function carabaos() {
        return $this->hasMany(Carabao::class);
    }
    
    public function notifications() {
        return $this->hasMany(Notification::class);
    }
}
