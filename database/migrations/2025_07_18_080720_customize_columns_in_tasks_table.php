<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_assigned_by_uid_foreign');
            $table->renameColumn('assigned_by_uid', 'created_by');
            $table->dropForeign('tasks_assigned_to_uid_foreign');
            $table->dropColumn('assigned_to_uid');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
        });
    }
};

