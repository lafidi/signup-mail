<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Veranstaltung extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'veranstaltung';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titel',
        'ort',
        'startzeit',
        'endzeit',
        'user_id',
    ];
}
