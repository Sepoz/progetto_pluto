<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->integer('price');
            $table->string('description');
            $table->string('img')->default('https://picsum.photos/200/300');
            // $table->string('img2')->default('https://picsum.photos/200/300');
            // $table->string('img3')->default('https://picsum.photos/200/300');
            // $table->string('img4')->default('https://picsum.photos/200/300');
            // $table->string('img5')->default('https://picsum.photos/200/300');
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
        Schema::dropIfExists('articles');
    }
}
