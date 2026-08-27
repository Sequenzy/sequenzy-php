<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class AgentFriendlyError extends JsonSerializableType
{
    /**
     * @var string $code Stable machine-readable error code.
     */
    #[JsonProperty('code')]
    public string $code;

    /**
     * @var string $description Agent-friendly explanation of why the request failed.
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var ?array<string, mixed> $details
     */
    #[JsonProperty('details'), ArrayType(['string' => 'mixed'])]
    public ?array $details;

    /**
     * @var string $docsUrl Documentation URL for the failed operation.
     */
    #[JsonProperty('docsUrl')]
    public string $docsUrl;

    /**
     * @var string $error Short error label.
     */
    #[JsonProperty('error')]
    public string $error;

    /**
     * @var string $resolution Concrete next step for humans or AI agents.
     */
    #[JsonProperty('resolution')]
    public string $resolution;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var string $title UI-friendly title.
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @param array{
     *   code: string,
     *   description: string,
     *   docsUrl: string,
     *   error: string,
     *   resolution: string,
     *   success: bool,
     *   title: string,
     *   details?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->code = $values['code'];
        $this->description = $values['description'];
        $this->details = $values['details'] ?? null;
        $this->docsUrl = $values['docsUrl'];
        $this->error = $values['error'];
        $this->resolution = $values['resolution'];
        $this->success = $values['success'];
        $this->title = $values['title'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
