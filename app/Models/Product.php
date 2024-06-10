<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'products';

    protected $appends = [
        'main_photo',
        'photos',
    ];

    public const VIDEO_PROVIDER_SELECT = [
        'youtube' => 'Youtube',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const COLORS_SELECT = [
        'red'   => 'Red',
        'black' => 'Black',
    ];

    public const ADDED_BY_SELECT = [
        'admin' => 'admin',
        'store' => 'store',
    ];

    public const ATTRIBUTES_SELECT = [
        'size'   => 'Size',
        'weight' => 'Weight',
    ];

    public const DISCOUNT_TYPE_RADIO = [
        'flat'       => 'بالقيمة',
        'percentage' => 'بالنسبة',
    ];

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'details',
        'short_details',
        'added_by',
        'slug',
        'attributes',
        'attribute_options',
        'colors',
        'tags',
        'video_provider',
        'video_link',
        'discount_type',
        'discount',
        'meta_title',
        'meta_description',
        'user_id',
        'published',
        'featured',
        'variant_product',
        'rating',
        'current_stock',
        'num_of_sale',
        'brand_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getMainPhotoAttribute()
    {
        $file = $this->getMedia('main_photo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getPhotosAttribute()
    {
        $file = $this->getMedia('photos')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
