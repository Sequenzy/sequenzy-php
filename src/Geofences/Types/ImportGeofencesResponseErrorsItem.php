<?php

namespace Sequenzy\Geofences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ImportGeofencesResponseErrorsItem extends JsonSerializableType
{
    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $externalId
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var ?int $index
     */
    #[JsonProperty('index')]
    public ?int $index;

    /**
     * @param array{
     *   error?: ?string,
     *   externalId?: ?string,
     *   index?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->error = $values['error'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->index = $values['index'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
