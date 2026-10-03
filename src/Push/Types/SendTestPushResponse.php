<?php

namespace Sequenzy\Push\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SendTestPushResponse extends JsonSerializableType
{
    /**
     * @var ?int $deviceCount
     */
    #[JsonProperty('deviceCount')]
    public ?int $deviceCount;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?string $pushSendId
     */
    #[JsonProperty('pushSendId')]
    public ?string $pushSendId;

    /**
     * @var ?int $remainingToday
     */
    #[JsonProperty('remainingToday')]
    public ?int $remainingToday;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   deviceCount?: ?int,
     *   message?: ?string,
     *   pushSendId?: ?string,
     *   remainingToday?: ?int,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->deviceCount = $values['deviceCount'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->pushSendId = $values['pushSendId'] ?? null;
        $this->remainingToday = $values['remainingToday'] ?? null;
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
