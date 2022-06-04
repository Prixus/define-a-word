<?php


namespace App\Http\Controllers;

use App\Constants\WordDefinitionConstants;
use App\Exceptions\ApiRequestException;
use App\Http\Requests\FetchWordDefinitionRequest;
use App\Services\WordDefinitionService;

/**
 * Class WordDefinitionController
 *
 * @package App\Http\Controllers
 * @author Simon Peter Calamno
 * @since 2022.06.04
 */
class WordDefinitionController extends Controller
{
    /**
     * @var WordDefinitionService
     */
    private $oWordDefinitionService;

    /**
     * WordDefinitionController constructor.
     * @param WordDefinitionService $oWordDefinitionService
     */
    public function __construct(WordDefinitionService $oWordDefinitionService)
    {
        $this->oWordDefinitionService = $oWordDefinitionService;
    }

    /**
     * Fetches the definition of a word
     * @param FetchWordDefinitionRequest $oFetchWordDefinitionRequest
     * @return mixed
     * @throws ApiRequestException
     */
    public function fetchWordDefinition(FetchWordDefinitionRequest $oFetchWordDefinitionRequest)
    {
        $aValidatedData = $oFetchWordDefinitionRequest->validated();
        return $this->oWordDefinitionService->fetchWordDefinition($aValidatedData[WordDefinitionConstants::WORD]);
    }
}
