<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CheckEmailResponseCategories extends JsonSerializableType
{
    /**
     * @var ?EmailCheckCategoryScore $content
     */
    #[JsonProperty('content')]
    public ?EmailCheckCategoryScore $content;

    /**
     * @var ?EmailCheckCategoryScore $preview
     */
    #[JsonProperty('preview')]
    public ?EmailCheckCategoryScore $preview;

    /**
     * @var ?EmailCheckCategoryScore $subject
     */
    #[JsonProperty('subject')]
    public ?EmailCheckCategoryScore $subject;

    /**
     * @param array{
     *   content?: ?EmailCheckCategoryScore,
     *   preview?: ?EmailCheckCategoryScore,
     *   subject?: ?EmailCheckCategoryScore,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->content = $values['content'] ?? null;
        $this->preview = $values['preview'] ?? null;
        $this->subject = $values['subject'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
