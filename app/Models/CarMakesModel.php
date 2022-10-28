<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CarMakesModel extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = "car_makes";

    public function models() {
        return $this->hasMany(CarModelsModel::class, 'car_make');
    }
}
