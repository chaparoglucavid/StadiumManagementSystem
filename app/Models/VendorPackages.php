<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendorPackages extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'vendor_packages';

    public $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'package_name',
        'package_description',
        'amount',
        'commission',
        'logo',
        'duration',
        'status',
    ];

    public function stadiums()
    {
        return $this->hasMany(Stadiums::class, 'vendor_packages_uid');
    }
}
