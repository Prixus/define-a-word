<?php


namespace App\Services;

use App\Constants\DefinitionConstants;
use App\Constants\WordSearchConstants;
use App\Exceptions\ApiRequestException;
use App\Repositories\Api\WordDefinitionApiRepository;
use App\Repositories\Database\WordDefinitionDatabaseRepository;

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
     * @var WordDefinitionApiRepository
     */
    private $oWordApiDefinitionRepository;

    /**
     * Database Repository that for the word definition records
     * @var WordDefinitionDatabaseRepository
     */
    private $oWordDefinitionDatabaseRepository;

    /**
     * WordDefinitionService constructor.
     * @param WordDefinitionApiRepository $oWordDefinitionRepository
     * @param WordDefinitionDatabaseRepository $oWordDefinitionDatabaseRepository
     */
    public function __construct(
        WordDefinitionApiRepository $oWordDefinitionRepository,
        WordDefinitionDatabaseRepository $oWordDefinitionDatabaseRepository
    ) {
        $this->oWordApiDefinitionRepository = $oWordDefinitionRepository;
        $this->oWordDefinitionDatabaseRepository = $oWordDefinitionDatabaseRepository;
    }

    /**
     * Fetches definition of a given word
     * @param string $sWordDefinition
     * @return mixed
     * @throws ApiRequestException
     */
    public function fetchWordDefinition(string $sWordDefinition)
    {
        $oDatabaseDefinition = $this->oWordDefinitionDatabaseRepository->findWordDefinitionBySearchWord($sWordDefinition);
        if ($oDatabaseDefinition !== null) {
            return $oDatabaseDefinition;
        }

        $aWordDefinitions = $this->oWordApiDefinitionRepository
            ->setApiEndpoint(DefinitionConstants::WORDS_API_DEFINITION_ENDPOINT)
            ->getDataByIdRequest($sWordDefinition);
        $aWordDefinitions[WordSearchConstants::SEARCH_WORD] = $sWordDefinition;
        if (count($aWordDefinitions[DefinitionConstants::DEFINITIONS]) === 0) {
            return $aWordDefinitions;
        }

        return $this->oWordDefinitionDatabaseRepository->createNewSearchRecord($aWordDefinitions);
    }
}
