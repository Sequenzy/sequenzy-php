<?php

namespace Sequenzy\Templates\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\TemplateDetail;
use Sequenzy\Core\Types\ArrayType;

class GetTemplatesResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?TemplateDetail $template
     */
    #[JsonProperty('template')]
    public ?TemplateDetail $template;

    /**
     * @var ?array<string, mixed> $transactional
     */
    #[JsonProperty('transactional'), ArrayType(['string' => 'mixed'])]
    public ?array $transactional;

    /**
     * @param array{
     *   success?: ?bool,
     *   template?: ?TemplateDetail,
     *   transactional?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->template = $values['template'] ?? null;
        $this->transactional = $values['transactional'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
