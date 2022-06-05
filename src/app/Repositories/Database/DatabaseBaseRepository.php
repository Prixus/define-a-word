<?php


namespace App\Repositories\Database;

use Illuminate\Database\Eloquent\Model;

abstract class DatabaseBaseRepository
{
    /**
     * Primary Model Instance
     * @var Model
     */
    protected $oModel;

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
}
