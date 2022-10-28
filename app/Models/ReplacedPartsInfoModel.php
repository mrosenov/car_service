<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplacedPartsInfoModel extends Model
{
    use HasFactory;

    protected $fillable = ['repair_info','partNumber','partName','partPrice','service','labourPrice'];
    protected $table = "replaced_parts_info";

    public function RepairInfo() {
       return $this->belongsTo(RepairInfoModel::class, 'repair_info', 'id');
    }

    public function ServiceType() {
        return $this->belongsTo(ServiceSubTypeModel::class, 'service' , 'id');
    }
}
