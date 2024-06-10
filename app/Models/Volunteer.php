<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Volunteer extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'volunteers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const GENDER_SELECT = [
        'male'   => 'ذكر',
        'female' => 'انثي',
    ];

    public const PERIOD_TIME_SELECT = [
        'morning' => 'فترة صباحية',
        'evening' => 'فترة مسائية',
    ];

    public const AGE_SELECT = [
        'below_18' => 'اقل من 18 سنة',
        '18_25'    => 'من 18 الي 25 سنة',
        '25_40'    => 'من 25 الي 40 سنة',
        'up_40'    => 'أكبر من 40 سنة',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'gender',
        'age',
        'experience',
        'fields',
        'period_time',
        'note',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const FIELDS_RADIO = [
        'rescue'     => 'إنقاذ الكلاب أو القطط',
        'photo'      => 'تصوير',
        'interviews' => 'إجراء المقابلات مع المتبنيين وتحديد مدى ملائمتهم للتبني',
        'delivery'   => 'توصيل القطط أو الكلاب الى عيادات خارجية في حال الحاجة لذلك',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
