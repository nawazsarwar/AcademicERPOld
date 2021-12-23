<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AcademicQualification extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public const RESULT_SELECT = [
        'Passed'  => 'Passed',
        'Awaited' => 'Awaited',
        'Fail'    => 'Fail',
    ];

    public const GRADING_TYPE_SELECT = [
        'Percentage Grading' => 'Percentage Grading',
        'Letter Grading'     => 'Letter Grading',
        'GPA'                => 'GPA',
    ];

    public $table = 'academic_qualifications';

    protected $appends = [
        'certificate',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'qualification_level_id',
        'name',
        'year',
        'roll_no',
        'board_id',
        'result',
        'grading_type',
        'grade',
        'cdn_url',
        'status',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function qualification_level()
    {
        return $this->belongsTo(QualificationLevel::class, 'qualification_level_id');
    }

    public function board()
    {
        return $this->belongsTo(Board::class, 'board_id');
    }

    public function getCertificateAttribute()
    {
        return $this->getMedia('certificate')->last();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
