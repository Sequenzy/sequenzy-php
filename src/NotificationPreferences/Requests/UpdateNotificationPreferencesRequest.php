<?php

namespace Sequenzy\NotificationPreferences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\NotificationPreference;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpdateNotificationPreferencesRequest extends JsonSerializableType
{
    /**
     * @var ?string $sequenzyClient Identifies a client that supports the complete notification event list, including weekly_report. Any non-empty value opts a default Node or Undici client into the full response.
     */
    public ?string $sequenzyClient;

    /**
     * @var array<NotificationPreference> $notificationPreferences Preferences to set. Events not listed are left unchanged.
     */
    #[JsonProperty('notificationPreferences'), ArrayType([NotificationPreference::class])]
    public array $notificationPreferences;

    /**
     * @param array{
     *   notificationPreferences: array<NotificationPreference>,
     *   sequenzyClient?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->sequenzyClient = $values['sequenzyClient'] ?? null;
        $this->notificationPreferences = $values['notificationPreferences'];
    }
}
