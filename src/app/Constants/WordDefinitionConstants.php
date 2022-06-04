<?php


namespace App\Constants;

/**
 * Class WordDefinitionConstants
 *
 * @package App\Constants
 * @author Simon Peter Calamno
 * @since 2022.06.04
 */
class WordDefinitionConstants extends BaseConstants
{
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
     * API Keys
     */
    public const WORD = 'word';
    public const DEFINITIONS = 'definitions';
}
