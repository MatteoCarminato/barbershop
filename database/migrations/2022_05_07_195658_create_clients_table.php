<?php

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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            $table->string('type')->nullable();
            $table->string('name')->nullable();

            $table->string('nickname')->nullable();
            $table->string('corporate_name')->nullable();
            $table->string('cnpj')->nullable();

            $table->string('adress')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('district')->nullable();
            $table->string('cep')->nullable();
            $table->unsignedTinyInteger('id_city'); // foreign_key cidades

            $table->string('telephone')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('email')->nullable();
            $table->string('nationality')->nullable();

            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('state_registration')->nullable();

            $table->string('note')->nullable();

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
        Schema::dropIfExists('clients');
    }
};
