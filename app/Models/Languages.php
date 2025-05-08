<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Languages extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $table = 'languages';

    public $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uid',
        'name',
        'shortened',
        'icon',
        'status'
    ];

    public $translatable = [
        'name',
        'shortened',
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

    public function translations()
    {
        return $this->hasMany(Translations::class, 'languages_uid', 'uid');
    }
}
