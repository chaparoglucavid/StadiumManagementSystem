<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class SportTypes extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $table = 'sport_types';

    public $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uid',
        'name',
        'description',
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

    public function playground_surface_types()
    {
        return $this->hasMany(PlaygroundSurfaceTypes::class, 'sport_types_uid', 'uid');
    }
}
