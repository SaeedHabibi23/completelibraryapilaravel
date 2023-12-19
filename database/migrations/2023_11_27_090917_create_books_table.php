<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('book_id')->id()->unsigned();

            $table->string('book_name' , 64);  
            $table->integer('Prnityear');  
            $table->integer('NP');  
            $table->integer('buyPrice'); 
            $table->string('book_writer' , 64);  
              
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')->references('cat_id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            
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
}
