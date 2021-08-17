<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('expense_id');
            $table->string('expense_title')->nullable();
            $table->integer('expcate_id');
            $table->string('expense_amount',10)->nullable();
            $table->string('expense_date',20)->nullable();
            $table->integer('expense_creator');
            $table->string('expense_slug',50)->nullable();
            $table->integer('expense_status')->default(1);
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
        Schema::dropIfExists('expenses');
    }
}
