<?php

namespace Sequenzy\Widgets\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Widgets\Types\ListSavedPopupsRequestIncludeContent;

class ListSavedPopupsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<ListSavedPopupsRequestIncludeContent> $includeContent Set to `true` to include every popup's full content blocks. Omitted by default because each popup adds roughly 1.8k characters; read one popup with `GET /popups/{popupId}` instead.
     */
    public ?string $includeContent;

    /**
     * @param array{
     *   includeContent?: ?value-of<ListSavedPopupsRequestIncludeContent>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->includeContent = $values['includeContent'] ?? null;
    }
}
