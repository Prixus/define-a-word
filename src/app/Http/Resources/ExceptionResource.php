<?php

namespace App\Http\Resources;

use App\Constants\ErrorConstants;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * Class ExceptionResource
 *
 * @package App\Http\Resources
 * @author Simon Peter Calamno
 * @since 2022.06.04
 */
class ExceptionResource extends JsonResource
{
    /**
     * Sets the wrapper to error
     * @var string
     */
    public static $wrap = 'error';

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $oRequest
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($oRequest)
    {
        return [
            ErrorConstants::ERROR_MESSAGE => $this[ErrorConstants::ERROR_MESSAGE],
            ErrorConstants::ERROR_CODE    => $this[ErrorConstants::ERROR_CODE]
        ];
    }
}
