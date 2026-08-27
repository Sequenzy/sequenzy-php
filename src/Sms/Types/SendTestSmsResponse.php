<?php

namespace Sequenzy\Sms\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SendTestSmsResponse extends JsonSerializableType
{
    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?string $smsSendId
     */
    #[JsonProperty('smsSendId')]
    public ?string $smsSendId;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?string $toPhone
     */
    #[JsonProperty('toPhone')]
    public ?string $toPhone;

    /**
     * @param array{
     *   message?: ?string,
     *   smsSendId?: ?string,
     *   success?: ?bool,
     *   toPhone?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->message = $values['message'] ?? null;
        $this->smsSendId = $values['smsSendId'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->toPhone = $values['toPhone'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
