<?php

namespace Sequenzy\DataExports\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class TestDataExportResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?DateTime $testedAt
     */
    #[JsonProperty('testedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $testedAt;

    /**
     * @param array{
     *   success?: ?bool,
     *   testedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->testedAt = $values['testedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
