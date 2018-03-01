<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('activable');
            $table->boolean('value')->default(1);
            $table->string('reason')->nullable();
            $table->nullableMorphs('agent');
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
        Schema::dropIfExists('activables');
    }
}
