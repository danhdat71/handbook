<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('background')->nullable()->default(null);
            $table->string('logo')->nullable()->default(null);
            $table->string('title')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            $table->string('background_sound')->nullable()->default(null);
            $table->string('book_width')->nullable()->default(null);
            $table->string('book_height')->nullable()->default(null);
            $table->string('speed')->nullable()->default(null);
            $table->tinyInteger('auto_center')->nullable()->default(1);
            $table->tinyInteger('is_gradient')->nullable()->default(1);
            $table->string('phone')->nullable()->default(null);
            $table->string('website')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
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
        Schema::dropIfExists('configs');
    }
}
