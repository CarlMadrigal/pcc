<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carabao extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status',
        'name',
        'breed',
        'weight',
        'cooperative_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cooperative() {
        return $this->belongsTo(Cooperative::class, 'cooperative_id', 'id');
    }

    public function needs() {
        return $this->hasMany(Need::class);
    }
}
