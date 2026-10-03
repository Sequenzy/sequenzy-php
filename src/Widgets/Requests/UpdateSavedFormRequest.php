<?php

namespace Sequenzy\Widgets\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Widgets\Types\UpdateSavedFormRequestDuplicateStrategy;
use Sequenzy\Widgets\Types\UpdateSavedFormRequestResubscribeBehavior;

class UpdateSavedFormRequest extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $blocks Full replacement for the form's content blocks.
     */
    #[JsonProperty('blocks'), ArrayType([['string' => 'mixed']])]
    public ?array $blocks;

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
     * @var ?value-of<UpdateSavedFormRequestDuplicateStrategy> $duplicateStrategy
     */
    #[JsonProperty('duplicateStrategy')]
    public ?string $duplicateStrategy;

    /**
     * @var ?string $headline
     */
    #[JsonProperty('headline')]
    public ?string $headline;

    /**
     * @var ?array<string> $listIds
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $redirectUrl HTTP or HTTPS success redirect. An empty string switches back to the confirmation message.
     */
    #[JsonProperty('redirectUrl')]
    public ?string $redirectUrl;

    /**
     * @var ?value-of<UpdateSavedFormRequestResubscribeBehavior> $resubscribeBehavior What happens when a contact who unsubscribed from all email submits this form again. `reactivate` resubscribes them and restores the form's lists. `double_opt_in` sends the workspace confirmation email first and resubscribes them when they confirm. Turning it on requires a double opt-in confirmation email and a sender profile, otherwise the request returns 400; if either is removed later, returning unsubscribed contacts stay unsubscribed. Workspace double opt-in always requires confirmation. `duplicateStrategy` never changes subscription status.
     */
    #[JsonProperty('resubscribeBehavior')]
    public ?string $resubscribeBehavior;

    /**
     * @var ?string $successMessage
     */
    #[JsonProperty('successMessage')]
    public ?string $successMessage;

    /**
     * @var ?array<string> $tagIds Replacement tag IDs. An empty array clears tags.
     */
    #[JsonProperty('tagIds'), ArrayType(['string'])]
    public ?array $tagIds;

    /**
     * @var ?array<string, mixed> $theme Visual theme overrides merged into the current theme (accentColor, backgroundColor, textColor, mutedTextColor, cardColor, borderColor as "#rrggbb", borderRadius 0-32, headingFontFamily, bodyFontFamily, density).
     */
    #[JsonProperty('theme'), ArrayType(['string' => 'mixed'])]
    public ?array $theme;

    /**
     * @param array{
     *   blocks?: ?array<array<string, mixed>>,
     *   buttonText?: ?string,
     *   description?: ?string,
     *   duplicateStrategy?: ?value-of<UpdateSavedFormRequestDuplicateStrategy>,
     *   headline?: ?string,
     *   listIds?: ?array<string>,
     *   name?: ?string,
     *   redirectUrl?: ?string,
     *   resubscribeBehavior?: ?value-of<UpdateSavedFormRequestResubscribeBehavior>,
     *   successMessage?: ?string,
     *   tagIds?: ?array<string>,
     *   theme?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->buttonText = $values['buttonText'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->duplicateStrategy = $values['duplicateStrategy'] ?? null;
        $this->headline = $values['headline'] ?? null;
        $this->listIds = $values['listIds'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->redirectUrl = $values['redirectUrl'] ?? null;
        $this->resubscribeBehavior = $values['resubscribeBehavior'] ?? null;
        $this->successMessage = $values['successMessage'] ?? null;
        $this->tagIds = $values['tagIds'] ?? null;
        $this->theme = $values['theme'] ?? null;
    }
}
