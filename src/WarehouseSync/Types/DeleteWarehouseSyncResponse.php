<?php

namespace Sequenzy\WarehouseSync\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class DeleteWarehouseSyncResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?string $syncId
     */
    #[JsonProperty('syncId')]
    public ?string $syncId;

    /**
     * @param array{
     *   success?: ?bool,
     *   syncId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->syncId = $values['syncId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
