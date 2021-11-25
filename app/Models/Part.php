<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class Part extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'partno',
        'description',
        'is_actived',
    ];
}
