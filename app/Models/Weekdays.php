<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Weekdays extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $table = 'weekdays';

    public $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uid',
        'name'
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

}
