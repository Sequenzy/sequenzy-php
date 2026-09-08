<?php

namespace Sequenzy\EmailComponents\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\FooterApplicationPreview;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\EmailComponent;
use Sequenzy\Core\Types\ArrayType;

class SetDefaultEmailComponentsResponse extends JsonSerializableType
{
    /**
     * @var ?FooterApplicationPreview $application
     */
    #[JsonProperty('application')]
    public ?FooterApplicationPreview $application;

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
     * @var ?array<string> $warnings
     */
    #[JsonProperty('warnings'), ArrayType(['string'])]
    public ?array $warnings;

    /**
     * @param array{
     *   application?: ?FooterApplicationPreview,
     *   component?: ?EmailComponent,
     *   success?: ?bool,
     *   warnings?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->application = $values['application'] ?? null;
        $this->component = $values['component'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->warnings = $values['warnings'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
