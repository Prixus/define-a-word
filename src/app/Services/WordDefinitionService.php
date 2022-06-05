<?php


namespace App\Services;

use App\Constants\DefinitionConstants;
use App\Exceptions\ApiRequestException;
use App\Repositories\Api\WordDefinitionRepository;

/**
 * Class WordDefinitionService
 *
 * @package App\Services
 * @author Simon Peter Calamno
 * @since 2022.06.04
 */
class WordDefinitionService
{
    /**
     * Api repository that will be used for fetching word definition
     * @var WordDefinitionRepository
     */
    private $oWordDefinitionRepository;

    /**
     * WordDefinitionService constructor.
     * @param WordDefinitionRepository $oWordDefinitionRepository
     */
    public function __construct(WordDefinitionRepository $oWordDefinitionRepository)
    {
        $this->oWordDefinitionRepository = $oWordDefinitionRepository;
    }

    /**
     * Fetches definition of a given word
     * @param string $sWordDefinition
     * @return mixed
     * @throws ApiRequestException
     */
    public function fetchWordDefinition(string $sWordDefinition)
    {
        return $this->oWordDefinitionRepository
            ->setApiEndpoint(DefinitionConstants::WORDS_API_DEFINITION_ENDPOINT)
            ->getDataByIdRequest($sWordDefinition);
    }
}
