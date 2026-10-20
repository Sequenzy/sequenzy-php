<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class WriteInAppCopyResponse extends JsonSerializableType
{
    /**
     * @var ?WriteInAppCopyResponseCopy $copy
     */
    #[JsonProperty('copy')]
    public ?WriteInAppCopyResponseCopy $copy;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   copy?: ?WriteInAppCopyResponseCopy,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->copy = $values['copy'] ?? null;
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
