<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestTestCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_test_category', function (Blueprint $table) {
            $table->unsignedBigInteger('test_id');
            $table->unsignedBigInteger('test_category_id');
            $table->timestamps();

            $table->foreignId('test_id')->constrained();
            $table->foreignId('test_category_id')->constrained();
            $table->unique(['test_id', 'test_category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_test_category');
    }
}
