<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Concerns\QueriesRelationships;

class AccountHead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'account_head_id'
    ];

    public function child(): QueriesRelationships | HasMany
    {
        return $this->hasMany(AccountHead::class, 'account_head_id', 'id')->withTotalAmount();
    }

    public function scopeWithTotalAmount(Builder $query): Builder
    {
        return $query->withCount([
            'transactions as total' => function (Builder $query) {
                $query->select(DB::raw("sum(debit) - sum(credit)"));
            }
        ]);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
