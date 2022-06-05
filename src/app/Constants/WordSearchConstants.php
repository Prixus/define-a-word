<?php


namespace App\Constants;

/**
 * Class WordSearchConstants
 *
 * @package App\Constants
 * @author Simon Peter Calamno
 * @since 2022.06.05
 */
class WordSearchConstants extends BaseConstants
{
    /**
     * Database table name
     */
    public const TABLE_NAME = 'prev_searches';

    /**
     * Database primary key
     */
    public const PRIMARY_KEY = 'prev_search_no';

    /**
     * Database Attributes
     */
    public const SEARCH_WORD = 'search_word';
}
