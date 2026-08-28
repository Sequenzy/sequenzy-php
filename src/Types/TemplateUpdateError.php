<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\Error;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class TemplateUpdateError extends JsonSerializableType
{
    use Error;

    /**
     * @var ?array<TemplateAbTestReference> $abTests
     */
    #[JsonProperty('abTests'), ArrayType([TemplateAbTestReference::class])]
    public ?array $abTests;

    /**
     * @var ?string $docsUrl
     */
    #[JsonProperty('docsUrl')]
    public ?string $docsUrl;

    /**
     * @var ?string $howToFix
     */
    #[JsonProperty('howToFix')]
    public ?string $howToFix;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @param array{
     *   error: string,
     *   code?: ?string,
     *   retryable?: ?bool,
     *   success?: ?bool,
     *   abTests?: ?array<TemplateAbTestReference>,
     *   docsUrl?: ?string,
     *   howToFix?: ?string,
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->code = $values['code'] ?? null;
        $this->error = $values['error'];
        $this->retryable = $values['retryable'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->abTests = $values['abTests'] ?? null;
        $this->docsUrl = $values['docsUrl'] ?? null;
        $this->howToFix = $values['howToFix'] ?? null;
        $this->title = $values['title'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
