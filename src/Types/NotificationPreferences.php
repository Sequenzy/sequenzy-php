<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class NotificationPreferences extends JsonSerializableType
{
    /**
     * @var ?array<string, string> $defaults Mode each event uses when the user has never configured it, resolved for the API key's user. The workspace owner defaults to weekly_report "weekly"; invited members default to "off".
     */
    #[JsonProperty('defaults'), ArrayType(['string' => 'string'])]
    public ?array $defaults;

    /**
     * @var ?array<NotificationPreference> $notificationPreferences Every notification event available to this client with its current mode, defaults included. Node and Undici clients that omit x-sequenzy-client receive the three legacy events for compatibility.
     */
    #[JsonProperty('notificationPreferences'), ArrayType([NotificationPreference::class])]
    public ?array $notificationPreferences;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<string, array<string>> $supportedModes Modes each event accepts, keyed by event.
     */
    #[JsonProperty('supportedModes'), ArrayType(['string' => ['string']])]
    public ?array $supportedModes;

    /**
     * @param array{
     *   defaults?: ?array<string, string>,
     *   notificationPreferences?: ?array<NotificationPreference>,
     *   success?: ?bool,
     *   supportedModes?: ?array<string, array<string>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->defaults = $values['defaults'] ?? null;
        $this->notificationPreferences = $values['notificationPreferences'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->supportedModes = $values['supportedModes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
