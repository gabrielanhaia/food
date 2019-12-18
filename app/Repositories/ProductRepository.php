<?php


namespace App\Repositories;

use App\Models\Product;


/**
 * Class ProductRepository
 * @package App\Repositories
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class ProductRepository extends BaseRepository
{
    /**
     * ProductRepository constructor.
     *
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    /**
     * Return all data from a entity.
     * @return mixed
     */
    public function getAll()
    {
        $products = $this->model->paginate();

        return $products;
    }

    /**
     * Get one specific data from a entity.
     *
     * @param int $identifier Identifier of the entity.
     * @return Product
     */
    public function get(int $identifier): \Illuminate\Database\Eloquent\Model
    {
        // TODO: Implement get() method.
    }

    /**
     * Delete on entity.
     *
     * @param int $identifier Identifier of the entity.
     * @return mixed
     */
    public function delete(int $identifier)
    {
        // TODO: Implement delete() method.
    }

    /**
     * Update one specific entity.
     *
     * @param int $identifier Identifier of the entity.
     * @param \App\Repositories\DTO\DTOInterface $dataToBeUpdated Data to be updated.
     * @return Product
     */
    public function update(int $identifier, \App\Repositories\DTO\DTOInterface $dataToBeUpdated): \Illuminate\Database\Eloquent\Model
    {
        // TODO: Implement update() method.
    }
}
