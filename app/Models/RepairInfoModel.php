<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairInfoModel extends Model
{
    use HasFactory;

    protected $fillable = ['car_info_id','worker','totalPrice'];
    protected $table = "repair_info";

    public function ReplacedParts() {
        return $this->hasMany(ReplacedPartsInfoModel::class, 'repair_info','id');
    }

    public function CarInfo() {
        return $this->belongsTo(CarInfoModel::class, 'car_info_id', 'id');
    }

    public function WorkerInfo() {
        return $this->belongsTo(WorkerInfoModel::class, 'worker', 'id');
    }
}
