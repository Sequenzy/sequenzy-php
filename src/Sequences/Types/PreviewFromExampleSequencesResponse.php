<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PreviewFromExampleSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?PreviewFromExampleSequencesResponseExample $example
     */
    #[JsonProperty('example')]
    public ?PreviewFromExampleSequencesResponseExample $example;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?PreviewFromExampleSequencesResponsePreview $preview
     */
    #[JsonProperty('preview')]
    public ?PreviewFromExampleSequencesResponsePreview $preview;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   example?: ?PreviewFromExampleSequencesResponseExample,
     *   message?: ?string,
     *   preview?: ?PreviewFromExampleSequencesResponsePreview,
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
