<?php


namespace App\Constants;

/**
 * Class WordDefinitionConstants
 *
 * @package App\Constants
 * @author Simon Peter Calamno
 * @since 2022.06.05
 */
class WordDefinitionConstants extends BaseConstants
{
    /**
     * Database table name
     */
    public const TABLE_NAME = 'definitions_prev_searches';

    /**
     * Database primary key
     */
    public const PRIMARY_KEY = 'definition_prev_search_no';

    /**
     * Indexes
     */
    public const INDEX_FK_DEFINITIONS = 'ixnn_definitions__definition_no';
    public const INDEX_FK_PREV_SEARCHES = 'ixnn_prev_searches__prev_search_no';
}
