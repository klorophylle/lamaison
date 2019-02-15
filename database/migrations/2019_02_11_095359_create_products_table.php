<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->decimal('price', 6, 2); # premier chiffre correspond au nombre total de chiffres et le second au nombre de chiffres après la virgule
            $table->enum('size', ['46', '48', '50', '52']);
            $table->string('url_image');
            $table->enum('status', ['published', 'draft'])->default('draft');
            $table->enum('code', ['sale', 'new'])->default('new');
            $table->string('reference');
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
