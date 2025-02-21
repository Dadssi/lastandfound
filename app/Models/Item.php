<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'date',
        'location',
        'contact_email',
        'contact_phone',
        'type',
        'is_found',
        'category_id',
        'user_id',
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function comments()
    {
        return $this->hasMany(comment::class);
    }

    public function claims(): HasMany
    {
        return $this->hasMany(Claim::class);
    }
}
