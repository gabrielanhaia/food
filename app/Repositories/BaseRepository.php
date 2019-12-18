<?php


namespace App\Repositories;

use App\Repositories\DTO\DTOInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 *
 * @package App\Repositories
 *
 * @author Gabriel Anhaia <gabriel@stargrid.pro>
 */
abstract class BaseRepository
{
    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Return all data from a entity.
     * @return mixed
     */
    public abstract function getAll();

    /**
     * Get one specific data from a entity.
     *
     * @param int $identifier Identifier of the entity.
     * @return Model
     */
    public abstract function get(int $identifier): Model;

    /**
     * Delete on entity.
     *
     * @param int $identifier Identifier of the entity.
     * @return mixed
     */
    public abstract function delete(int $identifier);

    /**
     * Update one specific entity.
     *
     * @param int $identifier Identifier of the entity.
     * @param DTOInterface $dataToBeUpdated Data to be updated.
     * @return Model
     */
    public abstract function update(int $identifier, DTOInterface $dataToBeUpdated): Model;
}
