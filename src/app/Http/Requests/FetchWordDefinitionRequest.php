<?php

namespace App\Http\Requests;

use App\Constants\DefinitionConstants;

/**
 * Class FetchWordDefinitionRequest
 *
 * @package App\Http\Requests
 * @author Simon Peter Calamno
 * @since 2022.06.04
 */
class FetchWordDefinitionRequest extends BaseRequest
{
    /**
     * Overrides the all method to define our route parameter
     * @param null $keys
     * @return array
     */
    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data[DefinitionConstants::WORD] = $this->route(DefinitionConstants::WORD);
        return $data;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            DefinitionConstants::WORD => [
                self::REQUIRED,
                self::STRING
            ]
        ];
    }
}
