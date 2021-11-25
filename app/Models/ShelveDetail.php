<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class ShelveDetail extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'shelve_id',
        'stock_id',
        'user_id',
        'pallet_no',
        're_print',
        'is_status',
    ];

    public function getShelve()
    {
        return $this->hasOne(Shelve::class, 'shelve_id', 'id');
    }

    public function getStock()
    {
        return $this->hasOne(Stock::class, 'stock_id', 'id');
    }

    public function getUser()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
