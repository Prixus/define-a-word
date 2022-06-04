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
     * Common Attributes
     */
    public const MAX_RESULTS = 'max_results';

    /**
     * API Status Codes
     */
    public const UNPROCESSABLE_ENTITY = 422;
}
