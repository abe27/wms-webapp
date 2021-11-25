<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class ReceiveDetail extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'receive_id',
        'part_id',
        'receive_pln_qty',
        'receive_pln_ctn',
        'received_ctn',
        'is_received',
        'is_actived',
    ];

    public function getReceive()
    {
        return $this->hasOne(Receive::class, 'receive_id', 'id');
    }

    public function getPart()
    {
        return $this->hasOne(Part::class, 'part_id', 'id');
    }
}
