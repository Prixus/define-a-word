<?php

namespace App\Http\Resources;

use App\Constants\DefinitionConstants;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * Class DefinitionResource
 *
 * @package App\Http\Resources
 * @author Simon Peter Calamno
 * @since 2022.06.07
 */
class DefinitionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $oRequest
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($oRequest)
    {
        return [
            DefinitionConstants::DEFINITION_NO  => $this->{DefinitionConstants::DEFINITION_NO},
            DefinitionConstants::DEFINITION     => $this->{DefinitionConstants::DEFINITION},
            DefinitionConstants::PART_OF_SPEECH => $this->{DefinitionConstants::PART_OF_SPEECH},
            DefinitionConstants::CREATED_AT     => $this->{DefinitionConstants::CREATED_AT},
            DefinitionConstants::UPDATED_AT     => $this->{DefinitionConstants::UPDATED_AT}
        ];
    }
}
