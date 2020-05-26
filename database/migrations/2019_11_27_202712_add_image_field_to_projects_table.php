<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageFieldToProjectsTable extends Migration
{
  public function up()
  {
    Schema::table('projects', function (Blueprint $table) {
      $table->string('image')->after('id')->nullable();
    });
  }
  
  public function down()
  {
    Schema::table('projects', function (Blueprint $table) {
      $table->dropColumn('image');
    });
  }
}