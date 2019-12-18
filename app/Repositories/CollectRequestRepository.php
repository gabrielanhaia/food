<?php


namespace App\Repositories;

use App\Enums\CollectStatusEnum;
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
     * Return all collect requests.
     * @return mixed
     */
    public function getAll()
    {
        $products = $this->model->paginate();

        return $products;
    }

    /**
     * Get one specific data from a collect request.
     *
     * @param int $identifier Identifier of the entity.
     * @return CollectRequest
     * @throws NotFoundException
     */
    public function get(int $identifier): Model
    {
        $collectRequest = $this->model->find($identifier);

        if (empty($collectRequest)) {
            throw new NotFoundException('Collect request not-found.');
        }

        return $collectRequest;
    }

    /**
     * Delete a collect request (pending).
     *
     * @param int $identifier Identifier of the entity.
     * @return mixed
     * @throws NotFoundException
     */
    public function delete(int $identifier)
    {
        $collectRequest = $this->model
            ->where('id', '=', $identifier)
            ->where('status', '=', CollectStatusEnum::PENDING)
            ->first();

        if (empty($collectRequest)) {
            throw new NotFoundException('Collect request not-found or already processed.');
        }

        $collectRequest->delete();
    }

    /**
     * Update one specific entity.
     *
     * @param int $identifier Identifier of the entity.
     * @param DTOInterface $dataToBeUpdated Data to be updated.
     * @return CollectRequest
     * @throws NotFoundException
     */
    public function update(int $identifier, DTOInterface $dataToBeUpdated): Model
    {
        $collectRequest = $this->model
            ->where('id', '=', $identifier)
            ->where('status', '=', CollectStatusEnum::PENDING)
            ->first();

        if (empty($collectRequest)) {
            throw new NotFoundException('Collect request not-found or already processed.');
        }

        $collectRequest->update([
            'id_product' => $dataToBeUpdated->getIdProduct(),
            'quantity' => $dataToBeUpdated->getQuantity(),
            'unit_of_measurement' => $dataToBeUpdated->getUnitOfMeasurement(),
            'name_responsible' => $dataToBeUpdated->getNameResponsible(),
            'collection_start_time' => $dataToBeUpdated->getCollectStartTime(),
            'collection_end_time' => $dataToBeUpdated->getCollectEndTime(),
            'description' => ''
        ]);

        return $collectRequest;
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
