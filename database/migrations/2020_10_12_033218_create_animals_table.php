<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->after('id');
            $table->unsignedBigInteger('cage_id')->after('id');
            $table->string('animal');
            $table->string('animal_name');
            $table->decimal('buy', 11, 2)->nullable();
            $table->decimal('sold', 11, 2)->nullable();
            $table->boolean('status_sold')->default(0);
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('cage_id')->references('id')->on('cages');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
