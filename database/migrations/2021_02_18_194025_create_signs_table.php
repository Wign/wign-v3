<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signs', function (Blueprint $table) {
            $table->id();
            $table->string('video_uuid')->unique();
            $table->string('video_url');
            $table->string('thumbnail_url');
            $table->string('small_thumbnail_url');
            $table->unsignedBigInteger('playings')->default(0);
            $table->foreignId('sign_language_id')->constrained('languages')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('word_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('creator_id')->nullable()->comment("Creator can be nullable, but only in certain situations, where the creator have grant permission to let the signs keep here")->constrained('users')->cascadeOnUpdate()->restrictOnDelete();
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
        Schema::dropIfExists('signs');
    }
}
