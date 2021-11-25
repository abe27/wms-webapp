<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class ContainerDetail extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'container_id',
        'pallet_id',
        'pallet_running',
        'is_sync',
        'is_status',
    ];

    public function getContainer()
    {
        return $this->hasOne(Container::class, 'container_id', 'id');
    }

    public function getPallet()
    {
        return $this->hasOne(InvoicePallet::class, 'pallet_id', 'id');
    }
}
