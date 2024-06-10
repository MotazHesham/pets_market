<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'orders';

    public const PAYMENT_TYPE_SELECT = [
        'cash' => 'cash',
    ];

    public const DELIVERY_STATUS_SELECT = [
        'pending' => 'pending',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const PAYMENT_STATUS_SELECT = [
        'unpaid' => 'unpaid',
        'paid'   => 'paid',
    ];

    protected $fillable = [
        'order_num',
        'first_name',
        'last_name',
        'phone_number',
        'country_id',
        'shipping_country_cost',
        'city',
        'shipping_address',
        'delivery_status',
        'total_cost',
        'payment_type',
        'payment_status',
        'discount',
        'discount_code',
        'cancel_reason',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function orderOrderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
