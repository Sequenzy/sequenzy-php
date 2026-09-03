<?php

namespace Sequenzy\SenderProfiles\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class DeleteSenderProfilesResponse extends JsonSerializableType
{
    /**
     * @var string $deletedSenderProfileId ID of the profile that was deleted.
     */
    #[JsonProperty('deletedSenderProfileId')]
    public string $deletedSenderProfileId;

    /**
     * @var ?string $fallbackSenderProfileId Remaining profile selected for defaults and eligible drafts when reassignment was needed.
     */
    #[JsonProperty('fallbackSenderProfileId')]
    public ?string $fallbackSenderProfileId;

    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   deletedSenderProfileId: string,
     *   message: string,
     *   success: bool,
     *   fallbackSenderProfileId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->deletedSenderProfileId = $values['deletedSenderProfileId'];
        $this->fallbackSenderProfileId = $values['fallbackSenderProfileId'] ?? null;
        $this->message = $values['message'];
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
