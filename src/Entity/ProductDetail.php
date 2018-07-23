<?php
declare(strict_types = 1);

namespace App\Entity;

use App\Entity\Interfaces\ProductDetailInterface;
use App\Entity\Interfaces\ProductInterface;
use Ramsey\Uuid\Uuid;

/**
 * final Class ProductDetail
 */
final class ProductDetail implements ProductDetailInterface
{
    /**
     * @var \Ramsey\Uuid\UuidInterface
     */
    private $uid;
    /**
     * @var string
     */
    private $brand;
    /**
     * @var string
     */
    private $color;
    /**
     * @var string
     */
    private $os;
    /**
     * @var int
     */
    private $memory;
    /**
     * @var float
     */
    private $weight;
    /**
     * @var float
     */
    private $screenSize;
    /**
     * @var float
     */
    private $height;
    /**
     * @var float
     */
    private $width;
    /**
     * @var float
     */
    private $thickness;
    /**
     * @var Product
     */
    private $product;

    /**
     * ProductDetail constructor.
     * @param string $brand
     * @param string $color
     * @param string $os
     * @param int $memory
     * @param float $weight
     * @param float $screenSize
     * @param float $height
     * @param float $width
     * @param float $thickness
     * @param ProductInterface $product
     */
    public function __construct(
        string $brand,
        string $color,
        string $os,
        int $memory,
        float $weight,
        float $screenSize,
        float $height,
        float $width,
        float $thickness,
        ProductInterface $product
    ) {
        $this->uid = Uuid::uuid4();
        $this->brand = $brand;
        $this->color = $color;
        $this->os = $os;
        $this->memory = $memory;
        $this->weight = $weight;
        $this->screenSize = $screenSize;
        $this->height = $height;
        $this->width = $width;
        $this->thickness = $thickness;
        $this->product = $product;
    }

    /**
     * {@inheritdoc}
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * {@inheritdoc}
     */
    public function getBrand(): ?string
    {
        return $this->brand;
    }

    /**
     * {@inheritdoc}
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * {@inheritdoc}
     */
    public function getOs(): ?string
    {
        return $this->os;
    }

    /**
     * {@inheritdoc}
     */
    public function getMemory(): ?int
    {
        return $this->memory;
    }

    /**
     * {@inheritdoc}
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * {@inheritdoc}
     */
    public function getScreenSize()
    {
        return $this->screenSize;
    }

    /**
     * {@inheritdoc}
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * {@inheritdoc}
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * {@inheritdoc}
     */
    public function getThickness()
    {
        return $this->thickness;
    }

    /**
     * {@inheritdoc}
     */
    public function getProduct()
    {
        return $this->product;
    }
}
