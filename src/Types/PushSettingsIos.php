<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class PushSettingsIos extends JsonSerializableType
{
    /**
     * @var ?string $bundleId
     */
    #[JsonProperty('bundleId')]
    public ?string $bundleId;

    /**
     * @var ?bool $configured
     */
    #[JsonProperty('configured')]
    public ?bool $configured;

    /**
     * @var ?value-of<PushSettingsIosEnvironment> $environment
     */
    #[JsonProperty('environment')]
    public ?string $environment;

    /**
     * @var ?string $keyId
     */
    #[JsonProperty('keyId')]
    public ?string $keyId;

    /**
     * @var ?string $lastError Last credential rejection from APNs, cleared by a successful send or new credentials.
     */
    #[JsonProperty('lastError')]
    public ?string $lastError;

    /**
     * @var ?DateTime $lastErrorAt
     */
    #[JsonProperty('lastErrorAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastErrorAt;

    /**
     * @var ?string $teamId
     */
    #[JsonProperty('teamId')]
    public ?string $teamId;

    /**
     * @param array{
     *   bundleId?: ?string,
     *   configured?: ?bool,
     *   environment?: ?value-of<PushSettingsIosEnvironment>,
     *   keyId?: ?string,
     *   lastError?: ?string,
     *   lastErrorAt?: ?DateTime,
     *   teamId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bundleId = $values['bundleId'] ?? null;
        $this->configured = $values['configured'] ?? null;
        $this->environment = $values['environment'] ?? null;
        $this->keyId = $values['keyId'] ?? null;
        $this->lastError = $values['lastError'] ?? null;
        $this->lastErrorAt = $values['lastErrorAt'] ?? null;
        $this->teamId = $values['teamId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
