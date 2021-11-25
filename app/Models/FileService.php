<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class FileService extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'service_id',
        'type_id',
        'file_no',
        'file_name',
        'description',
        'file_size',
        'upload_at',
        'file_flag',
        'file_format',
        'file_originator',
        'file_filepath',
        'downloaded',
        'is_actived',
    ];

    public function getService()
    {
        return $this->hasOne(SystemSync::class, 'service_id', 'id');
    }
    public function getCategory()
    {
        return $this->hasOne(ServiceType::class, 'type_id', 'id');
    }
}
