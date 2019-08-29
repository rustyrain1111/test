<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserIsBlock extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->char('is_block','1')->default(0)->after('is_admin');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_block');

        });
    }
}
