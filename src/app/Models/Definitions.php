<?php

namespace App\Models;

use App\Constants\DefinitionConstants;
use App\Constants\WordDefinitionConstants;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Definitions
 *
 * @package App\Models
 * @author Simon Peter Calamno
 * @since 2022.06.04
 */
class Definitions extends Model
{
    /**
     * Syncs the model to a database table
     * @var string
     */
    protected $table = DefinitionConstants::TABLE_NAME;

    /**
     * Previous Searches belonging to the current definition
     */
    public function prevSearches()
    {
        return $this->belongsToMany(
            PrevSearches::class,
            WordDefinitionConstants::TABLE_NAME,
            WordDefinitionConstants::DEFINITION_NO,
            WordDefinitionConstants::PREV_SEARCH_NO
        );
    }
}
