<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class EmailClientBreakdownDevicesItem extends JsonSerializableType
{
    /**
     * @var value-of<EmailClientBreakdownDevicesItemKey> $key
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var string $label
     */
    #[JsonProperty('label')]
    public string $label;

    /**
     * @var int $opens
     */
    #[JsonProperty('opens')]
    public int $opens;

    /**
     * @var float $share Percentage of `totalOpens`, from 0 to 100. Not rounded.
     */
    #[JsonProperty('share')]
    public float $share;

    /**
     * @param array{
     *   key: value-of<EmailClientBreakdownDevicesItemKey>,
     *   label: string,
     *   opens: int,
     *   share: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->key = $values['key'];
        $this->label = $values['label'];
        $this->opens = $values['opens'];
        $this->share = $values['share'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
