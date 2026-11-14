<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * The company tracking CNAME to publish with records while in_progress. A workspace without a tracking domain gets links.<domain> when the upgrade starts; an existing one in this domain's DNS zone is listed while it is not verified, and kept (as verified) when it verified during the upgrade. Optional; it never holds up the switch, and until it is verified links use the shared tracking domains. Null otherwise.
 */
class WebsiteDnsUpgradeTrackingRecord extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var bool $required
     */
    #[JsonProperty('required')]
    public bool $required;

    /**
     * @var value-of<WebsiteDnsUpgradeTrackingRecordStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var value-of<WebsiteDnsUpgradeTrackingRecordType> $type
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
     *   required: bool,
     *   status: value-of<WebsiteDnsUpgradeTrackingRecordStatus>,
     *   type: value-of<WebsiteDnsUpgradeTrackingRecordType>,
     *   value: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
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
