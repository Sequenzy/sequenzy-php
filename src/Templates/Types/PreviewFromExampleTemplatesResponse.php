<?php

namespace Sequenzy\Templates\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PreviewFromExampleTemplatesResponse extends JsonSerializableType
{
    /**
     * @var ?PreviewFromExampleTemplatesResponseExample $example
     */
    #[JsonProperty('example')]
    public ?PreviewFromExampleTemplatesResponseExample $example;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?PreviewFromExampleTemplatesResponsePreview $preview
     */
    #[JsonProperty('preview')]
    public ?PreviewFromExampleTemplatesResponsePreview $preview;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   example?: ?PreviewFromExampleTemplatesResponseExample,
     *   message?: ?string,
     *   preview?: ?PreviewFromExampleTemplatesResponsePreview,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->example = $values['example'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->preview = $values['preview'] ?? null;
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
