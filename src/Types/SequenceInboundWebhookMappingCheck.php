<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceInboundWebhookMappingCheck extends JsonSerializableType
{
    /**
     * @var array<SequenceInboundWebhookMappingCheckMissingFieldsItem> $missingFields Mapped fields whose path does not exist in the saved sample.
     */
    #[JsonProperty('missingFields'), ArrayType([SequenceInboundWebhookMappingCheckMissingFieldsItem::class])]
    public array $missingFields;

    /**
     * @var value-of<SequenceInboundWebhookMappingCheckStatus> $status `ok`: the email path holds a valid address. `email_not_found`: it is missing or not a valid address. `no_sample`: no payload has been received or saved yet.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @param array{
     *   missingFields: array<SequenceInboundWebhookMappingCheckMissingFieldsItem>,
     *   status: value-of<SequenceInboundWebhookMappingCheckStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->missingFields = $values['missingFields'];
        $this->status = $values['status'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
