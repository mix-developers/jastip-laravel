<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderStatus extends Model
{
    use HasFactory;

    public function orders(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'id_status');
    }
    public static function getCountInput($id_user)
    {
        return self::where('id_user', $id_user)->where('id_status', 1)->count();
    }
}
