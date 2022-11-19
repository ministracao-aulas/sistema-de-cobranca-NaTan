<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('description')->nullable();
            $table->json('items')->nullable();
            $table->string('amount')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->index('status');
            $table->foreign('customer_id')->references('id')
                ->on('customers')->onDelete('cascade');//cascade|set null
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
