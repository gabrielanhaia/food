<?php


namespace App\Repositories;

use App\Exceptions\Api\ConflictException;
use App\Exceptions\Api\NotFoundException;
use App\Models\CollectRequest;
use App\Models\Product;
use App\Repositories\DTO\CollectRequestDTO;
use App\Repositories\DTO\DTOInterface;
use Illuminate\Database\Eloquent\Model;


/**
 * Class CollectionRequestRepository
 * @package App\Repositories
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class CollectRequestRepository extends BaseRepository
{
    /**
     * ProductRepository constructor.
     *
     * @param CollectRequest $model
     */
    public function __construct(CollectRequest $model)
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
     * @return CollectRequest
     */
    public function get(int $identifier): Model
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
     * @param DTOInterface $dataToBeUpdated Data to be updated.
     * @return CollectRequest
     */
    public function update(int $identifier, DTOInterface $dataToBeUpdated): Model
    {
        // TODO: Implement update() method.
    }

    /**
     * Register a collect request.
     *
     * @param CollectRequestDTO $dataToBeUpdated
     * @return Model
     * @throws ConflictException
     */
    public function create(DTOInterface $dataToBeUpdated): Model
    {
        $alreadyExistsARequestSameDate = $this->model
            ->whereDate('collection_start_time', '=', $dataToBeUpdated->getCollectStartTime())
            ->whereDate('collection_end_time', '=', $dataToBeUpdated->getCollectEndTime())
            ->where('status', '=', $dataToBeUpdated->getStatus())
            ->first();

        if (!empty($alreadyExistsARequestSameDate)) {
            throw new ConflictException('Collect request already exists.');
        }

        $collectRequest = $this->model::create([
            'id_product' => $dataToBeUpdated->getIdProduct(),
            'status' => $dataToBeUpdated->getStatus(),
            'quantity' => $dataToBeUpdated->getQuantity(),
            'unit_of_measurement' => $dataToBeUpdated->getUnitOfMeasurement(),
            'name_responsible' => $dataToBeUpdated->getNameResponsible(),
            'collection_start_time' => $dataToBeUpdated->getCollectStartTime(),
            'collection_end_time' => $dataToBeUpdated->getCollectEndTime(),
            'description' => ''
        ]);

        return $collectRequest;
    }
}
