<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class AccountHead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'account_head_id',
    ];

    public function child(): HasMany
    {
        return $this->hasMany(AccountHead::class, 'account_head_id', 'id')->withTotalAmount();
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(AccountHead::class, 'account_head_id');
    }

    public function scopeWithTotalAmount(Builder $query): Builder
    {
        return $query->withCount([
            'transactions as total' => function (Builder $query) {
                $query->select(DB::raw('sum(debit) - sum(credit)'));
            },
        ]);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function scopeWhereType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }
}
