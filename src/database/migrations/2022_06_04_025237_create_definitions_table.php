<?php

use App\Constants\DefinitionConstants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Definitions Table Migration
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
        Schema::create(DefinitionConstants::TABLE_NAME, function (Blueprint $table) {
            $table->bigIncrements(DefinitionConstants::PRIMARY_KEY);
            $table->string(DefinitionConstants::DEFINITION, 500);
            $table->string(DefinitionConstants::PART_OF_SPEECH, 30);
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
        Schema::dropIfExists(DefinitionConstants::TABLE_NAME);
    }
};
