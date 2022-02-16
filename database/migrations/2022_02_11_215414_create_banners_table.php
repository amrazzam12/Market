<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{

    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('slug');
            $table->text('desc');
            $table->text('photo');
            $table->enum('status' , ['main' , 'active' , 'inactive']);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
