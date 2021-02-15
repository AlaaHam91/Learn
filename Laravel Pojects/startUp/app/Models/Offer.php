<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
      protected $table="Offers";//change default table name in DB
     protected $fillable=["name","latinName","price","created_at","updated_at"];
     protected $hidden=["created_at","updated_at"];//not returned in response
     public $timestamps=false;//prefent insert values in created_at & updated_t
}
