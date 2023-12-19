<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSodBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sod_books', function (Blueprint $table) {
            $table->bigIncrements('sold_book_id')->id()->unsigned();

            $table->date('datesold');  
            $table->string('customer_name' , 64);  
            $table->integer('SoldPrice'); 


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
        Schema::dropIfExists('sod_books');
    }
}
