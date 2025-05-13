<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;
    protected $table = 'users';

    public $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uid',
        'name',
        'surname',
        'fatherName',
        'email',
        'phone',
        'birthday',
        'type',
        'role',
        'activityStatus',
        'onlineStatus',
        'password',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(static function ($model) {
            if (empty($model->uid)) {
                $model->uid = Str::uuid()->toString();
            }
        });
    }

    public function scopeIsActive($query){
        return $query->where('activityStatus', 'active');
    }

    public function scopeIsInactive($query){
        return $query->where('activityStatus', 'inactive');
    }

    public function scopeIsBanned($query){
        return $query->where('activityStatus', 'banned');
    }

    public function scopeIsCostumer($query){
        return $query->where('type', 'user');
    }

    public function stadiums(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Stadiums::class, 'users_uid', 'uid');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


}
