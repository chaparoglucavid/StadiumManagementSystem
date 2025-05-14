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
        $languageUid = Cache::rememberForever("language_uid.{$locale}", function () use ($locale) {
        return Languages::where("shortened->$locale", $locale)->value('uid');
        });

        if (!$languageUid) return $key;

        $cacheKey = "translation.{$key}.{$locale}";

        return Cache::rememberForever($cacheKey, function () use ($key, $languageUid) {
            return self::where('key', $key)
                ->where('languages_uid', $languageUid)
                ->value('value') ?? $key;
        });
    }


    public function languages()
    {
        return $this->belongsTo(Languages::class, 'languages_uid', 'uid');
    }
}
