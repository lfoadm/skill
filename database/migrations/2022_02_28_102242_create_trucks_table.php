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
        Schema::create('trucks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->nullable()->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->boolean('status')->default(true);
            $table->string('image')->nullable();
            $table->string('surname')->nullable();
            $table->string('brand', 30);
            $table->string('model', 30);
            $table->string('yearManufacture', 4);
            $table->string('modelYear', 4);
            $table->string('color', 30);
            $table->string('plate', 8);
            $table->string('chassis', 17);
            $table->string('renavan', 15);
            $table->string('UF', 2);
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
        Schema::dropIfExists('trucks');
    }
};
