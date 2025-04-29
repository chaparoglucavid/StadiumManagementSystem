<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StadiumsFeatures extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stadiums_features';

    public $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';
}
