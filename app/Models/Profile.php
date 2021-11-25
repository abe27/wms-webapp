<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class Profile extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'user_id',
        'whs_id',
        'store_id',
        'zipcode_id',
        'depart_id',
        'position_id',
        'consumer_id',
        'empcode',
        'address_1',
        'address_2',
        'phone_no',
        'mobile_no',
        'birth_date',
        'sexual',
        'avatar',
        'lat',
        'lng',
        'is_status',
    ];

    public function getUser()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function getWhs()
    {
        return $this->hasOne(Whs::class, 'whs_id', 'id');
    }

    public function getStore()
    {
        return $this->hasOne(Store::class, 'store_id', 'id');
    }

    public function getZipCode()
    {
        return $this->hasOne(ZipCode::class, 'zipcode_id', 'id');
    }

    public function getDepart()
    {
        return $this->hasOne(Depart::class, 'depart_id', 'id');
    }

    public function getPosition()
    {
        return $this->hasOne(Position::class, 'position_id', 'id');
    }

    public function getConsumer()
    {
        return $this->hasOne(Consumer::class, 'consumer_id', 'id');
    }
}
