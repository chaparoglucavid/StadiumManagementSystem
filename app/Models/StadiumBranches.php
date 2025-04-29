<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StadiumBranches extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stadium_branches';

    public $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uid',
        'cities_uid',
        'regions_uid',
        'stadiums_uid',
        'branch_name',
        'branch_latitude',
        'branch_longitude',
        'branch_status',
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

    public function cities()
    {
        return $this->belongsTo(Cities::class, 'cities_uid', 'uid');
    }

    public function regions()
    {
        return $this->belongsTo(Regions::class, 'regions_uid', 'uid');
    }

    public function stadiums()
    {
        return $this->belongsTo(Stadiums::class, 'stadiums_uid', 'uid');
    }

}
