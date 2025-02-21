<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_id',
        'claim_type', // 'found' or 'owner'
        'description',
        'status', // 'pending', 'approved', 'rejected'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}