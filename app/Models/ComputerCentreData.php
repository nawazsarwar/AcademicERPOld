<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComputerCentreData extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'computer_centre_datas';

    protected $dates = [
        'last_crawled_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'uri',
        'slug',
        'type',
        'parser',
        'data',
        'parent',
        'crawled',
        'last_crawled_at',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getLastCrawledAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setLastCrawledAtAttribute($value)
    {
        $this->attributes['last_crawled_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
