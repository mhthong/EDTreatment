<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarDetail extends Model
{


    /*
    * @var string
    */
   protected $table = 'car_details';

    use HasFactory;

    protected $fillable = ['car_id','key', 'value','color'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
