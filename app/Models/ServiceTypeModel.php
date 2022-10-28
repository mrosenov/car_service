<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTypeModel extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = "service_type";

    public function service_subtype_info() {
        return $this->hasMany(ServiceSubTypeModel::class,'service_type', 'id');
    }

}
