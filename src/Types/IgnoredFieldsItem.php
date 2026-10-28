<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class IgnoredFieldsItem extends JsonSerializableType
{
    /**
     * @var string $path Dotted path with array indexes, such as `sendAt` or `steps[1].delayDays`. Empty when the whole body was not a JSON object.
     */
    #[JsonProperty('path')]
    public string $path;

    /**
     * @var value-of<IgnoredFieldsItemReason> $reason `unknown_field`: the endpoint does not accept this field. `not_an_object`: an object was expected, so the value was replaced with an empty object.
     */
    #[JsonProperty('reason')]
    public string $reason;

    /**
     * @param array{
     *   path: string,
     *   reason: value-of<IgnoredFieldsItemReason>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->path = $values['path'];
        $this->reason = $values['reason'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
