<?php


namespace App\Repositories;

use App\Enums\CollectStatusEnum;
use App\Exceptions\Api\ConflictException;
use App\Exceptions\Api\NotFoundException;
use App\Models\CollectRequest;
use App\Models\Product;
use App\Repositories\DTO\CollectRequestDTO;
use App\Repositories\DTO\CollectRequestProductDTO;
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
     * @param CollectRequestDTO|DTOInterface $dataToBeUpdated Data to be updated.
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
            'status' => $dataToBeUpdated->getStatus(),
            'name_responsible' => $dataToBeUpdated->getNameResponsible(),
            'collection_start_time' => $dataToBeUpdated->getCollectStartTime(),
            'collection_end_time' => $dataToBeUpdated->getCollectEndTime(),
            'description' => ''
        ]);

        $collectRequest->products()->sync([]);

        if (!empty($dataToBeUpdated->getProducts())) {
            /** @var CollectRequestProductDTO $product */
            foreach ($dataToBeUpdated->getProducts() as $product) {
                $collectRequest->products()->attach($product->getIdProduct(), [
                    'quantity' => $product->getQuantity(),
                    'unit_of_measurement' => $product->getUnitOfMeasure(),
                    'note' => $product->getNote(),
                ]);
            }
        }

        return $collectRequest;
    }

    /**
     * Register a collect request.
     *
     * @param DTOInterface|CollectRequestDTO $dataToBeCreated
     * @return Model
     * @throws ConflictException
     */
    public function create(DTOInterface $dataToBeCreated): Model
    {
        $alreadyExistsARequestSameDate = $this->model
            ->whereDate('collection_start_time', '=', $dataToBeCreated->getCollectStartTime())
            ->whereDate('collection_end_time', '=', $dataToBeCreated->getCollectEndTime())
            ->where('status', '=', $dataToBeCreated->getStatus())
            ->first();

        if (!empty($alreadyExistsARequestSameDate)) {
            throw new ConflictException('Collect request already exists.');
        }

        $collectRequest = $this->model::create([
            'status' => $dataToBeCreated->getStatus(),
            'name_responsible' => $dataToBeCreated->getNameResponsible(),
            'collection_start_time' => $dataToBeCreated->getCollectStartTime(),
            'collection_end_time' => $dataToBeCreated->getCollectEndTime(),
            'description' => ''
        ]);

        if (!empty($dataToBeCreated->getProducts())) {
            /** @var CollectRequestProductDTO $product */
            foreach ($dataToBeCreated->getProducts() as $product) {
                $collectRequest->products()->attach($product->getIdProduct(), [
                    'quantity' => $product->getQuantity(),
                    'unit_of_measurement' => $product->getUnitOfMeasure(),
                    'note' => $product->getNote(),
                ]);
            }
        }

        return $collectRequest;
    }

    /**
     * List products from a collect request.
     *
     * @param int $collectRequestId
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @throws NotFoundException
     */
    public function listProductsCollectRequest(int $collectRequestId)
    {
        $collectRequest = $this->get($collectRequestId);

        $products = $collectRequest->products()->paginate();

        return $products;
    }

    /**
     * Get a product from a collect request.
     *
     * @param int $collectRequestId Collect request id to be updated.
     * @param int $productId Product identifier to be searched.
     * @return Product
     * @throws NotFoundException
     */
    public function getProductCollectRequest(int $collectRequestId, int $productId): Product
    {
        $collectRequest = $this->get($collectRequestId);

        $product = $collectRequest->products()
            ->where('collect_request_product.id_product', '=', $productId)
            ->first();

        if (empty($product)) {
            throw new NotFoundException('Product not found.');
        }

        return $product;
    }
}
