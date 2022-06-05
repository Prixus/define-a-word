<?php

use App\Constants\WordSearchConstants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Previous Searches Table Migration
 *
 * @author Simon Peter Calamno
 * @since 2022.06.04
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(WordSearchConstants::TABLE_NAME, function (Blueprint $table) {
            $table->bigIncrements(WordSearchConstants::PRIMARY_KEY);
            $table->string(WordSearchConstants::SEARCH_WORD, 100);
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
        Schema::dropIfExists(WordSearchConstants::TABLE_NAME);
    }
};
