<?php

namespace Sequenzy\EmailComponents\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\EmailComponent;
use Sequenzy\Core\Json\JsonProperty;

class GetDefaultEmailComponentsResponse extends JsonSerializableType
{
    /**
     * @var ?EmailComponent $component
     */
    #[JsonProperty('component')]
    public ?EmailComponent $component;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   component?: ?EmailComponent,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->component = $values['component'] ?? null;
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
