<?php


namespace App\Repositories\Database;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DatabaseBaseRepository
 *
 * @package App\Repositories\Database
 * @author Simon Peter Calamno
 * @since 2022.06.05
 */
abstract class DatabaseBaseRepository
{
    /**
     * Primary Model Instance
     * @var Model
     */
    protected $oModel;

    /**
     * Primary key of the model instance
     * @var string
     */
    protected $sPrimaryKey = 'id';

    /**
     * Sets the Primary Model Instance
     * @param Model|null $oModel
     * @return $this
     */
    protected function setModel(?Model $oModel)
    {
        $this->oModel = $oModel;
        return $this;
    }

    /**
     * Sets the primary that will be used for the model instance
     * @param string $sPrimaryKey
     * @return $this
     */
    protected function setPrimaryKey(string $sPrimaryKey)
    {
        $this->sPrimaryKey = $sPrimaryKey;
        return $this;
    }

    /**
     * Finds a record or create a new one and return it if it does not exists
     * @param array $aInsertedData
     * @return mixed
     */
    protected function createOrFindRecord(array $aInsertedData)
    {
        $oRecordModel = $this->oModel->firstOrCreate($aInsertedData);

        # Resets the model to null
        $this->setModel(null);
        return $oRecordModel;
    }

    /**
     * Creates a record
     * @param array $aInsertedData
     * @return mixed
     */
    protected function createRecord(array $aInsertedData)
    {
        $oRecordModel = $this->oModel->create($aInsertedData);

        # Resets the model to null
        $this->setModel(null);
        return $oRecordModel;
    }

    /**
     * Fetches a record by the id
     * @param int $iId
     * @param int $iLimit
     * @param array $aWith
     * @return Builder|Model|object
     */
    protected function fetchRecordById(int $iId, $iLimit = 100, array $aWith = [])
    {
        $oFetchedModel = $this->oModel->with($aWith)
            ->where([$this->sPrimaryKey => $iId])
            ->limit($iLimit)
            ->first();

        $this->setModel(null);
        return $oFetchedModel;
    }

    /**
     * Fetches records from the database
     * @param array $aIdentifiers
     * @param int $iLimit
     * @param array $aWith
     * @return Builder[]|Collection
     */
    protected function fetchData(array $aIdentifiers = [], $iLimit = 100, array $aWith = [])
    {
        $oFetchedModel = $this->oModel->with($aWith)
            ->where($aIdentifiers)
            ->limit($iLimit)
            ->get();

        $this->setModel(null);
        return $oFetchedModel;
    }
}
