<?php

namespace Sequenzy\Templates\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateShareLinkTemplatesResponse extends JsonSerializableType
{
    /**
     * @var ?bool $created False when an already-active link was returned instead of minted.
     */
    #[JsonProperty('created')]
    public ?bool $created;

    /**
     * @var ?string $shareToken Capability token embedded in the URL.
     */
    #[JsonProperty('shareToken')]
    public ?string $shareToken;

    /**
     * @var ?string $shareUrl Public anonymized view-in-browser URL.
     */
    #[JsonProperty('shareUrl')]
    public ?string $shareUrl;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   created?: ?bool,
     *   shareToken?: ?string,
     *   shareUrl?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->created = $values['created'] ?? null;
        $this->shareToken = $values['shareToken'] ?? null;
        $this->shareUrl = $values['shareUrl'] ?? null;
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
