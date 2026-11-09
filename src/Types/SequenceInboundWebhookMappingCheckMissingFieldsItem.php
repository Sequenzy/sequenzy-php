<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceInboundWebhookMappingCheckMissingFieldsItem extends JsonSerializableType
{
    /**
     * @var string $field `email`, `firstName`, `lastName` or `properties.<name>`.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var string $path
     */
    #[JsonProperty('path')]
    public string $path;

    /**
     * @param array{
     *   field: string,
     *   path: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->field = $values['field'];
        $this->path = $values['path'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
