<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantList extends Model
{
    protected $table = 'applicant_list'; // Explicitly set the table name
    protected $fillable = ['name', 'bday', 'resume_path', 'job_id'];

    public function job()
    {
        return $this->belongsTo(JobPortal::class, 'job_id');
    }
}
