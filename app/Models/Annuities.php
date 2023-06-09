<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annuities extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function associates() {
        return $this->belongsToMany('App\Models\Associates');
    }
}
