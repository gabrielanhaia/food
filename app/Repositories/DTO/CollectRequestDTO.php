<?php


namespace App\Repositories\DTO;

use Carbon\Carbon;

/**
 * Class CollectRequestDTO
 * @package App\Repositories\DTO
 */
class CollectRequestDTO implements DTOInterface
{
    /** @var string $status Status collection */
    protected $status;

    /** @var string $nameResponsible Responsible for the collect. */
    protected $nameResponsible;

    /** @var Carbon $collectStartTime Date time available for the collect start. */
    protected $collectStartTime;

    /** @var Carbon $collectEndTime Date time available for the collect end. */
    protected $collectEndTime;

    /** @var CollectRequestProductDTO[]|array $products List of products. */
    protected $products;

    /**
     * CollectRequestDTO constructor.
     *
     * @param string $status
     * @param string $nameResponsible
     * @param Carbon $collectStartTime
     * @param Carbon $collectEndTime
     * @param CollectRequestProductDTO[] $products[] List of products on the request.
     */
    public function __construct(
        string $status,
        string $nameResponsible,
        Carbon $collectStartTime,
        Carbon $collectEndTime,
        array $products = []
    )
    {
        $this->status = $status;
        $this->nameResponsible = $nameResponsible;
        $this->collectStartTime = $collectStartTime;
        $this->collectEndTime = $collectEndTime;
        $this->products = $products;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return CollectRequestDTO
     */
    public function setStatus(string $status): CollectRequestDTO
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameResponsible(): string
    {
        return $this->nameResponsible;
    }

    /**
     * @param string $nameResponsible
     * @return CollectRequestDTO
     */
    public function setNameResponsible(string $nameResponsible): CollectRequestDTO
    {
        $this->nameResponsible = $nameResponsible;
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getCollectStartTime(): Carbon
    {
        return $this->collectStartTime;
    }

    /**
     * @param Carbon $collectStartTime
     * @return CollectRequestDTO
     */
    public function setCollectStartTime(Carbon $collectStartTime): CollectRequestDTO
    {
        $this->collectStartTime = $collectStartTime;
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getCollectEndTime(): Carbon
    {
        return $this->collectEndTime;
    }

    /**
     * @param Carbon $collectEndTime
     * @return CollectRequestDTO
     */
    public function setCollectEndTime(Carbon $collectEndTime): CollectRequestDTO
    {
        $this->collectEndTime = $collectEndTime;
        return $this;
    }

    /**
     * @return CollectRequestProductDTO[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param CollectRequestProductDTO[] $products
     * @return CollectRequestDTO[]
     */
    public function setProducts(array $products): array
    {
        $this->products = $products;
        return $this;
    }
}
