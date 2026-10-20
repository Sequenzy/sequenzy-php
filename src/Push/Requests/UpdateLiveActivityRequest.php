<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\LiveActivityAlert;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Push\Types\UpdateLiveActivityRequestPriority;
use Sequenzy\Core\Types\Union;

class UpdateLiveActivityRequest extends JsonSerializableType
{
    /**
     * @var string $activityId Your id for the activity, chosen when it starts.
     */
    #[JsonProperty('activityId')]
    public string $activityId;

    /**
     * @var ?LiveActivityAlert $alert
     */
    #[JsonProperty('alert')]
    public ?LiveActivityAlert $alert;

    /**
     * @var array<string, mixed> $contentState Your Swift ContentState as JSON. Date fields decode as seconds since 2001-01-01 unless your struct decodes them differently.
     */
    #[JsonProperty('contentState'), ArrayType(['string' => 'mixed'])]
    public array $contentState;

    /**
     * @var ?string $email Contact whose activity it is. Provide email or subscriberId; activities are always addressed per contact, so a token registered under the same activityId by another device never receives this content.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?value-of<UpdateLiveActivityRequestPriority> $priority high (default) delivers immediately and counts against Apple's Live Activity update budget; low (apns-priority 5) does not. Pushes with an alert always go at high priority.
     */
    #[JsonProperty('priority')]
    public ?string $priority;

    /**
     * @var ?float $relevanceScore Orders a person's concurrent activities; higher shows first.
     */
    #[JsonProperty('relevanceScore')]
    public ?float $relevanceScore;

    /**
     * @var (
     *    int
     *   |string
     * )|null $staleDate
     */
    #[JsonProperty('staleDate'), Union('integer', 'string', 'null')]
    public int|string|null $staleDate;

    /**
     * @var ?string $subscriberId Subscriber whose activity it is.
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @param array{
     *   activityId: string,
     *   contentState: array<string, mixed>,
     *   alert?: ?LiveActivityAlert,
     *   email?: ?string,
     *   priority?: ?value-of<UpdateLiveActivityRequestPriority>,
     *   relevanceScore?: ?float,
     *   staleDate?: (
     *    int
     *   |string
     * )|null,
     *   subscriberId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->activityId = $values['activityId'];
        $this->alert = $values['alert'] ?? null;
        $this->contentState = $values['contentState'];
        $this->email = $values['email'] ?? null;
        $this->priority = $values['priority'] ?? null;
        $this->relevanceScore = $values['relevanceScore'] ?? null;
        $this->staleDate = $values['staleDate'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
    }
}
