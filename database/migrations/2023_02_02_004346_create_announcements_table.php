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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('an_title');
            $table->string('slug');
            $table->text('an_description');
            $table->string('an_size')->nullable();
            $table->string('an_type')->nullable();
            $table->string('an_color')->nullable();
            $table->string('an_brand')->nullable();
            $table->string('an_categorie')->nullable();
            $table->string('an_address')->nullable();
            $table->string('an_state')->nullable();
            $table->string('an_photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
};
