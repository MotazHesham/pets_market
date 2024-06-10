<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryPet extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'delivery_pets';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TO_CITY_SELECT = [
        'egypt'    => 'مصر',
        'saudi'    => 'السعودية',
        'emerates' => 'الأمارات',
    ];

    public const FROM_CITY_SELECT = [
        'emrates' => 'الامارات',
        'egypt'   => 'مصر',
        'saudi'   => 'السعودية',
        'kuwit'   => 'الكويت',
    ];

    protected $fillable = [
        'from_city',
        'to_city',
        'num_of_pets',
        'date',
        'pet_type_id',
        'note',
        'name',
        'email',
        'phone',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function pet_type()
    {
        return $this->belongsTo(PetType::class, 'pet_type_id');
    }
}
