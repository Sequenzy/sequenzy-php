<?php

namespace Sequenzy\Geofences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ImportGeofencesResponse extends JsonSerializableType
{
    /**
     * @var ?int $created
     */
    #[JsonProperty('created')]
    public ?int $created;

    /**
     * @var ?array<ImportGeofencesResponseErrorsItem> $errors
     */
    #[JsonProperty('errors'), ArrayType([ImportGeofencesResponseErrorsItem::class])]
    public ?array $errors;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?int $updated
     */
    #[JsonProperty('updated')]
    public ?int $updated;

    /**
     * @param array{
     *   created?: ?int,
     *   errors?: ?array<ImportGeofencesResponseErrorsItem>,
     *   success?: ?bool,
     *   updated?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->created = $values['created'] ?? null;
        $this->errors = $values['errors'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->updated = $values['updated'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
