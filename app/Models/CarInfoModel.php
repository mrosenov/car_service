<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarInfoModel extends Model
{
    use HasFactory;

    protected $fillable = ['ownerID','car_make','car_model'];
    public $table = "car_info";

    public function client() {
        return $this->belongsTo(ClientInfoModel::class,'ownerID', 'id');
    }

    public function make() {
        return $this->belongsTo(CarMakesModel::class, 'car_make','id');
    }

    public function model() {
        return $this->belongsTo(CarModelsModel::class, 'car_model','id');
    }
}
