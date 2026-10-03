<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * At most maxEmails marketing emails (campaigns plus marketing sequence emails) per contact in any rolling windowHours.
 */
class FrequencyCap extends JsonSerializableType
{
    /**
     * @var int $maxEmails Most marketing emails one contact may receive in the window.
     */
    #[JsonProperty('maxEmails')]
    public int $maxEmails;

    /**
     * @var int $windowHours Rolling window in hours.
     */
    #[JsonProperty('windowHours')]
    public int $windowHours;

    /**
     * @param array{
     *   maxEmails: int,
     *   windowHours: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->maxEmails = $values['maxEmails'];
        $this->windowHours = $values['windowHours'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
