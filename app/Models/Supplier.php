<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'city',
        'postal_code',
        'business_id',
        'tax_id',
        'vat_registration_number',
        'iban',
    ];

    public function getFullAddressAttribute() : string
    {
        return "$this->address, $this->postal_code $this->city";
    }

}
