<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPortal extends Model
{
    use HasFactory;

    protected $table = 'job_portals';

    protected $fillable = ['name', 'description', 'requirements'];

    public function images()
    {
        return $this->hasMany(JobImage::class, 'job_portal_id');
    }
}
