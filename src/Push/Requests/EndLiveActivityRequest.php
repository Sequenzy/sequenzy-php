<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\LiveActivityAlert;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Core\Types\Union;
use Sequenzy\Push\Types\EndLiveActivityRequestPriority;

class EndLiveActivityRequest extends JsonSerializableType
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
     * @var ?bool $broadcast true sends to every signed-in device running this activityId, of any contact, counting at most 10 devices per contact and up to 100,000 in all. Use it for shared activities such as one started for a segment, list or tag, never for a per-person id like an order, since anyone signed in to your app who runs the id receives the content. Ignored when email or subscriberId is present.
     */
    #[JsonProperty('broadcast')]
    public ?bool $broadcast;

    /**
     * @var array<string, mixed> $contentState Final content shown until the activity is removed. Required, as in Apple's end payloads.
     */
    #[JsonProperty('contentState'), ArrayType(['string' => 'mixed'])]
    public array $contentState;

    /**
     * @var (
     *    int
     *   |string
     * )|null $dismissalDate
     */
    #[JsonProperty('dismissalDate'), Union('integer', 'string', 'null')]
    public int|string|null $dismissalDate;

    /**
     * @var ?string $email Contact whose activity it is. Provide email or subscriberId, or broadcast. Per-contact requests reach only that contact's devices, so a token registered under the same activityId by another device never receives this content.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?value-of<EndLiveActivityRequestPriority> $priority high (default) delivers immediately and counts against Apple's Live Activity update budget; low (apns-priority 5) does not. Pushes with an alert always go at high priority.
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
     *   broadcast?: ?bool,
     *   dismissalDate?: (
     *    int
     *   |string
     * )|null,
     *   email?: ?string,
     *   priority?: ?value-of<EndLiveActivityRequestPriority>,
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
        $this->broadcast = $values['broadcast'] ?? null;
        $this->contentState = $values['contentState'];
        $this->dismissalDate = $values['dismissalDate'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->priority = $values['priority'] ?? null;
        $this->relevanceScore = $values['relevanceScore'] ?? null;
        $this->staleDate = $values['staleDate'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
    }
}
