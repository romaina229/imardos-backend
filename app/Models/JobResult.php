<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobResult extends Model
{
    use HasFactory;

    protected $table = 'job_results'; 

    protected $fillable = [
        'name', 'job_title', 'result_content', 'status'
    ];
}