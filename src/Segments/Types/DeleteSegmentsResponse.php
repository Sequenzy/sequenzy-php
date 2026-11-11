<?php

namespace Sequenzy\Segments\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class DeleteSegmentsResponse extends JsonSerializableType
{
    /**
     * @var ?array<DeleteSegmentsResponseAffectedAudienceSyncsItem> $affectedAudienceSyncs Ad audience syncs that pushed the segment's members.
     */
    #[JsonProperty('affectedAudienceSyncs'), ArrayType([DeleteSegmentsResponseAffectedAudienceSyncsItem::class])]
    public ?array $affectedAudienceSyncs;

    /**
     * @var ?array<DeleteSegmentsResponseAffectedCampaignsItem> $affectedCampaigns Campaigns that still read the segment and targeted or excluded it. Unsent campaigns (scheduled, waiting approval, sending or paused) and live in-app campaigns (status sent, type in_app, not yet ended).
     */
    #[JsonProperty('affectedCampaigns'), ArrayType([DeleteSegmentsResponseAffectedCampaignsItem::class])]
    public ?array $affectedCampaigns;

    /**
     * @var ?array<DeleteSegmentsResponseAffectedSegmentsItem> $affectedSegments Other segments whose rules referenced the deleted segment.
     */
    #[JsonProperty('affectedSegments'), ArrayType([DeleteSegmentsResponseAffectedSegmentsItem::class])]
    public ?array $affectedSegments;

    /**
     * @var ?array<DeleteSegmentsResponseAffectedSequencesItem> $affectedSequences Sequences (not archived) that read the deleted segment.
     */
    #[JsonProperty('affectedSequences'), ArrayType([DeleteSegmentsResponseAffectedSequencesItem::class])]
    public ?array $affectedSequences;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   affectedAudienceSyncs?: ?array<DeleteSegmentsResponseAffectedAudienceSyncsItem>,
     *   affectedCampaigns?: ?array<DeleteSegmentsResponseAffectedCampaignsItem>,
     *   affectedSegments?: ?array<DeleteSegmentsResponseAffectedSegmentsItem>,
     *   affectedSequences?: ?array<DeleteSegmentsResponseAffectedSequencesItem>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->affectedAudienceSyncs = $values['affectedAudienceSyncs'] ?? null;
        $this->affectedCampaigns = $values['affectedCampaigns'] ?? null;
        $this->affectedSegments = $values['affectedSegments'] ?? null;
        $this->affectedSequences = $values['affectedSequences'] ?? null;
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
