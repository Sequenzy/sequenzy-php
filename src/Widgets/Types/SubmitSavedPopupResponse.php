<?php

namespace Sequenzy\Widgets\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SubmitSavedPopupResponse extends JsonSerializableType
{
    /**
     * @var ?string $redirectUrl Present when the popup is configured to redirect after submission
     */
    #[JsonProperty('redirectUrl')]
    public ?string $redirectUrl;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   redirectUrl?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->redirectUrl = $values['redirectUrl'] ?? null;
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
