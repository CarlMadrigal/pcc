<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Need extends Model
{
    use HasFactory;
    protected $fillable = [
        'cooperative_id',
        'carabao_id',
        'feed',
        'water',
        'milk',
        'vitamin',
    ];
    
    public function carabao() {
        return $this->belongsTo(Carabao::class, 'carabao_id', 'id');
    }

    public function cooperative() {
        return $this->belongsTo(Carabao::class, 'cooperative_id', 'id');
    }
}
