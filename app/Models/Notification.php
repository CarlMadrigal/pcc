<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'cooperative_id',
        'user_id',
        'title',
        'message'
    ];

    public function cooperative() {
        return $this->belongsTo(Cooperative::class, 'cooperative_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
