<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class OrderPlan extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'service_id',
        'seq',
        'vendor',
        'cd',
        'unit',
        'whs',
        'tagrp',
        'factory',
        'sortg1',
        'sortg2',
        'sortg3',
        'plantype',
        'orderid',
        'pono',
        'recid',
        'biac',
        'shiptype',
        'etdtap',
        'partno',
        'partname',
        'pc',
        'commercial',
        'sampleflg',
        'orderorgi',
        'orderround',
        'firmflg',
        'shippedflg',
        'shippedqty',
        'ordermonth',
        'balqty',
        'bidrfl',
        'deleteflg',
        'ordertype',
        'reasoncd',
        'upddte',
        'updtime',
        'carriercode',
        'bioabt',
        'bicomd',
        'bistdp',
        'binewt',
        'bigrwt',
        'bishpc',
        'biivpx',
        'bisafn',
        'biwidt',
        'bihigh',
        'bileng',
        'lotno',
        'minimum',
        'maximum',
        'picshelfbin',
        'stkshelfbin',
        'ovsshelfbin',
        'picshelfbasicqty',
        'outerpcs',
        'allocateqty',
        'is_sync',
    ];

    public function getFileService()
    {
        return $this->hasOne(FileService::class, 'service_id', 'id');
    }
}
