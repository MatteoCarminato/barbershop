<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('condition_payment_form_payment', function (
            Blueprint $table
        ) {
            $table
                ->foreign('condition_payment_id')
                ->references('id')
                ->on('condition_payments')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('form_payment_id')
                ->references('id')
                ->on('form_payments')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('condition_payment_form_payment', function (
            Blueprint $table
        ) {
            $table->dropForeign(['condition_payment_id']);
            $table->dropForeign(['form_payment_id']);
        });
    }
};
