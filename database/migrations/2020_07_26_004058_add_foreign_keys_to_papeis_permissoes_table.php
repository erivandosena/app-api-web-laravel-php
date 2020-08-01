<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPapeisPermissoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('papeis_permissoes', function (Blueprint $table) {
            $table->foreign('permission_id', 'roles_permissions_permission_id_foreign')->references('id')->on('permissoes')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('role_id', 'roles_permissions_role_id_foreign')->references('id')->on('papeis')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('papeis_permissoes', function (Blueprint $table) {
            $table->dropForeign('roles_permissions_permission_id_foreign');
            $table->dropForeign('roles_permissions_role_id_foreign');
        });
    }
}
