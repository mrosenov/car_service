<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSubTypeModel extends Model
{
    use HasFactory;

    protected $fillable = ['name','service_type','price'];
    protected $table = "service_subtype";

    public function service_type_info() {
        return $this->belongsTo(ServiceTypeModel::class,'service_type', 'id');
    }

}
