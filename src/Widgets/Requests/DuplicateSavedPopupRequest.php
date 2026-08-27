<?php

namespace Sequenzy\Widgets\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class DuplicateSavedPopupRequest extends JsonSerializableType
{
    /**
     * @var ?string $name Name for the copy. Defaults to the original name with " (copy)" appended.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
    }
}
