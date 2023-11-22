<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staffs extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "staffs";
    protected $primaryKey = "sid";
}