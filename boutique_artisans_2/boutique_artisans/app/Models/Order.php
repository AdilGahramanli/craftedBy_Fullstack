<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
      "date",
        "total",
        "order_id"
    ];

    public function product(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_products')->withPivot('name','price');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }






}
