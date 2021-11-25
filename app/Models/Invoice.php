<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class Invoice extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'invoice_no',
        'system_no',
        'order_id',
        'vessel',
        'payment',
        'zone_code',
        'ship_from',
        'ship_to',
        'via',
        'title',
        'container_type_id',
        'note_1',
        'note_2',
        'note_3',
        'ctn_total',
        'tap_flg',
        'resend_gedi',
        'is_send_gedi',
        'inv_type',
        'is_status',
        'is_sync',
    ];

    public function getOrder()
    {
        return $this->hasOne(Order::class, 'order_id', 'id');
    }
}
