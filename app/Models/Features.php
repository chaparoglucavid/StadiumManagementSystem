<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Features extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $table = 'features';

    public $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uid',
        'name',
        'description',
        'icon',
        'status'
    ];

    public $translatable = [
        'name', 'description'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uid)) {
                $model->uid = \Illuminate\Support\Str::uuid()->toString();
            }
        });
    }

    public function scopeIsActive($query)
    {
        return $query->where('status', 'active');
    }

    public function stadiums()
    {
        return $this->belongsToMany(Stadiums::class, 'stadiums_features', 'features_uid', 'stadiums_uid');
    }
}
