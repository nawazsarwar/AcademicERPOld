<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paper extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const TEACHING_STATUS_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    public $table = 'papers';

    public static $searchable = [
        'name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code',
        'name',
        'status',
        'remarks',
        'paper_type_id',
        'part',
        'teaching_status',
        'credits',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function paper_type()
    {
        return $this->belongsTo(PaperType::class, 'paper_type_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
