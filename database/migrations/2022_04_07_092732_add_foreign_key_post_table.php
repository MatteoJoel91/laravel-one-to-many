<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {

            // creazione colonna per la tabella esterna
            $table->unsignedBigInteger('category_id')->nullable()->after('slug');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null'); /* onDelete('set null') serve per non far cancellare tutto */

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {

            // COSA METTERE TRA () DI dropForeign()
            // su phpMyASdmin andare sulla taballa, struttura, nome della chiave della colonna esterna creata in precedenza con il metodo up()
            $table->dropForeign('posts_category_id_foreign'); /* cancello prima il vincolo altrimenti la colonna non viene cancellata */
            $table->dropColumn('category_id'); /* cancello la colonna dopo aver cancellato il vincolo a riga 37 altrimenti la colonna non viene cancellata */

        });
    }
}
