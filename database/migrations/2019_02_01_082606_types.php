<?php

//use DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Types extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        /* 
        DB::table('types')->insert(
           array(
             ['name' => 'debit'],    
             ['name' => 'deposit'],     
             ['name' => 'credit'],                       
           )               
        );
        */ 

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('types');        
    }
}
