<?php


namespace App\Repositories\Database;

use App\Models\Definitions;
use App\Models\PrevSearches;

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

    public function createNewSearchRecord(array $aInsertData)
    {
        $oInsertedPrevSearch = $this->setModel($this->oPrevSearchesModel)->createOrFindRecord($aInsertData);
        $oInsertedDefinition = $this->setModel($this->oDefinitionsModel)->createOrFindRecord($aInsertData);

        $oInsertedPrevSearch->definitions()->syncWithoutDetaching(
            # Insert ID's here
        );
    }
}
