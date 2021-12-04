<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pincode extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'pincodes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'locality',
        'pincode',
        'sub_district',
        'district',
        'province_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
