<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasColumn('cars', 'manufacturer_id')) {
            Schema::table('cars', function (Blueprint $table) {
                $table->unsignedBigInteger('manufacturer_id')->after('name');

                $table->foreign('manufacturer_id')
                    ->references('id')
                    ->on('manufacturers')
                    ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('cars', 'manufacturer_id')) {
            Schema::table('cars', function (Blueprint $table) {
                $table->dropForeign(['manufacturer_id']);
                $table->dropColumn('manufacturer_id');
            });
        }
    }
};


