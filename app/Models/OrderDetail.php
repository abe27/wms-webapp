<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class OrderDetail extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'plan_id',
        'order_id',
        'revise_id',
        'part_id',
        'unit_id',
        'pono',
        'sampleflg',
        'orderorgi',
        'orderround',
        'firmflg',
        'shippedflg',
        'shippedqty',
        'ordermonth',
        'balqty',
        'bidrfl',
        'deleteflg',
        'reasoncd',
        'carriercode',
        'bistdp',
        'binewt',
        'bigrwt',
        'biwidt',
        'bihigh',
        'bileng',
        'lotno',
        'is_sync',
        'is_status',
    ];

    public function getPlan()
    {
        return $this->hasOne(OrderPlan::class, 'plan_id', 'id');
    }

    public function getOrder()
    {
        return $this->hasOne(Order::class, 'order_id', 'id');
    }

    public function getRevise()
    {
        return $this->hasOne(ReviseGroup::class, 'revise_id', 'id');
    }

    public function getPart()
    {
        return $this->hasOne(Part::class, 'part_id', 'id');
    }

    public function getUnit()
    {
        return $this->hasOne(Unit::class, 'unit_id', 'id');
    }
}
