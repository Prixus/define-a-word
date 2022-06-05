<?php

namespace App\Models;

use App\Constants\WordDefinitionConstants;
use App\Constants\WordSearchConstants;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PrevSearches
 *
 * @package App\Models
 * @author Simon Peter Calamno
 * @since 2022.06.04
 */
class PrevSearches extends Model
{
    /**
     * Syncs the model to a database table
     * @var string
     */
    protected $table = WordSearchConstants::TABLE_NAME;

    /**
     * Sets the Primary Key
     * @var string
     */
    protected $primaryKey = WordSearchConstants::PRIMARY_KEY;

    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = [];

    /**
     * Definitions belonging to the current search
     */
    public function definitions()
    {
        return $this->belongsToMany(
            Definitions::class,
            WordDefinitionConstants::TABLE_NAME,
            WordDefinitionConstants::PREV_SEARCH_NO,
            WordDefinitionConstants::DEFINITION_NO
        );
    }
}
