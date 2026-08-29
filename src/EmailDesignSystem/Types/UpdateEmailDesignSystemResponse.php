<?php

namespace Sequenzy\EmailDesignSystem\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\EmailDesignSystem;
use Sequenzy\Core\Json\JsonProperty;

class UpdateEmailDesignSystemResponse extends JsonSerializableType
{
    /**
     * @var ?EmailDesignSystem $designSystem
     */
    #[JsonProperty('designSystem')]
    public ?EmailDesignSystem $designSystem;

    /**
     * @var ?string $directionText The rewritten direction text now stored on the company; null after a reset.
     */
    #[JsonProperty('directionText')]
    public ?string $directionText;

    /**
     * @var ?bool $isDefault
     */
    #[JsonProperty('isDefault')]
    public ?bool $isDefault;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

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
     *   message?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->designSystem = $values['designSystem'] ?? null;
        $this->directionText = $values['directionText'] ?? null;
        $this->isDefault = $values['isDefault'] ?? null;
        $this->message = $values['message'] ?? null;
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
