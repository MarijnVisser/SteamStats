<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public function games() {
        return $this->belongsToMany('App\Models\Game');
    }

    protected $fillable = [
        'id',
        'name'
    ];
}
