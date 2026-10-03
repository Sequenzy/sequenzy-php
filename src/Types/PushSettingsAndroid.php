<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class PushSettingsAndroid extends JsonSerializableType
{
    /**
     * @var ?string $clientEmail
     */
    #[JsonProperty('clientEmail')]
    public ?string $clientEmail;

    /**
     * @var ?bool $configured
     */
    #[JsonProperty('configured')]
    public ?bool $configured;

    /**
     * @var ?string $lastError Last credential rejection from Firebase, cleared by a successful send or new credentials.
     */
    #[JsonProperty('lastError')]
    public ?string $lastError;

    /**
     * @var ?DateTime $lastErrorAt
     */
    #[JsonProperty('lastErrorAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastErrorAt;

    /**
     * @var ?string $projectId
     */
    #[JsonProperty('projectId')]
    public ?string $projectId;

    /**
     * @param array{
     *   clientEmail?: ?string,
     *   configured?: ?bool,
     *   lastError?: ?string,
     *   lastErrorAt?: ?DateTime,
     *   projectId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clientEmail = $values['clientEmail'] ?? null;
        $this->configured = $values['configured'] ?? null;
        $this->lastError = $values['lastError'] ?? null;
        $this->lastErrorAt = $values['lastErrorAt'] ?? null;
        $this->projectId = $values['projectId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
