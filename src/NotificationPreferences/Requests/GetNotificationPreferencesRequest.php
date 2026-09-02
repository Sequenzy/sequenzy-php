<?php

namespace Sequenzy\NotificationPreferences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class GetNotificationPreferencesRequest extends JsonSerializableType
{
    /**
     * @var ?string $sequenzyClient Identifies a client that supports the complete notification event list, including weekly_report. Any non-empty value opts a default Node or Undici client into the full response.
     */
    public ?string $sequenzyClient;

    /**
     * @param array{
     *   sequenzyClient?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sequenzyClient = $values['sequenzyClient'] ?? null;
    }
}
