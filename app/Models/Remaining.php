<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remaining extends Model
{
    use HasFactory;

    // Add the flat_id to the fillable array
    protected $fillable = [
        'flat_id',
        'customer_id',
        'flat_category',
    ];

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    public function getFlat()
    {
        return $this->belongsTo(Flat::class, 'flat_id');
    }
}
