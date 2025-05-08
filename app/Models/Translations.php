<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Translations extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'translations';

    public $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uid',
        'languages_uid',
        'key',
        'value'
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

    public static function getValue(string $key, string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();

        $cacheKey = "translation.{$key}.{$locale}";

        return Cache::rememberForever($cacheKey, function () use ($key, $locale) {
            return self::join('languages', 'translations.languages_uid', '=', 'languages.uid')
                ->where('translations.key', $key)
                ->where('languages.code', $locale)
                ->value('translations.value') ?? $key;
        });
    }

    public function languages()
    {
        return $this->belongsTo(Languages::class, 'languages_uid', 'uid');
    }
}
