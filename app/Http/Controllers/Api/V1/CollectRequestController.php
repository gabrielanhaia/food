<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\CollectStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\CreateCollectRequest;
use App\Models\CollectRequest;
use App\Repositories\{CollectRequestRepository, DTO\CollectRequestDTO};
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class CollectRequestController
 * @package App\Http\Controllers\Api\V1
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class CollectRequestController extends Controller
{

    /** @var CollectRequestRepository $CollectRequestRepository Repository of collect requests. */
    protected $collectRequestRepository;

    /**
     * ProductController constructor.
     *
     * @param CollectRequest $collectRequestModel
     */
    public function __construct(CollectRequest $collectRequestModel)
    {
        $this->collectRequestRepository = new CollectRequestRepository($collectRequestModel);
    }

    /**
     * Method responsible for creating a collect request.
     *
     * @param CreateCollectRequest $request
     * @return \App\Http\Resources\Api\V1\CollectRequest
     * @throws \App\Exceptions\Api\ConflictException
     */
    public function createCollectRequest(CreateCollectRequest $request)
    {
        $collectRequestDTO = new CollectRequestDTO(
            $request->post('id_product'),
            CollectStatusEnum::PENDING,
            $request->post('name_responsible'),
            Carbon::createFromFormat('Y-m-d H:i:s', $request->post('collection_start_time')),
            Carbon::createFromFormat('Y-m-d H:i:s', $request->post('collection_end_time')),
            $request->post('quantity'),
            $request->post('unit_of_measurement')
        );

        $collectCreated = $this->collectRequestRepository->create($collectRequestDTO);

        return new \App\Http\Resources\Api\V1\CollectRequest($collectCreated);
    }

    /**
     * Method responsible for listing all collection requests.
     */
    public function listAllCollectRequests()
    {
        $products = $this->collectRequestRepository->getAll();

//        return new ProductCollection($products);
    }
}
