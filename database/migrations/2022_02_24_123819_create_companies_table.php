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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->nullable()->constrained();
            $table->boolean('status')->default(true);
            $table->string('cnpj', 18);
            $table->string('corporateName', 100)->nullable();
            $table->string('fantasyName')->nullable();
            $table->string('phone', 15);
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->string('site', 100)->nullable();
            $table->string('instagram', 100)->nullable();
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
        Schema::dropIfExists('companies');
    }
};
