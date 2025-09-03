<?php

namespace App\Models;

use App\Helpers\ModelHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CareerApplicant extends Model
{
    use SoftDeletes;

    protected $table = 'career_applicants';
    protected $fillable = ['career_id', 'name', 'email', 'contact', 'resume'];


    public function career()
    {
        return $this->belongsTo('App\Models\Career')->withTrashed()->withDefault(); 
    }

    public function date_created()
    {
        return ModelHelper::date_str($this->created_at);
    }
}
