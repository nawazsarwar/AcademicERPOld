<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const TYPE_SELECT = [
        'Normal'   => 'Normal',
        'WhatsApp' => 'WhatsApp',
        'Other'    => 'Other',
    ];

    public const CATEGORY_SELECT = [
        'Personal'        => 'Personal',
        'Parent/Guardian' => 'Parent/Guardian',
        'Emergency'       => 'Emergency',
    ];

    public $table = 'phones';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'dialing_code_id',
        'number',
        'category',
        'type',
        'status',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dialing_code()
    {
        return $this->belongsTo(Country::class, 'dialing_code_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
