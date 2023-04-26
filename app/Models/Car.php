<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Car extends Model
{

    /*
    * @var string
    */
   protected $table = 'cars';

    use HasFactory;

    protected $fillable = ['post_id','name', 'brand','slug' , 'model', 'year', 'price','type'];


    public function details()
    {
        return $this->hasOne(CarDetail::class);
    }
}
