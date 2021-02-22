<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DescriptionTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('description_tag', function (Blueprint $table) {
            $table->foreignId('tag_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('description_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->primary(['tag_id','description_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
