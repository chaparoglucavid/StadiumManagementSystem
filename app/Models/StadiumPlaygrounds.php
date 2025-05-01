<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StadiumPlaygrounds extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stadium_playgrounds';

    public $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uid',
        'stadium_branches_uid',
        'sport_types_uid',
        'stadium_types_uid',
        'playground_surface_types_uid',
        'playground_name',
        'playground_status',
        'capacity',
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

    public function stadium_branches()
    {
        return $this->belongsTo(StadiumBranches::class, 'stadium_branches_uid', 'uid');
    }

    public function sport_types()
    {
        return $this->belongsTo(SportTypes::class, 'sport_types_uid', 'uid');
    }

    public function stadium_types()
    {
        return $this->belongsTo(StadiumTypes::class, 'stadium_types_uid', 'uid');
    }

    public function playground_surface_types()
    {
        return $this->belongsTo(PlaygroundSurfaceTypes::class, 'playground_surface_types_uid', 'uid');
    }

}
