<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annuities extends Model
{
    use HasFactory;

    public function associatesBelonged() {
        return $this->belongsToMany('App\Models\Associates');
    }
}
