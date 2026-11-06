<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;

class IntegrationSummaryCohortsItem extends JsonSerializableType
{
    /**
     * @var ?DateTime $firstSyncedAt
     */
    #[JsonProperty('firstSyncedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $firstSyncedAt;

    /**
     * @var string $id The Mixpanel or Amplitude cohort ID.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?DateTime $lastSyncedAt
     */
    #[JsonProperty('lastSyncedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSyncedAt;

    /**
     * @var string $name The cohort name as last reported by the provider.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $tag
     */
    #[JsonProperty('tag')]
    public string $tag;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   tag: string,
     *   firstSyncedAt?: ?DateTime,
     *   lastSyncedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->firstSyncedAt = $values['firstSyncedAt'] ?? null;
        $this->id = $values['id'];
        $this->lastSyncedAt = $values['lastSyncedAt'] ?? null;
        $this->name = $values['name'];
        $this->tag = $values['tag'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
