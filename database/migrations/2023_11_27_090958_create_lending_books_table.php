<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLendingBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lending_books', function (Blueprint $table) {
            $table->bigIncrements('lending_id')->id()->unsigned();

            $table->date('datelend');  
            $table->date('datedeleiver');
            $table->string('customer_name' , 64);  
            $table->integer('CustomerPhone');  
            $table->string('Customerdescription');  



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
        Schema::dropIfExists('lending_books');
    }
}
