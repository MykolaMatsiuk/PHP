<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToFreepapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freepapers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('navsubmenu_id');
            $table->foreign('navsubmenu_id')
                  ->references('id')
                  ->on('navsubmenus')
                  ->onDelete('cascade');
            $table->string('title');
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
        //
    }
}
