<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class StadiumsSubscriptions extends Model
{
    use SoftDeletes;

    protected $table = 'stadiums_subscriptions';

    public $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uid',
        'stadiums_uid',
        'vendor_packages_uid',
        'package_name',
        'package_description',
        'amount',
        'commission',
        'duration',
        'start_date',
        'end_date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uid)) {
                $model->uid = Str::uuid()->toString();
            }
        });
    }

    public function stadiums()
    {
        return $this->belongsTo(Stadiums::class, 'stadiums_uid');
    }

    public function vendor_packages()
    {
        return $this->belongsTo(VendorPackages::class, 'vendor_packages_uid');
    }

    public function isActive()
    {
        return now()->between($this->start_date, $this->end_date);
    }
}
