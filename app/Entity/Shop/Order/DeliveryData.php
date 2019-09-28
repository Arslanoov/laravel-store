<?php

namespace App\Entity\Shop\Order;

use App\Entity\Region;
use Illuminate\Database\Eloquent\Model;

class DeliveryData extends Model
{
    public $timestamps = false;

    protected $table = 'shop_order_delivery_data';
    protected $fillable = [
        'region_id', 'code'
    ];

    public static function new(
        int $regionId, int $code
    )
    {
        return static::create([
            'region_id' => $regionId,
            'code' => $code
        ]);
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }
}