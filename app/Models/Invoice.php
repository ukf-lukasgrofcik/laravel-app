<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'order_id',
        'due_date',
        'payment_date',
    ];

    static public function generateInvoiceNumber() : string
    {
        $invoice = Invoice::orderBy('created_at', 'desc')->first();

        $number = $invoice ? $invoice->number + 1 : 1;

        return str_pad($number, 8, "0", STR_PAD_LEFT);
    }

    public function order() : BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getFormattedDueDateAttribute() : string
    {
        return Carbon::parse($this->due_date)->format('d/m/Y');
    }

    public function getFormattedPaymentDateAttribute() : string | null
    {
        return $this->payment_date ? Carbon::parse($this->payment_date)->format('d/m/Y') : null;
    }

    public function getColorAttribute() : string
    {
        $days_until = now()->setTime(0, 0)->diffInDays(Carbon::parse($this->due_date), false);

        return match (true) {
            !!$this->payment_date => 'success',
            $days_until <= 0 => 'dark',
            $days_until <= 1 => 'danger',
            $days_until <= 7 => 'warning',
            default => 'white',
        };
    }

}
