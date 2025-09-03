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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id');
            $table->string('name', 150);
            $table->string('slug', 150);
            $table->date('start_date');
            $table->date('end_date');
            $table->longText('contents');
            $table->text('teaser');
            $table->integer('vacant_pos')->default(0);
            $table->boolean('is_active');
            $table->integer('user_id');
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
        Schema::dropIfExists('careers');
    }
};
