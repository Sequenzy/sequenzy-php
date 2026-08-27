<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;

/**
 * Optional run window. Use null on either key to clear it. Merged key by key.
 */
class SavedPopupSchedule extends JsonSerializableType
{
    /**
     * @var ?DateTime $endsAt Must be later than startsAt.
     */
    #[JsonProperty('endsAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $endsAt;

    /**
     * @var ?DateTime $startsAt
     */
    #[JsonProperty('startsAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startsAt;

    /**
     * @param array{
     *   endsAt?: ?DateTime,
     *   startsAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->endsAt = $values['endsAt'] ?? null;
        $this->startsAt = $values['startsAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
