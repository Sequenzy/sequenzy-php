<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

class EnrollSubscribersInSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?int $enrolled Number of subscribers enrolled.
     */
    #[JsonProperty('enrolled')]
    public ?int $enrolled;

    /**
     * @var ?array<string> $notFound Emails that did not match any subscriber.
     */
    #[JsonProperty('notFound'), ArrayType(['string'])]
    public ?array $notFound;

    /**
     * @var ?DateTime $scheduledFor When enrolled subscribers process their first step.
     */
    #[JsonProperty('scheduledFor'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledFor;

    /**
     * @var ?int $skipped Subscribers skipped because they are inactive or already enrolled.
     */
    #[JsonProperty('skipped')]
    public ?int $skipped;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?string $targetNodeId Node where enrollment starts.
     */
    #[JsonProperty('targetNodeId')]
    public ?string $targetNodeId;

    /**
     * @param array{
     *   enrolled?: ?int,
     *   notFound?: ?array<string>,
     *   scheduledFor?: ?DateTime,
     *   skipped?: ?int,
     *   success?: ?bool,
     *   targetNodeId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enrolled = $values['enrolled'] ?? null;
        $this->notFound = $values['notFound'] ?? null;
        $this->scheduledFor = $values['scheduledFor'] ?? null;
        $this->skipped = $values['skipped'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->targetNodeId = $values['targetNodeId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
