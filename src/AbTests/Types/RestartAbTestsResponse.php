<?php

namespace Sequenzy\AbTests\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\AbTest;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class RestartAbTestsResponse extends JsonSerializableType
{
    /**
     * @var ?AbTest $abTest
     */
    #[JsonProperty('abTest')]
    public ?AbTest $abTest;

    /**
     * @var ?array<string, mixed> $nodeConfig
     */
    #[JsonProperty('nodeConfig'), ArrayType(['string' => 'mixed'])]
    public ?array $nodeConfig;

    /**
     * @var ?string $previousAbTestId
     */
    #[JsonProperty('previousAbTestId')]
    public ?string $previousAbTestId;

    /**
     * @var ?string $sourceVariantId
     */
    #[JsonProperty('sourceVariantId')]
    public ?string $sourceVariantId;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   abTest?: ?AbTest,
     *   nodeConfig?: ?array<string, mixed>,
     *   previousAbTestId?: ?string,
     *   sourceVariantId?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->abTest = $values['abTest'] ?? null;
        $this->nodeConfig = $values['nodeConfig'] ?? null;
        $this->previousAbTestId = $values['previousAbTestId'] ?? null;
        $this->sourceVariantId = $values['sourceVariantId'] ?? null;
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
