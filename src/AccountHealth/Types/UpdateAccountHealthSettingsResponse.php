<?php

namespace Sequenzy\AccountHealth\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Types\AccountHealthSettings;

class UpdateAccountHealthSettingsResponse extends JsonSerializableType
{
    /**
     * @var ?DateTime $nextRunAt
     */
    #[JsonProperty('nextRunAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $nextRunAt;

    /**
     * @var ?AccountHealthSettings $settings
     */
    #[JsonProperty('settings')]
    public ?AccountHealthSettings $settings;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   nextRunAt?: ?DateTime,
     *   settings?: ?AccountHealthSettings,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->nextRunAt = $values['nextRunAt'] ?? null;
        $this->settings = $values['settings'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
