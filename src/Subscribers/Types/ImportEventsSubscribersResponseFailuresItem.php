<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ImportEventsSubscribersResponseFailuresItem extends JsonSerializableType
{
    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?int $index
     */
    #[JsonProperty('index')]
    public ?int $index;

    /**
     * @param array{
     *   error?: ?string,
     *   index?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->error = $values['error'] ?? null;
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
