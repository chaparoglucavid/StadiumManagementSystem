<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Regions extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $table = 'regions';

    public $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'cities_uid',
        'region_name',
        'status'
    ];

    public $translatable = [
        'region_name'
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

    public function cities()
    {
        return $this->belongsTo(Cities::class, 'cities_uid', 'uid');
    }

    public function stadium_branches()
    {
        return $this->hasMany(StadiumBranches::class, 'cities_uid', 'uid');
    }
}
