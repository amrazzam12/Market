<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('desc');
            $table->integer('stock');
            $table->string('photo');
            $table->float('price');
            $table->tinyInteger('sale');
            $table->float('weight');
            $table->enum('condition' , ['new' , 'used']);
            $table->enum('status' , ['active' , 'inactive']);
            $table->foreignId('cat_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('subcat_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('vendor_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
}
