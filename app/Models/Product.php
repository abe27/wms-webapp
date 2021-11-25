<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{
    use HasApiTokens, HasFactory, Uuids, Notifiable;

    protected $fillable = [
        'whs_id',
        'tag_id',
        'store_id',
        'part_type_id',
        'part_vendor_id',
        'part_id',
        'part_kind_id',
        'part_size_id',
        'part_color_id',
        'weight',
        'images',
        'is_actived',
    ];

    public function getWhs()
    {
        return $this->hasOne(Whs::class, 'whs_id', 'id');
    }

    public function getTag()
    {
        return $this->hasOne(Tag::class, 'tag_id', 'id');
    }

    public function getStore()
    {
        return $this->hasOne(Store::class, 'store_id', 'id');
    }

    public function getPartType()
    {
        return $this->hasOne(PartType::class, 'part_type_id', 'id');
    }

    public function getPartVendor()
    {
        return $this->hasOne(PartVendor::class, 'part_vendor_id', 'id');
    }

    public function getPart()
    {
        return $this->hasOne(Part::class, 'part_id', 'id');
    }

    public function getPartKind()
    {
        return $this->hasOne(PartKind::class, 'part_kind_id', 'id');
    }

    public function getPartSize()
    {
        return $this->hasOne(PartSize::class, 'part_size_id', 'id');
    }

    public function getPartColor()
    {
        return $this->hasOne(PartColor::class, 'part_color_id', 'id');
    }
}
