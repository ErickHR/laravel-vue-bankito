<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('document_type');
            $table->string('document_number');
            $table->string('name');
            $table->string('father_last_name');
            $table->string('mother_last_name');
            $table->string('gender');
            $table->string('country_birth')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('nationality')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('degree_of_study')->nullable();
            $table->string('cell')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('employment')->nullable();
            $table->string('salary')->nullable();
            $table->string('degree_credit')->nullable();
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
        Schema::dropIfExists('people');
    }
}
