<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerRedactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_redact', function (Blueprint $table) {
            $table->id();
            $table->string('shop_id')->nullable(true);
            $table->string('shop_domain')->nullable(true);
            $table->string('customer_id')->nullable(true);
            $table->string('customer_email')->nullable(true);
            $table->string('customer_phone')->nullable(true);
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
        Schema::dropIfExists('customer_redact');
    }
}
