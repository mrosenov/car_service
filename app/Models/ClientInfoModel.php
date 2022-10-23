<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientInfoModel extends Model
{
    use HasFactory;

    protected $fillable = ['name','phone'];
    public $table = "client_info";

    public function cars() {
        return $this->belongsTo(CarInfoModel::class,'id', 'ownerID');
    }
}
