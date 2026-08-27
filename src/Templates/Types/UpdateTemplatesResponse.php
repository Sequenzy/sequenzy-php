<?php

namespace Sequenzy\Templates\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpdateTemplatesResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?UpdateTemplatesResponseTemplate $template
     */
    #[JsonProperty('template')]
    public ?UpdateTemplatesResponseTemplate $template;

    /**
     * @var ?array<string, mixed> $transactional
     */
    #[JsonProperty('transactional'), ArrayType(['string' => 'mixed'])]
    public ?array $transactional;

    /**
     * @var ?array<string> $warnings
     */
    #[JsonProperty('warnings'), ArrayType(['string'])]
    public ?array $warnings;

    /**
     * @param array{
     *   success?: ?bool,
     *   template?: ?UpdateTemplatesResponseTemplate,
     *   transactional?: ?array<string, mixed>,
     *   warnings?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->template = $values['template'] ?? null;
        $this->transactional = $values['transactional'] ?? null;
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
