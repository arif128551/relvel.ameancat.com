<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function rel_to_career_role(){
        return $this->belongsTo(CareerRole::class,'role_applied','id');
    }
}
