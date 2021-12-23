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

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code',
        'title',
        'paper_type_id',
        'fraction',
        'teaching_status',
        'credits',
        'status',
        'remarks',
        'administrable_id',
        'administrable_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function paper_type()
    {
        return $this->belongsTo(PaperType::class, 'paper_type_id');
    }

    public function administrable()
    {
        return $this->belongsTo(Department::class, 'administrable_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
