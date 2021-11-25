<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class Container extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'container_seq',
        'container_no',
        'seal_no',
        'container_size_id',
        'release_days',
        'release_date',
        'is_sync',
        'is_status',
    ];

    public function getContainerSize()
    {
        return $this->hasOne(ContainerSize::class, 'container_size_id', 'id');
    }
}
