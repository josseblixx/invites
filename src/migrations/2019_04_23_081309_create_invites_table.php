<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invites', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->timestamps();
            $table->datetime('used_at')->nullable()->default(null);
            $table->datetime('expired_at');
            $table->string('token');
            $table->string('email');
            $table->string('first_name');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('invites');

    }
}
