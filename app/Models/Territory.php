<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class Territory extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'user_id',
        'consumer_id',
        'store_id',
        'order_group_id',
        'prefix',
        'ship_air',
        'ship_boat',
        'ship_truck',
        'by_pallet',
        'new_seq',
        'weight_limit',
        'weight_limit_total',
        'last_inv_no',
        'on_last_year',
        'is_actived',
    ];

    public function getUser()
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }

    public function getConsumer()
    {
        return $this->hasOne(Consumer::class, 'consumer_id', 'id');
    }

    public function getStore()
    {
        return $this->hasOne(Store::class, 'store_id', 'id');
    }

    public function getOrderGroup()
    {
        return $this->hasOne(OrderGroup::class, 'order_group_id', 'id');
    }
}
