<?php


namespace App\Constants;

/**
 * Class DefinitionConstants
 *
 * @package App\Constants
 * @author Simon Peter Calamno
 * @since 2022.06.04
 */
class DefinitionConstants extends BaseConstants
{
    /**
     * Database table name
     */
    public const TABLE_NAME = 'definitions';

    /**
     * Database primary key
     */
    public const PRIMARY_KEY = 'definition_no';

    /**
     * Database attributes
     */
    public const DEFINITION = 'definition';
    public const PART_OF_SPEECH = 'part_of_speech';

    /**
     * API Keys
     */
    public const WORD = 'word';
    public const DEFINITIONS = 'definitions';
}
