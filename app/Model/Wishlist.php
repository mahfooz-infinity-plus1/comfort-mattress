<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['product_id', 'user_id', 'color_id', 'size_id'];

    public function product()
    {
        return $this->belongsTo(TxnProduct::class, 'product_id', 'id');
    }

    public function size()
    {
        return $this->belongsTo(MstSize::class, 'size_id', 'id');
    }

    public function color()
    {
        return $this->belongsTo(MstColor::class, 'color_id', 'id');
    }

    public static function mapproduct($p_id, $c_id, $s_id)
    {
        return MapColorSize::where('product_id', $p_id)->where('color_id', $c_id)->where('size_id', $s_id)->first();
    }
}
