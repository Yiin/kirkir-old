<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breeds', function($table) {
            $table->increments('id');
            $table->integer('type_id');
            $table->string('name');
        });

        DB::table('breeds')->insert([
            ['type_id' => '0', 'name' => 'Abyssinian'],
            ['type_id' => '0', 'name' => 'Aegean'],
            ['type_id' => '0', 'name' => 'American Curl'],
            ['type_id' => '0', 'name' => 'Bengal'],
            ['type_id' => '1', 'name' => 'Afghan Hound'],
            ['type_id' => '1', 'name' => 'Aidi'],
            ['type_id' => '1', 'name' => 'Beagle'],
            ['type_id' => '1', 'name' => 'Havanese'],
            ['type_id' => '2', 'name' => 'Altai horse'],
            ['type_id' => '2', 'name' => 'Ban\'ei'],
            ['type_id' => '2', 'name' => 'Iomud'],
            ['type_id' => '2', 'name' => 'Lithuanian Heavy Draught']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('breeds');
    }
}
