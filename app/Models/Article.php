<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function privacy(): BelongsTo
    {
        return $this->belongsTo(ArticlePrivacy::class);
    }

    public function isGlobal(): bool
    {
        return $this->privacy->is_global;
    }
}
