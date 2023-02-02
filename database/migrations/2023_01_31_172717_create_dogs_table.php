<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dogs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('alt_names')->nullable();
            $table->boolean('experimental');
            $table->boolean('hairless');
            $table->boolean('hypoallergenic');
            $table->string('life_span');
            $table->boolean('natural');
            $table->string('origin');
            $table->boolean('rare');
            $table->string('reference_image_name')->nullable();
            $table->boolean('rex');
            $table->boolean('short_legs');
            $table->boolean('suppressed_tail');
            $table->string('temperament');
            $table->string('weight_imperial');
            $table->string('wikipedia_url');
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
        Schema::dropIfExists('dogs');
    }
}
