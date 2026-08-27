<?php

namespace Sequenzy\Templates\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\TemplateLocalization;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SetLocalizationTemplatesResponse extends JsonSerializableType
{
    /**
     * @var ?TemplateLocalization $localization
     */
    #[JsonProperty('localization')]
    public ?TemplateLocalization $localization;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?string $templateId
     */
    #[JsonProperty('templateId')]
    public ?string $templateId;

    /**
     * @var ?array<string> $warnings
     */
    #[JsonProperty('warnings'), ArrayType(['string'])]
    public ?array $warnings;

    /**
     * @param array{
     *   localization?: ?TemplateLocalization,
     *   success?: ?bool,
     *   templateId?: ?string,
     *   warnings?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->localization = $values['localization'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->templateId = $values['templateId'] ?? null;
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
