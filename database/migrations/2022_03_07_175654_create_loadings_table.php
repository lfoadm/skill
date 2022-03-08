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
        Schema::create('loadings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->nullable()->constrained();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //quem recebeu
            $table->foreignId('truck_id')->constrained()->onDelete('cascade'); //caminhao vinculado
            $table->double('amount', 10, 2); //valor recebido que vai para saldo
            $table->bigInteger('user_id_register'); //quem registrou
            $table->date('loadingDate');
            $table->string('place');
            $table->string('product');
            $table->double('volume', 10, 2);
            $table->double('unitPrice', 10, 2);
            $table->double('totalPrice', 10, 2);
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
        Schema::dropIfExists('loadings');
    }
};
