<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class WebsiteDnsUpgradeReplacedRecordsItem extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var bool $removed True once the record is gone from public DNS.
     */
    #[JsonProperty('removed')]
    public bool $removed;

    /**
     * @var value-of<WebsiteDnsUpgradeReplacedRecordsItemType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   name: string,
     *   removed: bool,
     *   type: value-of<WebsiteDnsUpgradeReplacedRecordsItemType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->removed = $values['removed'];
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
