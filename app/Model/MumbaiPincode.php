<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MumbaiPincode extends Model
{
    //

    protected $table = 'mumbai_pincodes';

    // Define which fields can be mass assigned
    protected $fillable = ['pincode'];
}
