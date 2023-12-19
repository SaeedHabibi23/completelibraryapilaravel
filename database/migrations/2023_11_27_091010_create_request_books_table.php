<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_books', function (Blueprint $table) {
            $table->bigIncrements('request_id')->id()->unsigned();

            $table->date('daterequest');  
            $table->string('user_name' , 64);  
            $table->integer('userphone');  
            $table->string('user_address');  



            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('book_id')->on('books')->onDelete('cascade')->onUpdate('cascade');
          
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
        Schema::dropIfExists('request_books');
    }
}
