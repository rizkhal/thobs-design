<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('url_id')->constrained('urls')->onDelete('cascade');
            $table->string('referer', 300)->nullable()->default(0);
            $table->ipAddress('ip');
            $table->string('device')->nullable();
            $table->string('platform')->nullable();
            $table->string('platform_version')->nullable();
            $table->string('browser')->nullable();
            $table->string('browser_version')->nullable();
            $table->char('country', 10)->nullable();
            $table->string('country_full', 50)->nullable();
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
        Schema::dropIfExists('viststs');
    }
}
