<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class SystemSync extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'whs_id',
        'name',
        'description',
        'to_sync',
        'sync_ontime',
        'retrospective',
        'is_actived',
    ];

    public function getWhs()
    {
        return $this->hasOne(Whs::class, 'whs_id', 'id');
    }
}
