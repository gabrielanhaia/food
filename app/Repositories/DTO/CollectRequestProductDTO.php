<?php


namespace App\Repositories\DTO;

/**
 * Class CollectRequestProductDTO
 * @package App\Repositories\DTO
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class CollectRequestProductDTO implements DTOInterface
{
    /** @var integer $idProduct Product identifier. */
    protected $idProduct;

    /** @var string $quantity Quantity of products to be collected. */
    protected $quantity;

    /** @var string $unitOfMeasure Unit of measure used in this product. */
    protected $unitOfMeasure;

    /** @var string $note Extra data about the product. */
    protected $note;

    /**
     * CollectRequestProductDTO constructor.
     * @param int $idProduct
     * @param string $quantity
     * @param string $unitOfMeasure
     * @param string $note
     */
    public function __construct(
        int $idProduct,
        string $quantity,
        string $unitOfMeasure,
        string $note = ''
    )
    {
        $this->idProduct = $idProduct;
        $this->quantity = $quantity;
        $this->unitOfMeasure = $unitOfMeasure;
        $this->note = $note;
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
     * @return CollectRequestProductDTO
     */
    public function setIdProduct(int $idProduct): CollectRequestProductDTO
    {
        $this->idProduct = $idProduct;
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
     * @return CollectRequestProductDTO
     */
    public function setQuantity(string $quantity): CollectRequestProductDTO
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnitOfMeasure(): string
    {
        return $this->unitOfMeasure;
    }

    /**
     * @param string $unitOfMeasure
     * @return CollectRequestProductDTO
     */
    public function setUnitOfMeasure(string $unitOfMeasure): CollectRequestProductDTO
    {
        $this->unitOfMeasure = $unitOfMeasure;
        return $this;
    }

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * @param string $note
     * @return CollectRequestProductDTO
     */
    public function setNote(string $note): CollectRequestProductDTO
    {
        $this->note = $note;
        return $this;
    }
}
