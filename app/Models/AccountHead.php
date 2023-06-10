<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AccountHead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'account_head_id'
    ];

    public function child(): HasMany
    {
        return $this->hasMany(AccountHead::class, 'account_head_id', 'id');
    }
}
