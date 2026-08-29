<?php

namespace Sequenzy\EmailDesignSystem\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\EmailDesignSystem;
use Sequenzy\Core\Json\JsonProperty;

class GetEmailDesignSystemResponse extends JsonSerializableType
{
    /**
     * @var ?EmailDesignSystem $designSystem
     */
    #[JsonProperty('designSystem')]
    public ?EmailDesignSystem $designSystem;

    /**
     * @var ?string $directionText The raw design direction text the tokens were parsed from; null when the company has none yet.
     */
    #[JsonProperty('directionText')]
    public ?string $directionText;

    /**
     * @var ?bool $isDefault True while the identity is purely derived from brand context.
     */
    #[JsonProperty('isDefault')]
    public ?bool $isDefault;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   designSystem?: ?EmailDesignSystem,
     *   directionText?: ?string,
     *   isDefault?: ?bool,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->designSystem = $values['designSystem'] ?? null;
        $this->directionText = $values['directionText'] ?? null;
        $this->isDefault = $values['isDefault'] ?? null;
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
