<?php

namespace App\Http\Resources;

use App\Constants\WordSearchConstants;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use JsonSerializable;

/**
 * Class WordResource
 *
 * @package App\Http\Resources
 * @author Simon Peter Calamno
 * @since 2022.06.07
 */
class WordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $oRequest
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($oRequest)
    {
        if (isset($this->{WordSearchConstants::PREV_SEARCH_NO}) === false) {
            return [
                WordSearchConstants::MESSAGE     => 'No results found',
                WordSearchConstants::SEARCH_WORD => '',
                WordSearchConstants::DEFINITIONS => []
            ];
        }

        return [
            WordSearchConstants::PREV_SEARCH_NO => $this->{WordSearchConstants::PREV_SEARCH_NO},
            WordSearchConstants::SEARCH_WORD    => Str::ucfirst($this->{WordSearchConstants::SEARCH_WORD}),
            WordSearchConstants::DEFINITIONS    => DefinitionResource::collection($this->{WordSearchConstants::DEFINITIONS}),
            WordSearchConstants::CREATED_AT     => Carbon::createFromFormat(
                WordSearchConstants::DATE_TIME_FORMAT,
                $this->{WordSearchConstants::CREATED_AT}
                )->toDateTimeString(),
            WordSearchConstants::UPDATED_AT     => Carbon::createFromFormat(
                WordSearchConstants::DATE_TIME_FORMAT,
                $this->{WordSearchConstants::UPDATED_AT}
            )->toDateTimeString(),
        ];
    }
}
