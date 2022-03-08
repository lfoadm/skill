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
        Schema::create('historics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->nullable()->constrained();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //quem recebeu
            $table->foreignId('truck_id')->constrained()->onDelete('cascade'); //caminhao vinculado
            $table->enum('type', ['I', 'O', 'T']);
            $table->string('category');
            $table->string('partner', 100);
            $table->double('amount', 10, 2);
            $table->double('total_before', 10, 2);
            $table->double('total_after', 10, 2);
            $table->bigInteger('user_id_register')->nullable(); //quem recebeu transferencia
            $table->date('date');

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
        Schema::dropIfExists('historics');
    }
};
