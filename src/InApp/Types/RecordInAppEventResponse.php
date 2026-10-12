<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\InAppMessage;
use Sequenzy\Core\Json\JsonProperty;

class RecordInAppEventResponse extends JsonSerializableType
{
    /**
     * @var ?InAppMessage $message
     */
    #[JsonProperty('message')]
    public ?InAppMessage $message;

    /**
     * @var ?bool $recorded True when this report set the timestamp; false for a repeat.
     */
    #[JsonProperty('recorded')]
    public ?bool $recorded;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   message?: ?InAppMessage,
     *   recorded?: ?bool,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->message = $values['message'] ?? null;
        $this->recorded = $values['recorded'] ?? null;
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
