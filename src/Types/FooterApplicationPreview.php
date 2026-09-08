<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class FooterApplicationPreview extends JsonSerializableType
{
    /**
     * @var array<FooterApplicationItem> $affected
     */
    #[JsonProperty('affected'), ArrayType([FooterApplicationItem::class])]
    public array $affected;

    /**
     * @var FooterApplicationPreviewCounts $counts
     */
    #[JsonProperty('counts')]
    public FooterApplicationPreviewCounts $counts;

    /**
     * @var array<FooterApplicationItem> $skipped
     */
    #[JsonProperty('skipped'), ArrayType([FooterApplicationItem::class])]
    public array $skipped;

    /**
     * @var string $token Pass as previewToken with identical input when applying. Relevant content changes invalidate it.
     */
    #[JsonProperty('token')]
    public string $token;

    /**
     * @param array{
     *   affected: array<FooterApplicationItem>,
     *   counts: FooterApplicationPreviewCounts,
     *   skipped: array<FooterApplicationItem>,
     *   token: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->affected = $values['affected'];
        $this->counts = $values['counts'];
        $this->skipped = $values['skipped'];
        $this->token = $values['token'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
