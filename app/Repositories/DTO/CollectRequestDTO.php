<?php


namespace App\Repositories\DTO;

use Carbon\Carbon;

/**
 * Class CollectRequestDTO
 * @package App\Repositories\DTO
 */
class CollectRequestDTO implements DTOInterface
{
    /** @var int $idProduct Product indetifier. */
    protected $idProduct;

    /** @var string $status Status collection */
    protected $status;

    /** @var string $nameResponsible Responsible for the collect. */
    protected $nameResponsible;

    /** @var Carbon $collectStartTime Date time available for the collect start. */
    protected $collectStartTime;

    /** @var Carbon $collectEndTime Date time available for the collect end. */
    protected $collectEndTime;

    /** @var string $quantity Quantity of products. */
    protected $quantity;

    /** @var string $unitOfMeasurement */
    protected $unitOfMeasurement;

    /**
     * CollectRequestDTO constructor.
     * @param int $idProduct
     * @param string $status
     * @param string $nameResponsible
     * @param Carbon $collectStartTime
     * @param Carbon $collectEndTime
     * @param string $quantity
     * @param string $unitOfMeasurement
     */
    public function __construct(
        string $status,
        string $nameResponsible,
        Carbon $collectStartTime,
        Carbon $collectEndTime,
        string $quantity,
        string $unitOfMeasurement
    )
    {
        $this->status = $status;
        $this->nameResponsible = $nameResponsible;
        $this->collectStartTime = $collectStartTime;
        $this->collectEndTime = $collectEndTime;
        $this->quantity = $quantity;
        $this->unitOfMeasurement = $unitOfMeasurement;
    }

    /**
     * @return int
     */
    public function getIdProduct(): int
    {
        return $this->idProduct;
    }

    /**
     * @param int $idProduct
     * @return CollectRequestDTO
     */
    public function setIdProduct(int $idProduct): CollectRequestDTO
    {
        $this->idProduct = $idProduct;
        return $this;
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
     * @return string
     */
    public function getQuantity(): string
    {
        return $this->quantity;
    }

    /**
     * @param string $quantity
     * @return CollectRequestDTO
     */
    public function setQuantity(string $quantity): CollectRequestDTO
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnitOfMeasurement(): string
    {
        return $this->unitOfMeasurement;
    }

    /**
     * @param string $unitOfMeasurement
     * @return CollectRequestDTO
     */
    public function setUnitOfMeasurement(string $unitOfMeasurement): CollectRequestDTO
    {
        $this->unitOfMeasurement = $unitOfMeasurement;
        return $this;
    }
}
