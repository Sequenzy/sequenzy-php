<?php

namespace Sequenzy\Templates\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateFromExampleTemplatesResponse extends JsonSerializableType
{
    /**
     * @var ?CreateFromExampleTemplatesResponseExample $example
     */
    #[JsonProperty('example')]
    public ?CreateFromExampleTemplatesResponseExample $example;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?CreateFromExampleTemplatesResponseTemplate $template
     */
    #[JsonProperty('template')]
    public ?CreateFromExampleTemplatesResponseTemplate $template;

    /**
     * @param array{
     *   example?: ?CreateFromExampleTemplatesResponseExample,
     *   message?: ?string,
     *   success?: ?bool,
     *   template?: ?CreateFromExampleTemplatesResponseTemplate,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->example = $values['example'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->template = $values['template'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
