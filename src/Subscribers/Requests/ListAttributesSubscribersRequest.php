<?php

namespace Sequenzy\Subscribers\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Subscribers\Types\ListAttributesSubscribersRequestIncludeNested;

class ListAttributesSubscribersRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<ListAttributesSubscribersRequestIncludeNested> $includeNested Also list nested paths such as profile.tier. Must be true or false. Defaults to false.
     */
    public ?string $includeNested;

    /**
     * @param array{
     *   includeNested?: ?value-of<ListAttributesSubscribersRequestIncludeNested>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->includeNested = $values['includeNested'] ?? null;
    }
}
