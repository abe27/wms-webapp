<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class ZoneGroup extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'store_id',
        'zone_name',
        'zone_id',
        'description',
        'is_actived',
    ];

    public function getStore()
    {
        return $this->hasOne(Store::class, 'store_id', 'id');
    }
}
