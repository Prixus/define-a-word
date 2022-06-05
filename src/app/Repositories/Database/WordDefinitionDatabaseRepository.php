<?php


namespace App\Repositories\Database;

use App\Constants\DefinitionConstants;
use App\Constants\WordSearchConstants;
use App\Models\Definitions;
use App\Models\PrevSearches;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\TFirstDefault;
use Illuminate\Support\TValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

/**
 * Class WordDefinitionDatabaseRepository
 *
 * @package App\Repositories\Database
 * @author Simon Peter Calamno
 * @since 2022.06.05
 */
class WordDefinitionDatabaseRepository extends DatabaseBaseRepository
{
    /**
     * @var Definitions
     */
    private $oDefinitionsModel;

    /**
     * @var PrevSearches
     */
    private $oPrevSearchesModel;

    /**
     * WordDefinitionDatabaseRepository constructor.
     * @param Definitions $oDefinitionsModel
     * @param PrevSearches $oPrevSearchesModel
     */
    public function __construct(Definitions $oDefinitionsModel, PrevSearches $oPrevSearchesModel)
    {
        $this->oDefinitionsModel = $oDefinitionsModel;
        $this->oPrevSearchesModel = $oPrevSearchesModel;
    }

    /**
     * Creates a new search record
     * This will try to find if the current search already exists, it it does exist, it will just return the current one
     * If it does not exists it will create a new one
     * @param array $aInsertData
     * @return Builder|Model|object
     */
    public function createNewSearchRecord(array $aInsertData)
    {
        $oInsertedPrevSearch = $this->setModel($this->oPrevSearchesModel)
            ->createOrFindRecord(Arr::only($aInsertData, WordSearchConstants::SEARCH_WORD));
        $aDefinitionIds = [];
        foreach ($aInsertData[DefinitionConstants::DEFINITIONS] as $aDefinition) {
            $aDefinition = [
                DefinitionConstants::DEFINITION     => $aDefinition[DefinitionConstants::DEFINITION],
                DefinitionConstants::PART_OF_SPEECH => $aDefinition[DefinitionConstants::PART_OF_SPEECH_KEY]
            ];
            $oInsertedDefinition = $this->setModel($this->oDefinitionsModel)
                ->createOrFindRecord($aDefinition);
            array_push($aDefinitionIds, $oInsertedDefinition->{DefinitionConstants::PRIMARY_KEY});
        }

        $oInsertedPrevSearch->definitions()->syncWithoutDetaching($aDefinitionIds);
        return $this->fetchWordById($oInsertedPrevSearch->{WordSearchConstants::PRIMARY_KEY});
    }

    /**
     * Fetches a word by its corresponding id
     * @param int $iId
     * @return Builder|Model|object
     */
    public function fetchWordById(int $iId)
    {
        return $this->setModel($this->oPrevSearchesModel)
            ->setPrimaryKey(WordSearchConstants::PRIMARY_KEY)
            ->fetchRecordById(
                $iId,
                1,
                [WordSearchConstants::DEFINITIONS]
            );
    }

    /**
     * Fetches a word via its search word
     * @param string $sSearchWord
     * @return TFirstDefault|TValue
     */
    public function findWordDefinitionBySearchWord(string $sSearchWord)
    {
        return $this->setModel($this->oPrevSearchesModel)
            ->setPrimaryKey(WordSearchConstants::PRIMARY_KEY)
            ->fetchRecordByIdentifiers(
                [WordSearchConstants::SEARCH_WORD => $sSearchWord],
                100,
                [WordSearchConstants::DEFINITIONS]
            )->first();
    }
}
