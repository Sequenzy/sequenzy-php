<?php

namespace Sequenzy\Push\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class AddPushImportRowsResponse extends JsonSerializableType
{
    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?int $rowsAdded
     */
    #[JsonProperty('rowsAdded')]
    public ?int $rowsAdded;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?int $totalRows
     */
    #[JsonProperty('totalRows')]
    public ?int $totalRows;

    /**
     * @param array{
     *   message?: ?string,
     *   rowsAdded?: ?int,
     *   success?: ?bool,
     *   totalRows?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->message = $values['message'] ?? null;
        $this->rowsAdded = $values['rowsAdded'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->totalRows = $values['totalRows'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
