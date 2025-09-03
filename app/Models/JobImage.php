<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobImage extends Model
{
    use HasFactory;

    protected $table = 'jobs_images';

    protected $fillable = ['job_portal_id', 'image_path'];

    public function jobPortal()
    {
        return $this->belongsTo(JobPortal::class);
    }
}
