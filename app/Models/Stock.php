<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class Stock extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'part_id',
        'quantity',
        'quantity_limit',
        'on_month',
        'last_year',
        'description',
        'is_actived',
    ];

    public function getpart_id()
    {
        return $this->hasOne(Part::class, 'part_id', 'id');
    }
}
