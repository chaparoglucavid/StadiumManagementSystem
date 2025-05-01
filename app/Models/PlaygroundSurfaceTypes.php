<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlaygroundSurfaceTypes extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'playground_surface_types';

    public $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uid',
        'sport_types_uid',
        'name',
        'description',
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

    public function sport_types()
    {
        return $this->belongsTo(SportTypes::class, 'sport_types_uid', 'uid');
    }
}
