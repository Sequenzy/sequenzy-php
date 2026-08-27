<?php

namespace Sequenzy\AbTests\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\AbTest;
use Sequenzy\Core\Json\JsonProperty;

class GetAbTestsResponse extends JsonSerializableType
{
    /**
     * @var ?AbTest $abTest
     */
    #[JsonProperty('abTest')]
    public ?AbTest $abTest;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   abTest?: ?AbTest,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->abTest = $values['abTest'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
