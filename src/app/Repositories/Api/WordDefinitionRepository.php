<?php


namespace App\Repositories\Api;

use App\Constants\DefinitionConstants;
use App\Exceptions\ApiRequestException;
use Illuminate\Support\Arr;

/**
 * Class WordDefinitionRepository
 *
 * @package App\Repositories\Api
 * @author Simon Peter Calamno
 * @since 2022.04.06
 */
class WordDefinitionRepository extends ApiBaseRepository
{
    /**
     * WordDefinitionRepository constructor.
     */
    public function __construct()
    {
        $this->setBaseDomain(DefinitionConstants::WORDS_API_DOMAIN)
            ->setHttpsProtocol(true)
            ->setRequestHeaders(DefinitionConstants::RAPID_API_AUTH_HEADERS);
    }

    /**
     * Fetches data from the api based on the given value
     * @param string $sId
     * @param string $sIdentifier
     * @param array $aRequestParameters
     * @return mixed
     * @throws ApiRequestException
     */
    public function getDataByIdRequest(
        string $sId,
        string $sIdentifier = '$id',
        array $aRequestParameters = []
    ) {
      $aWordsDefinition = parent::getDataByIdRequest($sId, $sIdentifier, $aRequestParameters);
      return Arr::get($aWordsDefinition, DefinitionConstants::DEFINITIONS, []);
    }
}
