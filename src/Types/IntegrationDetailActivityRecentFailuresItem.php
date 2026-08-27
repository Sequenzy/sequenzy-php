<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class IntegrationDetailActivityRecentFailuresItem extends JsonSerializableType
{
    /**
     * @var ?string $action
     */
    #[JsonProperty('action')]
    public ?string $action;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $eventType
     */
    #[JsonProperty('eventType')]
    public ?string $eventType;

    /**
     * @param array{
     *   action?: ?string,
     *   createdAt?: ?DateTime,
     *   email?: ?string,
     *   error?: ?string,
     *   eventType?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->action = $values['action'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->eventType = $values['eventType'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
