<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stadiums extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stadiums';

    public $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uid',
        'users_uid',
        'name',
        'description',
        'status',
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

    public function user()
    {
        return $this->belongsTo(User::class, 'users_uid');
    }

    public function stadium_branches()
    {
        return $this->hasMany(StadiumBranches::class, 'stadiums_uid');
    }

    public function features()
    {
        return $this->belongsToMany(Features::class, 'stadiums_features', 'stadiums_uid', 'features_uid');
    }

    public function vendor_packages()
    {
        return $this->belongsTo(VendorPackages::class, 'vendor_packages_uid');
    }

    public function subscriptions()
    {
        return $this->hasMany(StadiumsSubscriptions::class, 'stadiums_uid');
    }

    public function currentSubscription()
    {
        return $this->hasOne(StadiumsSubscriptions::class, 'stadiums_uid')->where('end_date', '>=', now());
    }
}
