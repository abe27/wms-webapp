<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class InvoiceCarton extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'part_id',
        'pallet_id',
        'serial_no_id',
        'seq',
        'carton_seq',
        'qty',
        'weight',
        'is_print_label',
        'is_status',
        'is_sync',
    ];

    public function getPart()
    {
        return $this->hasOne(InvoiceDetail::class, 'part_id', 'id');
    }

    public function getPallet()
    {
        return $this->hasOne(InvoicePallet::class, 'pallet_id', 'id');
    }

    public function getStock()
    {
        return $this->hasOne(StockDetail::class, 'serial_no_id', 'id');
    }
}
