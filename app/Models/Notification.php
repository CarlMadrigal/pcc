<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'cooperative_id',
        'title',
        'message'
    ];

    public function cooperative() {
        return $this->belongsTo(Cooperative::class, 'cooperative_id', 'id');
    }
}
