<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carabao extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'cooperative_id',
        'breed',
        'weight',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cooperative() {
        return $this->belongsTo(Cooperative::class, 'cooperative_id', 'id');
    }
}
