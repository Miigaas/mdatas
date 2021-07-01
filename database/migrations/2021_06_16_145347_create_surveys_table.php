<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->string('idno')->unique()->nullable();
            $table->text('authoring_entity')->nullable();
            $table->string('nation')->nullable();
            $table->string('year_start');
            $table->string('metafile')->nullable();
            $table->text('keywords')->nullable();
            $table->bigInteger('total_view')->unsigned()->nullable();
            $table->integer('total_download')->nullable();
            $table->text('review')->nullable();
            $table->text('sampling');
            $table->text('data_collection');
            $table->text('data_processing');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->unsignedBigInteger('child_cat_id')->nullable();
            $table->unsignedBigInteger('dirpath_id')->nullable();
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('SET NULL');
            $table->foreign('child_cat_id')->references('id')->on('categories')->onDelete('SET NULL');
            $table->foreign('dirpath_id')->references('id')->on('files')->onDelete('SET NULL');
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
        Schema::dropIfExists('surveys');
    }
}
