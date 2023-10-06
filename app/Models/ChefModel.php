<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChefModel extends Model
{
    use HasFactory;
    protected  $table = 'chefs';
    protected  $primarykey = 'id';
}
