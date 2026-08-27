<?php

namespace Sequenzy\Widgets\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Widgets\Types\CreateSavedFormRequestDuplicateStrategy;
use Sequenzy\Core\Types\ArrayType;

class CreateSavedFormRequest extends JsonSerializableType
{
    /**
     * @var ?string $buttonText
     */
    #[JsonProperty('buttonText')]
    public ?string $buttonText;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?value-of<CreateSavedFormRequestDuplicateStrategy> $duplicateStrategy
     */
    #[JsonProperty('duplicateStrategy')]
    public ?string $duplicateStrategy;

    /**
     * @var ?string $headline
     */
    #[JsonProperty('headline')]
    public ?string $headline;

    /**
     * @var array<string> $listIds
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public array $listIds;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $redirectUrl
     */
    #[JsonProperty('redirectUrl')]
    public ?string $redirectUrl;

    /**
     * @var ?bool $showFirstName
     */
    #[JsonProperty('showFirstName')]
    public ?bool $showFirstName;

    /**
     * @var ?bool $showLastName
     */
    #[JsonProperty('showLastName')]
    public ?bool $showLastName;

    /**
     * @var ?string $successMessage
     */
    #[JsonProperty('successMessage')]
    public ?string $successMessage;

    /**
     * @var ?array<string> $tagIds
     */
    #[JsonProperty('tagIds'), ArrayType(['string'])]
    public ?array $tagIds;

    /**
     * @var ?array<string, mixed> $theme Optional visual theme overrides (accentColor, backgroundColor, textColor, mutedTextColor, cardColor, borderColor as "#rrggbb", borderRadius 0-32, headingFontFamily, bodyFontFamily, density).
     */
    #[JsonProperty('theme'), ArrayType(['string' => 'mixed'])]
    public ?array $theme;

    /**
     * @param array{
     *   listIds: array<string>,
     *   name: string,
     *   buttonText?: ?string,
     *   description?: ?string,
     *   duplicateStrategy?: ?value-of<CreateSavedFormRequestDuplicateStrategy>,
     *   headline?: ?string,
     *   redirectUrl?: ?string,
     *   showFirstName?: ?bool,
     *   showLastName?: ?bool,
     *   successMessage?: ?string,
     *   tagIds?: ?array<string>,
     *   theme?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->buttonText = $values['buttonText'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->duplicateStrategy = $values['duplicateStrategy'] ?? null;
        $this->headline = $values['headline'] ?? null;
        $this->listIds = $values['listIds'];
        $this->name = $values['name'];
        $this->redirectUrl = $values['redirectUrl'] ?? null;
        $this->showFirstName = $values['showFirstName'] ?? null;
        $this->showLastName = $values['showLastName'] ?? null;
        $this->successMessage = $values['successMessage'] ?? null;
        $this->tagIds = $values['tagIds'] ?? null;
        $this->theme = $values['theme'] ?? null;
    }
}
