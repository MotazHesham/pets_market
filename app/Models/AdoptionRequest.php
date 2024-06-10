<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdoptionRequest extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'adoption_requests';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const GENDER_RADIO = [
        'male'   => 'ذكر',
        'female' => 'انثى',
    ];

    public const AGE_SELECT = [
        'below_18' => 'اقل من 18 سنة',
        '18_25'    => 'من 18 الي 25 سنة',
        '25_40'    => 'من 25 الي 40 سنة',
        'upp_40'   => 'أكبر من 40 سنة',
    ];

    protected $fillable = [
        'refuge_pet_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'gender',
        'age',
        'address',
        'note',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function refuge_pet()
    {
        return $this->belongsTo(RefugePet::class, 'refuge_pet_id');
    }
}
