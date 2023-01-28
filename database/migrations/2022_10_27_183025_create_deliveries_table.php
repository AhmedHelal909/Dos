<?php

use App\Enum\GenderEnum;
use App\Enum\StatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->tinyInteger('gender')->default(GenderEnum::getMale());
            $table->tinyInteger('status')->default(StatusEnum::getPending());
            $table->string('password')->nullable();


            $table->string('ssn') ->nullable();
            $table->string('motor_number') ->nullable();
            $table->string('license') ->nullable();
            $table->string('image')->nullable();
            $table->string('pdf')->nullable();
            $table->string('branch_id')->nullable();
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
        Schema::dropIfExists('deliveries');
    }
};
