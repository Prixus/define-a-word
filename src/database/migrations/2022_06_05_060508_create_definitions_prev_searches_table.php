<?php

use App\Constants\DefinitionConstants;
use App\Constants\WordDefinitionConstants;
use App\Constants\WordSearchConstants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Pivot Table Migration for prev_searches and definitions table
 *
 * @author Simon Peter Calamno
 * @since 2022.06.05
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
        Schema::create(WordDefinitionConstants::TABLE_NAME, function (Blueprint $table) {
            $table->bigIncrements(WordDefinitionConstants::PRIMARY_KEY);
            $table->foreignId(WordDefinitionConstants::DEFINITION_NO);
            $table->foreignId(WordDefinitionConstants::PREV_SEARCH_NO);
            $table->timestamps();

            $table->foreign(WordDefinitionConstants::DEFINITION_NO, WordDefinitionConstants::INDEX_FK_DEFINITIONS)
                ->references(DefinitionConstants::PRIMARY_KEY)
                ->on(DefinitionConstants::TABLE_NAME)
                ->onDelete(WordDefinitionConstants::CASCADE)
                ->onUpdate(WordDefinitionConstants::CASCADE);
            $table->foreign(WordDefinitionConstants::PREV_SEARCH_NO, WordDefinitionConstants::INDEX_FK_PREV_SEARCHES)
                ->references(WordSearchConstants::PRIMARY_KEY)
                ->on(WordSearchConstants::TABLE_NAME)
                ->onDelete(WordSearchConstants::CASCADE)
                ->onUpdate(WordSearchConstants::CASCADE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(WordDefinitionConstants::TABLE_NAME);
    }
};
