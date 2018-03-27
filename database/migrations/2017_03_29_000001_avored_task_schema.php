<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvoredTaskSchema extends Migration
{
    /**
     *
     * Install the AvoRed Task Module Schema.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tasks',function (Blueprint $table){

            $table->increments('id');
            $table->integer('admin_user_id')->unsigned()->nullable()->default(null);
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->enum('status',['NOT-STARTED','IN-PROGRESS','DONE']);
            $table->timestamps();

            $table->foreign('admin_user_id')->references('id')->on('admin_users')->onDelete('cascade');
        });


    }


    /**
     * Uninstall the AvoRed Address Module Schema.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');

    }
}
