<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function($table) {
            $table->increments('id');
            $table->string('name');
        });

        DB::table('types')->insert([
            ['name' => 'Cat'],
            ['name' => 'Dog'],
            ['name' => 'Horse']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('types');
    }
}
