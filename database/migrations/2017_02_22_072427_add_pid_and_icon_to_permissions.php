<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPidAndIconToPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->integer('pid')->unsigned()->after('id')->comment('父权限ID');
            $table->string('icon', 255)->after('name')->comment('权限作为菜单时的图标')->default('');
            $table->index('pid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropIndex('permissions_pid_index');
            $table->dropColumn('pid');
            $table->dropColumn('icon');
        });
    }
}
