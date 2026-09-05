<?php

namespace Sequenzy\Templates\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class ListTemplatesRequest extends JsonSerializableType
{
    /**
     * @var ?bool $isTemplate Filter to reusable master designs (`true`) or everything else (`false`). Omit to list every body.
     */
    public ?bool $isTemplate;

    /**
     * @var ?string $label Optional label name filter. Only templates assigned this label are returned.
     */
    public ?string $label;

    /**
     * @var ?int $limit Templates per page. Values above 100 are clamped to 100.
     */
    public ?int $limit;

    /**
     * @var ?int $offset Templates to skip before returning results.
     */
    public ?int $offset;

    /**
     * @param array{
     *   isTemplate?: ?bool,
     *   label?: ?string,
     *   limit?: ?int,
     *   offset?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->isTemplate = $values['isTemplate'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
