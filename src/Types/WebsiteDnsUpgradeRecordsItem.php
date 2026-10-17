<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class WebsiteDnsUpgradeRecordsItem extends JsonSerializableType
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
     * @var value-of<WebsiteDnsUpgradeRecordsItemPurpose> $purpose dkim is the DKIM selector the domain switches to; dkim_spare lets Sequenzy change the key later without a DNS change; return_path and ses_return_path are the two return paths (rp and rp2 by default).
     */
    #[JsonProperty('purpose')]
    public string $purpose;

    /**
     * @var bool $required True for dkim and return_path.
     */
    #[JsonProperty('required')]
    public bool $required;

    /**
     * @var value-of<WebsiteDnsUpgradeRecordsItemStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var value-of<WebsiteDnsUpgradeRecordsItemType> $type
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
     *   purpose: value-of<WebsiteDnsUpgradeRecordsItemPurpose>,
     *   required: bool,
     *   status: value-of<WebsiteDnsUpgradeRecordsItemStatus>,
     *   type: value-of<WebsiteDnsUpgradeRecordsItemType>,
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
