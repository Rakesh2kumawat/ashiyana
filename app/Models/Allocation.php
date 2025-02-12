<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
	use HasFactory;
    protected $fillable = ['flat_id', 'customers_id'];

    public function customers()
    {
        return $this->belongsTo(Customers::class, 'customers_id');
    }
    public function flate()
    {
        return $this->belongsTo(Flat::class, 'flat_id');
    }
}
