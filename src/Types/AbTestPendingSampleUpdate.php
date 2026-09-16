<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * Durable campaign sample request, null when absent or applied. Retry the same testPercentage after an interrupted request; error enables explicit discard.
 */
class AbTestPendingSampleUpdate extends JsonSerializableType
{
    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?DateTime $requestedAt
     */
    #[JsonProperty('requestedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $requestedAt;

    /**
     * @var ?DateTime $startedAt Optional publication claim timestamp.
     */
    #[JsonProperty('startedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startedAt;

    /**
     * @var ?int $testPercentage
     */
    #[JsonProperty('testPercentage')]
    public ?int $testPercentage;

    /**
     * @param array{
     *   error?: ?string,
     *   id?: ?string,
     *   requestedAt?: ?DateTime,
     *   startedAt?: ?DateTime,
     *   testPercentage?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->error = $values['error'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->requestedAt = $values['requestedAt'] ?? null;
        $this->startedAt = $values['startedAt'] ?? null;
        $this->testPercentage = $values['testPercentage'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
