<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(TxnCategory::class);
    }

    public function product()
    {
        return $this->belongsTo(TxnProduct::class);
    }

    public function offerproduct()
    {
        return $this->belongsTo(TxnProduct::class, 'offer_product_id', 'id');
    }

    public function color()
    {
        return $this->belongsTo(MstColor::class);
    }

    public function size()
    {
        return $this->belongsTo(MstSize::class);
    }
}
