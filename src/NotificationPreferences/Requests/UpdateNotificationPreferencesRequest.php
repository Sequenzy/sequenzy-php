<?php

namespace Sequenzy\NotificationPreferences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\NotificationPreference;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpdateNotificationPreferencesRequest extends JsonSerializableType
{
    /**
     * @var array<NotificationPreference> $notificationPreferences Preferences to set. Events not listed are left unchanged.
     */
    #[JsonProperty('notificationPreferences'), ArrayType([NotificationPreference::class])]
    public array $notificationPreferences;

    /**
     * @param array{
     *   notificationPreferences: array<NotificationPreference>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->notificationPreferences = $values['notificationPreferences'];
    }
}
