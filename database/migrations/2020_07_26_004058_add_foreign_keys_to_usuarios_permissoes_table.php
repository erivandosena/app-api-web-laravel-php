<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsuariosPermissoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios_permissoes', function (Blueprint $table) {
            $table->foreign('permission_id', 'users_permissions_permission_id_foreign')->references('id')->on('permissoes')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('user_id', 'users_permissions_user_id_foreign')->references('id')->on('usuarios')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios_permissoes', function (Blueprint $table) {
            $table->dropForeign('users_permissions_permission_id_foreign');
            $table->dropForeign('users_permissions_user_id_foreign');
        });
    }
}
