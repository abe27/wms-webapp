<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class StockDetail extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'stock_id',
        'receive_detail_id',
        'unit_id',
        'lot_no',
        'serial_no',
        'die_no',
        'division_no',
        'qty',
        'finish_good_no',
        'is_received',
        'description',
        'is_sync',
        'is_status',
    ];

    public function getStock()
    {
        return $this->hasOne(Stock::class, 'stock_id', 'id');
    }

    public function getReceiveDetail()
    {
        return $this->hasOne(ReceiveDetail::class, 'receive_detail_id', 'id');
    }

    public function getUnit()
    {
        return $this->hasOne(Unit::class, 'unit_id', 'id');
    }
}
