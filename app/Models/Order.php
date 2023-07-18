<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    public function from_subdivision(): BelongsTo
    {
        return $this->belongsTo(Subdivision::class, 'id_subdivision_from', 'id');
    }
    public function to_subdivision(): BelongsTo
    {
        return $this->belongsTo(Subdivision::class, 'id_subdivision_to', 'id');
    }
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id');
    }
    public function order_status()
    {
        return $this->hasMany(OrderStatus::class, 'id_order');
    }
}
