<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('art', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artist_id')->constrained()->onDelete('cascade');
            $table->string('title')->nullable();
            $table->year('year')->nullable();
            $table->date('publish')->nullable()->comment("Ferniseringsdato (ikke oprettelsesdato på Wign)");
            $table->boolean('visible')->default(1);
            $table->string('filename')->unique();
            $table->bigInteger('views')->unsigned()->default(TRUE);
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
        Schema::table('art', function (Blueprint $table) {
            $table->dropForeign(['artist_id']);
        });

        Schema::dropIfExists('art');
    }
}
