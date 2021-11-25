<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class Tag extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'customer_id',
        'title',
        'description',
        'is_actived'
    ];

    public function getCustomers()
    {
        return $this->hasOne(Customer::class, 'customer_id', 'id');
    }
}
