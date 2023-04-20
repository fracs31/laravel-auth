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
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); //id
            $table->string("title")->unique(); //titolo
            $table->string("client"); //cliente
            $table->text("description"); //descrizione
            $table->text("url"); //url
            $table->string("slug"); //slug
            $table->softDeletes(); //soft delete
            $table->timestamps(); //data di creazione e di modifica
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
