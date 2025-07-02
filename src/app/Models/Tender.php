<?php

namespace App\Models;

use App\Enums\TenderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    /** @use HasFactory<\Database\Factories\TenderFactory> */
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = ['external_code', 'number', 'status', 'name' , 'updated_at'];

    protected $casts = [
        'status' => TenderStatus::class,
    ];
}
