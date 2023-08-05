<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("desc")->nullable();
            $table->string("image")->nullable();
            $table->string("unit")->nullable();
            $table->integer("price")->nullable();
            $table->string("size")->nullable();
            $table->integer("stock")->nullable();
            $table->integer("min_stock")->nullable();
            $table->integer("max_stock")->nullable();
            $table->integer("alert_stock")->nullable();
            $table->string("status")->default("active");
            $table->foreignId("category_id")->nullable();
            $table->foreignId("created_by")->nullable();
            $table->foreignId("updated_by")->nullable();
            $table->foreignId("deleted_by")->nullable();
            $table->date("deleted_at")->nullable();
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
        Schema::dropIfExists('materials');
    }
}
