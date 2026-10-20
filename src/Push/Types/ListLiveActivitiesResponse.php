<?php

namespace Sequenzy\Push\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\LiveActivityToken;
use Sequenzy\Core\Types\ArrayType;

class ListLiveActivitiesResponse extends JsonSerializableType
{
    /**
     * @var ?string $nextCursor
     */
    #[JsonProperty('nextCursor')]
    public ?string $nextCursor;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?ListLiveActivitiesResponseSummary $summary Active tokens only, for the contact when one is given. A device that can start several types counts once in pushToStartDevices; several devices running one activity count as one activity.
     */
    #[JsonProperty('summary')]
    public ?ListLiveActivitiesResponseSummary $summary;

    /**
     * @var ?array<LiveActivityToken> $tokens
     */
    #[JsonProperty('tokens'), ArrayType([LiveActivityToken::class])]
    public ?array $tokens;

    /**
     * @param array{
     *   nextCursor?: ?string,
     *   success?: ?bool,
     *   summary?: ?ListLiveActivitiesResponseSummary,
     *   tokens?: ?array<LiveActivityToken>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->nextCursor = $values['nextCursor'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->summary = $values['summary'] ?? null;
        $this->tokens = $values['tokens'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
