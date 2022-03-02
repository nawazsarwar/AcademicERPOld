<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notificable extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'notificables';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'notification_id',
        'notificable',
        'notificable_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function notification()
    {
        return $this->belongsTo(Notification::class, 'notification_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
