<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModelsModel extends Model
{
    use HasFactory;

    protected $fillable = ['name','car_make'];
    protected $table = "car_models";

    public function make() {
        return $this->belongsTo(CarMakesModel::class,'car_make');
    }
}
