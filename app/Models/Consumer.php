<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class Consumer extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'trader_id',
        'zipcode_id',
        'consumer_company',
        'consumer_code',
        'consumer_name',
        'address_1',
        'address_2',
        'email',
        'phone_no',
        'mobile_no',
        'birth_date',
        'sexual',
        'avatar',
        'description',
        'is_actived',
    ];

    public function getTrader()
    {
        return $this->hasOne(Trader::class, 'trader_id', 'id');
    }

    public function getZipCode()
    {
        return $this->hasOne(ZipCode::class, 'zipcode_id', 'id');
    }
}
