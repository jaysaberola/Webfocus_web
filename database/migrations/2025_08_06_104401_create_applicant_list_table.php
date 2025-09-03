<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantListTable extends Migration
{
    public function up()
    {
        Schema::create('applicant_list', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('bday');
            $table->string('resume_path')->nullable();
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')->references('id')->on('job_portals')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('applicant_list');
    }
}
