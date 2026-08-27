<?php

namespace Sequenzy\Templates\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\TemplateSummary;

class ListTemplatesResponse extends JsonSerializableType
{
    /**
     * @var ?string $companyId
     */
    #[JsonProperty('companyId')]
    public ?string $companyId;

    /**
     * @var ?array<string, mixed> $emailLocalizationConfig
     */
    #[JsonProperty('emailLocalizationConfig'), ArrayType(['string' => 'mixed'])]
    public ?array $emailLocalizationConfig;

    /**
     * @var ?ListTemplatesResponsePagination $pagination
     */
    #[JsonProperty('pagination')]
    public ?ListTemplatesResponsePagination $pagination;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<TemplateSummary> $templates
     */
    #[JsonProperty('templates'), ArrayType([TemplateSummary::class])]
    public ?array $templates;

    /**
     * @param array{
     *   companyId?: ?string,
     *   emailLocalizationConfig?: ?array<string, mixed>,
     *   pagination?: ?ListTemplatesResponsePagination,
     *   success?: ?bool,
     *   templates?: ?array<TemplateSummary>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->companyId = $values['companyId'] ?? null;
        $this->emailLocalizationConfig = $values['emailLocalizationConfig'] ?? null;
        $this->pagination = $values['pagination'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->templates = $values['templates'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
