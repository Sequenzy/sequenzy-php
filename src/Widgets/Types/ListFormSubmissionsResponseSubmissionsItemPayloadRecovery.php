<?php

namespace Sequenzy\Widgets\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * Present only for reconstructed historical records. The source is inferred and createdAt is an evidence event time, not a verified submission timestamp.
 */
class ListFormSubmissionsResponseSubmissionsItemPayloadRecovery extends JsonSerializableType
{
    /**
     * @var string $evidenceId
     */
    #[JsonProperty('evidenceId')]
    public string $evidenceId;

    /**
     * @var value-of<ListFormSubmissionsResponseSubmissionsItemPayloadRecoveryEvidenceType> $evidenceType
     */
    #[JsonProperty('evidenceType')]
    public string $evidenceType;

    /**
     * @var DateTime $recoveredAt
     */
    #[JsonProperty('recoveredAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $recoveredAt;

    /**
     * @var value-of<ListFormSubmissionsResponseSubmissionsItemPayloadRecoverySourceAttribution> $sourceAttribution
     */
    #[JsonProperty('sourceAttribution')]
    public string $sourceAttribution;

    /**
     * @var value-of<ListFormSubmissionsResponseSubmissionsItemPayloadRecoveryTimestampMeaning> $timestampMeaning
     */
    #[JsonProperty('timestampMeaning')]
    public string $timestampMeaning;

    /**
     * @param array{
     *   evidenceId: string,
     *   evidenceType: value-of<ListFormSubmissionsResponseSubmissionsItemPayloadRecoveryEvidenceType>,
     *   recoveredAt: DateTime,
     *   sourceAttribution: value-of<ListFormSubmissionsResponseSubmissionsItemPayloadRecoverySourceAttribution>,
     *   timestampMeaning: value-of<ListFormSubmissionsResponseSubmissionsItemPayloadRecoveryTimestampMeaning>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->evidenceId = $values['evidenceId'];
        $this->evidenceType = $values['evidenceType'];
        $this->recoveredAt = $values['recoveredAt'];
        $this->sourceAttribution = $values['sourceAttribution'];
        $this->timestampMeaning = $values['timestampMeaning'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
