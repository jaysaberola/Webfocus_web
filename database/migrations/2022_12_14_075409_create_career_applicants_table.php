<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_applicants', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('career_id');
            $table->string('name', 150);
            $table->string('email', 150);
            $table->string('contact', 150);
            $table->string('resume', 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('career_applicants');
    }
};
