<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodModel extends Model
{
    use HasFactory;
    protected  $table = 'foods';
    protected  $primarykey = 'id';
}
