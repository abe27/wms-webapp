<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class InvoicePallet extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'invoice_id',
        'prefix',
        'seq',
        'total',
        'limit',
        'width',
        'length',
        'height',
        'plout_no',
        'is_sync',
        'is_status',
    ];

    public function getInvoice()
    {
        return $this->hasOne(Invoice::class, 'invoice_id', 'id');
    }
}
