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
    public function setModel(?Model $oModel)
    {
        $this->oModel = $oModel;
        return $this;
    }

    /**
     * Sets the primary that will be used for the model instance
     * @param string $sPrimaryKey
     * @return $this
     */
    public function setPrimaryKey(string $sPrimaryKey)
    {
        $this->sPrimaryKey = $sPrimaryKey;
        return $this;
    }

    /**
     * @param array $aInsertedData
     * @return mixed
     */
    public function createOrFindRecord(array $aInsertedData)
    {
        $oRecordModel = $this->oModel->firstOrCreate($aInsertedData);

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
    public function fetchRecordById(int $iId, $iLimit = 100, array $aWith = [])
    {
        $oFetchedModel = $this->oModel->with($aWith)
            ->where([$this->sPrimaryKey => $iId])
            ->limit($iLimit)
            ->first();

        $this->setModel(null);
        return $oFetchedModel;
    }

    /**
     * Fetches a record by the id
     * @param array $aIdentifiers
     * @param int $iLimit
     * @param array $aWith
     * @return Builder[]|Collection
     */
    public function fetchRecordByIdentifiers(array $aIdentifiers = [], $iLimit = 100, array $aWith = [])
    {
        $oFetchedModel = $this->oModel->with($aWith)
            ->where($aIdentifiers)
            ->limit($iLimit)
            ->get();

        $this->setModel(null);
        return $oFetchedModel;
    }
}
