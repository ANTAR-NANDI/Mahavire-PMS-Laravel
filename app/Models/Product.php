<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['Sku','Title','Cost','Shipping','Commision','Profit','Item_Price','Min_Price','Max_Price'];
}
