<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'supplier_id',
        'price',
        'vat',
        'price_vat',
    ];

    static public function generateOrderNumber() : string
    {
        $order = Order::orderBy('created_at', 'desc')->first();

        $number = $order ? $order->number + 1 : 1;

        return str_pad($number, 10, "0", STR_PAD_LEFT);
    }

    public function supplier() : BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function items() : HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

}
