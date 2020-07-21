<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('ip');
            $table->boolean('is_custom');
            $table->longText('long_url');
            $table->string('meta_title');
            $table->unsignedInteger('clicks')->default(0);
            $table->unsignedBigInteger('user_id')->nullable(true);
            $table->string('keyword')->collaction('utf8mb4_bin')->unique();
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
        Schema::dropIfExists('urls');
    }
}
