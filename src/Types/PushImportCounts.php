<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PushImportCounts extends JsonSerializableType
{
    /**
     * @var ?int $imported New active devices written.
     */
    #[JsonProperty('imported')]
    public ?int $imported;

    /**
     * @var ?int $invalid
     */
    #[JsonProperty('invalid')]
    public ?int $invalid;

    /**
     * @var ?int $matched Opted-in devices Sequenzy already had (for example registered by an SDK). They are left as they are, except that a device without a contact is linked to one.
     */
    #[JsonProperty('matched')]
    public ?int $matched;

    /**
     * @var ?int $skipped
     */
    #[JsonProperty('skipped')]
    public ?int $skipped;

    /**
     * @var ?int $subscribersCreated
     */
    #[JsonProperty('subscribersCreated')]
    public ?int $subscribersCreated;

    /**
     * @var ?int $unsubscribed Devices the source reports as opted out. New ones are stored as unsubscribed and never receive push.
     */
    #[JsonProperty('unsubscribed')]
    public ?int $unsubscribed;

    /**
     * @param array{
     *   imported?: ?int,
     *   invalid?: ?int,
     *   matched?: ?int,
     *   skipped?: ?int,
     *   subscribersCreated?: ?int,
     *   unsubscribed?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->imported = $values['imported'] ?? null;
        $this->invalid = $values['invalid'] ?? null;
        $this->matched = $values['matched'] ?? null;
        $this->skipped = $values['skipped'] ?? null;
        $this->subscribersCreated = $values['subscribersCreated'] ?? null;
        $this->unsubscribed = $values['unsubscribed'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
