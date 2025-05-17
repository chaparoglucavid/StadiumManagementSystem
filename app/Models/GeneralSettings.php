<?php
// app/Models/GeneralSettings.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class GeneralSettings extends Model
{
    use HasTranslations;

    protected $table = 'general_settings';

    public $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'site_name',
        'site_description',
        'currency',
        'currency_symbol',
        'currency_position',
        'timezone',
        'date_format',
        'time_format',
        'default_language',
        'logo',
        'favicon',
        'meta_keywords',
        'meta_description',
        'primary_color',
        'secondary_color',
        'maintenance_mode',
        'maintenance_message',
        'support_email',
        'support_phone',
        'social_networks'
    ];

    public $translatable = [
        'site_name',
        'site_description',
        'meta_keywords',
        'meta_description',
        'maintenance_message',
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
