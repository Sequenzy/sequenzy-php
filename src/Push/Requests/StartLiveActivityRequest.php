<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\LiveActivityAlert;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Core\Types\Union;

class StartLiveActivityRequest extends JsonSerializableType
{
    /**
     * @var string $activityId Your id for the activity, chosen when it starts.
     */
    #[JsonProperty('activityId')]
    public string $activityId;

    /**
     * @var string $activityType The Swift ActivityAttributes type name, sent to APNs as attributes-type.
     */
    #[JsonProperty('activityType')]
    public string $activityType;

    /**
     * @var LiveActivityAlert $alert
     */
    #[JsonProperty('alert')]
    public LiveActivityAlert $alert;

    /**
     * @var ?array<string, mixed> $attributes Static attributes as JSON. A sequenzy key you send is replaced.
     */
    #[JsonProperty('attributes'), ArrayType(['string' => 'mixed'])]
    public ?array $attributes;

    /**
     * @var array<string, mixed> $contentState Your Swift ContentState as JSON. Date fields decode as seconds since 2001-01-01 unless your struct decodes them differently.
     */
    #[JsonProperty('contentState'), ArrayType(['string' => 'mixed'])]
    public array $contentState;

    /**
     * @var ?string $email Contact whose devices start the activity. Provide email or subscriberId.
     */
    #[JsonProperty('email')]
    public ?string $email;

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
     * @var ?string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @param array{
     *   activityId: string,
     *   activityType: string,
     *   alert: LiveActivityAlert,
     *   contentState: array<string, mixed>,
     *   attributes?: ?array<string, mixed>,
     *   email?: ?string,
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
        $this->activityType = $values['activityType'];
        $this->alert = $values['alert'];
        $this->attributes = $values['attributes'] ?? null;
        $this->contentState = $values['contentState'];
        $this->email = $values['email'] ?? null;
        $this->relevanceScore = $values['relevanceScore'] ?? null;
        $this->staleDate = $values['staleDate'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
    }
}
