<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PackagePrice extends Model
{
    use HasFactory;
    public function subdivision(): BelongsTo
    {
        return $this->belongsTo(Subdivision::class, 'id_subdivision');
    }
}
