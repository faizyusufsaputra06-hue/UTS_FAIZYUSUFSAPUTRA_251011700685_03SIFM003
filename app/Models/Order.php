<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_code', 'furniture_id', 'furniture_name', 'unit_price', 'quantity',
        'customer_name', 'phone', 'email', 'address', 'city', 'postal_code',
        'payment_method', 'notes', 'subtotal', 'shipping', 'total', 'status',
    ];

    public const FREE_SHIPPING_MIN = 5000000;
    public const SHIPPING_FLAT = 75000;

    public const PAYMENTS = [
        'transfer' => 'Transfer bank',
        'qris'     => 'QRIS',
        'cod'      => 'Bayar di tempat (COD)',
    ];

    public static function shippingFor(int $subtotal): int
    {
        return $subtotal >= self::FREE_SHIPPING_MIN ? 0 : self::SHIPPING_FLAT;
    }

    public function furniture()
    {
        return $this->belongsTo(Furniture::class);
    }

    public function getRouteKeyName(): string
    {
        return 'order_code';
    }
}
