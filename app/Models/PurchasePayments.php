<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchasePayments extends Model
{
    protected $fillable = [
        'purchase_id',
        'user_id',
        'payment_date',
        'payment_method',
        'total_amount',
        'paid_amount',
        'due_amount',
        'status',
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    

}
