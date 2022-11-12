<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'due_date',
        'is_paid',
        'invoice_link',
        'store_id'
    ];

    public function stores()
    {
        return $this->hasOne('App\Models\Store', 'id', 'store_id');
    }
}
