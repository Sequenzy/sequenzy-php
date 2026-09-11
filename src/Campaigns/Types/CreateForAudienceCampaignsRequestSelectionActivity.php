<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Choose at most one campaign/automation/node/transactional source. With no source, audience is required. An audience can also narrow a source. Includes every matching contact across pages. Marketers can use only marketing email sources.
 */
class CreateForAudienceCampaignsRequestSelectionActivity extends JsonSerializableType
{
    /**
     * @var ?CreateForAudienceCampaignsRequestSelectionActivityAudience $audience
     */
    #[JsonProperty('audience')]
    public ?CreateForAudienceCampaignsRequestSelectionActivityAudience $audience;

    /**
     * @var ?string $automationId
     */
    #[JsonProperty('automationId')]
    public ?string $automationId;

    /**
     * @var ?string $automationNodeId
     */
    #[JsonProperty('automationNodeId')]
    public ?string $automationNodeId;

    /**
     * @var ?string $bounceSubType Only for bounce activity.
     */
    #[JsonProperty('bounceSubType')]
    public ?string $bounceSubType;

    /**
     * @var ?value-of<CreateForAudienceCampaignsRequestSelectionActivityBounceType> $bounceType Only for bounce activity.
     */
    #[JsonProperty('bounceType')]
    public ?string $bounceType;

    /**
     * @var ?string $campaignId
     */
    #[JsonProperty('campaignId')]
    public ?string $campaignId;

    /**
     * @var value-of<CreateForAudienceCampaignsRequestSelectionActivityEventType> $eventType
     */
    #[JsonProperty('eventType')]
    public string $eventType;

    /**
     * @var ?bool $includeMachineEngagement
     */
    #[JsonProperty('includeMachineEngagement')]
    public ?bool $includeMachineEngagement;

    /**
     * @var ?string $mailboxProvider
     */
    #[JsonProperty('mailboxProvider')]
    public ?string $mailboxProvider;

    /**
     * @var ?value-of<CreateForAudienceCampaignsRequestSelectionActivityPeriod> $period
     */
    #[JsonProperty('period')]
    public ?string $period;

    /**
     * @var ?string $search
     */
    #[JsonProperty('search')]
    public ?string $search;

    /**
     * @var ?string $transactionalId
     */
    #[JsonProperty('transactionalId')]
    public ?string $transactionalId;

    /**
     * @param array{
     *   eventType: value-of<CreateForAudienceCampaignsRequestSelectionActivityEventType>,
     *   audience?: ?CreateForAudienceCampaignsRequestSelectionActivityAudience,
     *   automationId?: ?string,
     *   automationNodeId?: ?string,
     *   bounceSubType?: ?string,
     *   bounceType?: ?value-of<CreateForAudienceCampaignsRequestSelectionActivityBounceType>,
     *   campaignId?: ?string,
     *   includeMachineEngagement?: ?bool,
     *   mailboxProvider?: ?string,
     *   period?: ?value-of<CreateForAudienceCampaignsRequestSelectionActivityPeriod>,
     *   search?: ?string,
     *   transactionalId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->audience = $values['audience'] ?? null;
        $this->automationId = $values['automationId'] ?? null;
        $this->automationNodeId = $values['automationNodeId'] ?? null;
        $this->bounceSubType = $values['bounceSubType'] ?? null;
        $this->bounceType = $values['bounceType'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->eventType = $values['eventType'];
        $this->includeMachineEngagement = $values['includeMachineEngagement'] ?? null;
        $this->mailboxProvider = $values['mailboxProvider'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->search = $values['search'] ?? null;
        $this->transactionalId = $values['transactionalId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
