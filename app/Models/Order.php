<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class Order extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'consumer_id',
        'zone_id',
        'ship_id',
        'etd_date',
        'group_no',
        'pc',
        'commercial',
        'bioabt',
        'ordertype',
        'bicomd',
        'biivpx',
        'is_type',
        'is_split',
        'is_check_agian',
        'is_sync',
        'is_status',
    ];

    public function getConsumer()
    {
        return $this->hasOne(Consumer::class, 'consumer_id', 'id');
    }

    public function getZone()
    {
        return $this->hasOne(ZoneGroup::class, 'zone_id', 'id');
    }

    public function getShipment()
    {
        return $this->hasOne(Shipment::class, 'ship_id', 'id');
    }
}
