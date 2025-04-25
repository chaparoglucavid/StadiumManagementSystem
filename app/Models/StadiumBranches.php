<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StadiumBranches extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stadium_branches';

    public $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'stadiums_uid',
        'branch_name',
        'branch_latitude',
        'branch_longitude',
        'branch_status',
    ];

}
