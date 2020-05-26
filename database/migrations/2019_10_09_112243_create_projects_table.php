<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
  public function up()
  {
    Schema::create('projects', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('title');
        $table->string('url')->unique();
        $table->text('description');
        $table->timestamps();
    });
  }
  
  public function down()
  {
    Schema::dropIfExists('projects');
  }
}