<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CaptureHeadingBlock extends JsonSerializableType
{
    /**
     * @var value-of<CaptureHeadingBlockAlign> $align
     */
    #[JsonProperty('align')]
    public string $align;

    /**
     * @var string $content Inline HTML is sanitized. Visible text after stripping markup and trimming must contain 1 to 180 characters. maxLength limits the raw markup separately.
     */
    #[JsonProperty('content')]
    public string $content;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var int $level
     */
    #[JsonProperty('level')]
    public int $level;

    /**
     * @var ?string $sectionId
     */
    #[JsonProperty('sectionId')]
    public ?string $sectionId;

    /**
     * @param array{
     *   align: value-of<CaptureHeadingBlockAlign>,
     *   content: string,
     *   id: string,
     *   level: int,
     *   sectionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->align = $values['align'];
        $this->content = $values['content'];
        $this->id = $values['id'];
        $this->level = $values['level'];
        $this->sectionId = $values['sectionId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
