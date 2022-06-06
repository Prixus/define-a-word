<?php


namespace App\Constants;

/**
 * Class BaseConstants
 *
 * @package App\Constants
 * @author Simon Peter Calamno
 * @since 2022.06.04
 */
abstract class BaseConstants
{
    /**
     * Database Constants
     */
    public const CASCADE = 'cascade';

    /**
     * API Status Codes
     */
    public const UNPROCESSABLE_ENTITY = 422;

    /**
     * Words API URL Constants
     */
    public const WORDS_API_DOMAIN = 'wordsapiv1.p.rapidapi.com';
    public const WORDS_API_DEFINITION_ENDPOINT = '/words/$id/definitions';

    /**
     * Words API Header Keys
     */
    public const RAPID_API_HOST_HEADER = 'X-RapidAPI-Host';
    public const RAPID_API_KEY_HEADER = 'X-RapidAPI-Key';

    /**
     * Words API Headers
     */
    public const RAPID_API_AUTH_HEADERS = [
        self::RAPID_API_HOST_HEADER => 'wordsapiv1.p.rapidapi.com',
        self::RAPID_API_KEY_HEADER  => 'e7a07e3487msh45d759ce3583a9dp173a01jsn08993f9fda55'
    ];

    /**
     * Database Foreign Keys
     */
    public const DEFINITION_NO = 'definition_no';
    public const PREV_SEARCH_NO = 'prev_search_no';

    /**
     * Relationship constants
     */
    public const DEFINITIONS = 'definitions';

    /**
     * Common Constants
     */
    public const MESSAGE = 'message';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
}
