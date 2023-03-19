<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Associates extends Model
{
    use HasFactory;

    protected $dates = ['date'];

    protected $guarded = [];

    public function annuitiesBelonged() {
        return $this->belongsToMany('App\Models\Annuities');
    }
    
}
