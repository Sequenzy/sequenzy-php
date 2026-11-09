<?php

namespace Sequenzy\InApp\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Types\InAppCampaignMessage;
use Sequenzy\InApp\Types\CreateInAppCampaignRequestPriority;
use Sequenzy\Core\Types\ArrayType;

class CreateInAppCampaignRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $endsAt When the campaign ends. After it nobody new gets the campaign and it leaves every feed that still has it, including seen cards. null means it runs until stopped.
     */
    #[JsonProperty('endsAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $endsAt;

    /**
     * @var ?InAppCampaignMessage $message
     */
    #[JsonProperty('message')]
    public ?InAppCampaignMessage $message;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<CreateInAppCampaignRequestPriority> $priority Order among messages waiting in the app at the same time; higher first. Defaults to medium, the same as sequence messages.
     */
    #[JsonProperty('priority')]
    public ?string $priority;

    /**
     * @var ?array<string, mixed> $targetLists Audience, same shape as campaign targetLists, for example {"type":"all"}, {"type":"lists","listIds":["..."]}, {"type":"segment","segmentId":"..."} or {"type":"rules","include":[...],"exclude":[...]}. Email status does not matter. Each contact is checked when their app fetches its feed while the campaign is live.
     */
    #[JsonProperty('targetLists'), ArrayType(['string' => 'mixed'])]
    public ?array $targetLists;

    /**
     * @param array{
     *   endsAt?: ?DateTime,
     *   message?: ?InAppCampaignMessage,
     *   name?: ?string,
     *   priority?: ?value-of<CreateInAppCampaignRequestPriority>,
     *   targetLists?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->endsAt = $values['endsAt'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->priority = $values['priority'] ?? null;
        $this->targetLists = $values['targetLists'] ?? null;
    }
}
