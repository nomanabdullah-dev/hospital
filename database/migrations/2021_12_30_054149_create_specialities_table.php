<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialities', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->unique();
            $table->string('code', 10)->nullable()->unique();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->foreignId('created_by', 40)->nullable()->constrained('users');
            $table->foreignId('updated_by', 40)->nullable()->constrained('users');
            $table->foreignId('deleted_by', 40)->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialities');
    }
}
