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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('cover')->nullable();
            $table->string('language');
            $table->string('publisher');
            $table->string('year');
            $table->string('genres');
            $table->string('author');
            $table->float('rating', 3, 2)->default('2.5');
            $table->longText('description');
            $table->integer('votes')->default('0');
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
        Schema::dropIfExists('books');
    }
};
