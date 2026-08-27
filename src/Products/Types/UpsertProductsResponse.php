<?php

namespace Sequenzy\Products\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\CommerceProduct;
use Sequenzy\Core\Types\ArrayType;

class UpsertProductsResponse extends JsonSerializableType
{
    /**
     * @var ?int $backInStockEventsTriggered Number of back-in-stock notifications triggered by stock transitions in this upsert
     */
    #[JsonProperty('backInStockEventsTriggered')]
    public ?int $backInStockEventsTriggered;

    /**
     * @var ?array<CommerceProduct> $products
     */
    #[JsonProperty('products'), ArrayType([CommerceProduct::class])]
    public ?array $products;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?int $upserted
     */
    #[JsonProperty('upserted')]
    public ?int $upserted;

    /**
     * @param array{
     *   backInStockEventsTriggered?: ?int,
     *   products?: ?array<CommerceProduct>,
     *   success?: ?bool,
     *   upserted?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->backInStockEventsTriggered = $values['backInStockEventsTriggered'] ?? null;
        $this->products = $values['products'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->upserted = $values['upserted'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
