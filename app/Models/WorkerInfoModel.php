<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerInfoModel extends Model
{
    use HasFactory;

    protected $fillable = ['name','phone'];
    protected $table = "worker_info";
}
