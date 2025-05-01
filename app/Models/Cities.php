<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cities extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cities';

    public $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uid',
        'city_name',
        'status'
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


    public function regions()
    {
        return $this->hasMany(Regions::class, 'cities_uid', 'uid');
    }

    public function stadium_branches()
    {
        return $this->hasMany(StadiumBranches::class, 'cities_uid', 'uid');
    }
}
