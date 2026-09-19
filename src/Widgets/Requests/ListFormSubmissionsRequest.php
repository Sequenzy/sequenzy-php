<?php

namespace Sequenzy\Widgets\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Widgets\Types\ListFormSubmissionsRequestFormat;

class ListFormSubmissionsRequest extends JsonSerializableType
{
    /**
     * @var ?string $cursor nextCursor from the previous page, keeping the same filters.
     */
    public ?string $cursor;

    /**
     * @var ?string $field Exact custom attribute key; requires value. Omit both to clear filtering.
     */
    public ?string $field;

    /**
     * @var ?value-of<ListFormSubmissionsRequestFormat> $format csv adds a CSV string for this page; the response remains JSON.
     */
    public ?string $format;

    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @var ?string $value Exact scalar answer or string array member; requires field. Empty string is allowed.
     */
    public ?string $value;

    /**
     * @param array{
     *   cursor?: ?string,
     *   field?: ?string,
     *   format?: ?value-of<ListFormSubmissionsRequestFormat>,
     *   limit?: ?int,
     *   value?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->field = $values['field'] ?? null;
        $this->format = $values['format'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->value = $values['value'] ?? null;
    }
}
