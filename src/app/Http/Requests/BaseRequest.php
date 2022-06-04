<?php

namespace App\Http\Requests;

use App\Constants\ErrorConstants;
use App\Exceptions\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class BaseRequest
 *
 * @package App\Http\Requests
 * @author Simon Peter Calamno
 * @since 2022.05.21
 */
class BaseRequest extends FormRequest
{
    /**
     * Validation Rules
     */
    public const REQUIRED = 'required';
    public const STRING = 'string';

    /**
     * Handles failed validations
     * @param Validator $oValidator
     * @throws ValidationException
     */
    protected function failedValidation(Validator $oValidator)
    {
        $sErrorMessage = $oValidator->errors()->first();
        throw new ValidationException($sErrorMessage, ErrorConstants::UNPROCESSABLE_ENTITY);
    }
}
