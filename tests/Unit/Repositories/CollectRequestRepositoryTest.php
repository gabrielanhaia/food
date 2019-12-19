<?php

namespace Tests\Unit\Repositories;

use App\Exceptions\Api\NotFoundException;
use App\Models\CollectRequest;
use App\Repositories\CollectRequestRepository;
use Illuminate\Support\Collection;
use Tests\TestCase;

/**
 * Class CollectRequestRepositoryTest
 *
 * Tests of the CollectRequestRepository.
 *
 * @package Tests\Unit\Repositories
 */
class CollectRequestRepositoryTest extends TestCase
{
    /**
     * Test success getting all collect requests.
     */
    public function testSuccessGetAllCollectRequest()
    {
        $collectRequestModelMock = \Mockery::mock(CollectRequest::class);

        $expectedResult = new Collection([
            new CollectRequest,
            new CollectRequest,
            new CollectRequest,
        ]);

        $collectRequestModelMock->expects('paginate')
            ->once()
            ->with()
            ->andReturn($expectedResult);

        $collectRequestRepository = new CollectRequestRepository($collectRequestModelMock);
        $result = $collectRequestRepository->getAll();

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * Test error trying to get a collect-request with a invalid id.
     * (Not found).
     */
    public function testErrorCollectRequestNotFoundGetCollectRequest()
    {
        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage('Collect request not-found.');

        $collectRequestId = 21442144;

        $collectRequestModelMock = \Mockery::mock(CollectRequest::class);

        $collectRequestModelMock->expects('find')
            ->once()
            ->with($collectRequestId)
            ->andReturnNull();

        $collectRequestRepository = new CollectRequestRepository($collectRequestModelMock);
        $collectRequestRepository->get($collectRequestId);
    }

    /**
     * Test success getting a collect request by id.
     */
    public function testSuccesGetCollectRequest()
    {
        $collectRequestId = 21442144;

        $collectRequestModelMock = \Mockery::mock(CollectRequest::class);

        $collectRequestModelMock->expects('find')
            ->once()
            ->with($collectRequestId)
            ->andReturnSelf();

        $collectRequestRepository = new CollectRequestRepository($collectRequestModelMock);
        $result = $collectRequestRepository->get($collectRequestId);

        $this->assertEquals($collectRequestModelMock, $result);
    }
}
