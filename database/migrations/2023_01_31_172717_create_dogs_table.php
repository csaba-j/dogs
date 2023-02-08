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
            $table->boolean('experimental')->default(0);
            $table->boolean('hairless')->default(0);
            $table->boolean('hypoallergenic')->default(0);
            $table->string('life_span')->nullable();
            $table->boolean('natural')->default(0);
            $table->string('origin')->nullable();
            $table->boolean('rare')->default(0);
            $table->string('image')->nullable();
            $table->string('reference_image_id')->nullable();
            $table->string('reference_image_name')->nullable();
            $table->boolean('rex')->default(0);
            $table->boolean('short_legs')->default(0);
            $table->boolean('suppressed_tail')->default(0);
            $table->string('temperament')->nullable()->default('');
            $table->string('weight_imperial')->nullable()->default('');
            $table->string('wikipedia_url')->nullable()->default('');
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
