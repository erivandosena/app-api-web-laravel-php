<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsuariosPapeisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios_papeis', function (Blueprint $table) {
            $table->foreign('role_id', 'users_roles_role_id_foreign')->references('id')->on('papeis')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('user_id', 'users_roles_user_id_foreign')->references('id')->on('usuarios')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios_papeis', function (Blueprint $table) {
            $table->dropForeign('users_roles_role_id_foreign');
            $table->dropForeign('users_roles_user_id_foreign');
        });
    }
}
