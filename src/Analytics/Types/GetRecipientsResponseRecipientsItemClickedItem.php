<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class GetRecipientsResponseRecipientsItemClickedItem extends JsonSerializableType
{
    /**
     * @var ?DateTime $at
     */
    #[JsonProperty('at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $at;

    /**
     * @var ?string $campaignId
     */
    #[JsonProperty('campaignId')]
    public ?string $campaignId;

    /**
     * @var ?array<string> $classificationReasons
     */
    #[JsonProperty('classificationReasons'), ArrayType(['string'])]
    public ?array $classificationReasons;

    /**
     * @var ?value-of<GetRecipientsResponseRecipientsItemClickedItemEngagementQuality> $engagementQuality
     */
    #[JsonProperty('engagementQuality')]
    public ?string $engagementQuality;

    /**
     * @var ?bool $machine
     */
    #[JsonProperty('machine')]
    public ?bool $machine;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   at?: ?DateTime,
     *   campaignId?: ?string,
     *   classificationReasons?: ?array<string>,
     *   engagementQuality?: ?value-of<GetRecipientsResponseRecipientsItemClickedItemEngagementQuality>,
     *   machine?: ?bool,
     *   subject?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->at = $values['at'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->classificationReasons = $values['classificationReasons'] ?? null;
        $this->engagementQuality = $values['engagementQuality'] ?? null;
        $this->machine = $values['machine'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
