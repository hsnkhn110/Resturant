<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblModel extends Model
{
    use HasFactory;
    protected  $table = 'reservations';
    protected  $primarykey = 'id';
}
