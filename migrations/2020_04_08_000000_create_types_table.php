<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('types', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('category', 50);
            $table->string('name', 50);
            $table->timestamps();
        });

        $rows = [];
        foreach ($this->initialTypes as $category => $types) {
            foreach ($types as  $name) {
                $rows[] = ['category' => $category, 'name' => $name];
            }
        }
        \DB::table('types')->insert($rows);
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

    protected $initialTypes = [];
}
