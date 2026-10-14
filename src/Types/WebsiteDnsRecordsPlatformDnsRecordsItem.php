<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class WebsiteDnsRecordsPlatformDnsRecordsItem extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $diagnostic Why the record is not verified yet, when known.
     */
    #[JsonProperty('diagnostic'), ArrayType(['string' => 'mixed'])]
    public ?array $diagnostic;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<WebsiteDnsRecordsPlatformDnsRecordsItemPurpose> $purpose
     */
    #[JsonProperty('purpose')]
    public string $purpose;

    /**
     * @var bool $required
     */
    #[JsonProperty('required')]
    public bool $required;

    /**
     * @var value-of<WebsiteDnsRecordsPlatformDnsRecordsItemStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var value-of<WebsiteDnsRecordsPlatformDnsRecordsItemType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $value
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   name: string,
     *   purpose: value-of<WebsiteDnsRecordsPlatformDnsRecordsItemPurpose>,
     *   required: bool,
     *   status: value-of<WebsiteDnsRecordsPlatformDnsRecordsItemStatus>,
     *   type: value-of<WebsiteDnsRecordsPlatformDnsRecordsItemType>,
     *   value: string,
     *   diagnostic?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->diagnostic = $values['diagnostic'] ?? null;
        $this->name = $values['name'];
        $this->purpose = $values['purpose'];
        $this->required = $values['required'];
        $this->status = $values['status'];
        $this->type = $values['type'];
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
