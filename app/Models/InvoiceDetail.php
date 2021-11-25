<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class InvoiceDetail extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'invoice_id',
        'order_id',
        'set_pallet',
        'is_status',
    ];

    public function getInvoice()
    {
        return $this->hasOne(Invoice::class, 'invoice_id', 'id');
    }

    public function getOrderDetail()
    {
        return $this->hasOne(OrderDetail::class, 'order_id', 'id');
    }
}
