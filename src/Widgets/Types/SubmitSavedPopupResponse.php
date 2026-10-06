<?php

namespace Sequenzy\Widgets\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\SavedPopupRewardResult;

class SubmitSavedPopupResponse extends JsonSerializableType
{
    /**
     * @var ?string $redirectUrl Present when the popup is configured to redirect after submission
     */
    #[JsonProperty('redirectUrl')]
    public ?string $redirectUrl;

    /**
     * @var ?SavedPopupRewardResult $reward Present when the popup has an enabled scratch-to-reveal reward. Every success response for that popup carries the same reward, including submissions ignored by bot and abuse protection, so the response does not reveal whether the contact was stored. Error responses never include it.
     */
    #[JsonProperty('reward')]
    public ?SavedPopupRewardResult $reward;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   redirectUrl?: ?string,
     *   reward?: ?SavedPopupRewardResult,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->redirectUrl = $values['redirectUrl'] ?? null;
        $this->reward = $values['reward'] ?? null;
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
