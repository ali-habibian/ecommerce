<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
//    /**
//     * @var int|mixed
//     */
//    public mixed $user_id;
//    /**
//     * @var mixed|string
//     */
//    public mixed $status;
//    public mixed $total_price;
    protected $fillable = ['user_id', 'status', 'total_price'];
    protected $table = 'cart';

    public static function whereUserId(int $userId): Cart
    {
        return self::where('user_id', $userId);
    }

    public function updateTotals(): void
    {
        $total = $this->cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        $this->total_price = $total;
        $this->save();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function whereStatus(string $value): Cart
    {
        return $this->where('status', $value);
    }
}
