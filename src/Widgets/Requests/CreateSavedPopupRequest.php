<?php

namespace Sequenzy\Widgets\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Widgets\Types\CreateSavedPopupRequestDuplicateStrategy;
use Sequenzy\Types\SavedPopupFrequency;
use Sequenzy\Widgets\Types\CreateSavedPopupRequestPlacement;
use Sequenzy\Widgets\Types\CreateSavedPopupRequestPresentation;
use Sequenzy\Types\SavedPopupSchedule;
use Sequenzy\Widgets\Types\CreateSavedPopupRequestStatus;
use Sequenzy\Types\SavedPopupTargeting;
use Sequenzy\Widgets\Types\CreateSavedPopupRequestTemplate;
use Sequenzy\Types\SavedPopupTrigger;
use Sequenzy\Types\SavedPopupVisual;

class CreateSavedPopupRequest extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $blocks Complete replacement for the popup's content blocks. The popup must keep exactly one required email field and one submit button.
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
     * @var ?value-of<CreateSavedPopupRequestDuplicateStrategy> $duplicateStrategy
     */
    #[JsonProperty('duplicateStrategy')]
    public ?string $duplicateStrategy;

    /**
     * @var ?SavedPopupFrequency $frequency
     */
    #[JsonProperty('frequency')]
    public ?SavedPopupFrequency $frequency;

    /**
     * @var ?string $headline
     */
    #[JsonProperty('headline')]
    public ?string $headline;

    /**
     * @var ?array<string> $listIds Lists every signup is added to. Omit or pass an empty array to capture into every list.
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?value-of<CreateSavedPopupRequestPlacement> $placement
     */
    #[JsonProperty('placement')]
    public ?string $placement;

    /**
     * @var ?value-of<CreateSavedPopupRequestPresentation> $presentation
     */
    #[JsonProperty('presentation')]
    public ?string $presentation;

    /**
     * @var ?string $redirectUrl
     */
    #[JsonProperty('redirectUrl')]
    public ?string $redirectUrl;

    /**
     * @var ?SavedPopupSchedule $schedule
     */
    #[JsonProperty('schedule')]
    public ?SavedPopupSchedule $schedule;

    /**
     * @var ?value-of<CreateSavedPopupRequestStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

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
     * @var ?SavedPopupTargeting $targeting
     */
    #[JsonProperty('targeting')]
    public ?SavedPopupTargeting $targeting;

    /**
     * @var ?value-of<CreateSavedPopupRequestTemplate> $template Starting design for the popup's blocks and theme.
     */
    #[JsonProperty('template')]
    public ?string $template;

    /**
     * @var ?array<string, mixed> $theme Optional visual theme overrides (accentColor, backgroundColor, textColor, mutedTextColor, cardColor, borderColor as "#rrggbb", borderRadius 0-32, headingFontFamily, bodyFontFamily, density).
     */
    #[JsonProperty('theme'), ArrayType(['string' => 'mixed'])]
    public ?array $theme;

    /**
     * @var ?SavedPopupTrigger $trigger
     */
    #[JsonProperty('trigger')]
    public ?SavedPopupTrigger $trigger;

    /**
     * @var ?SavedPopupVisual $visual
     */
    #[JsonProperty('visual')]
    public ?SavedPopupVisual $visual;

    /**
     * @param array{
     *   name: string,
     *   blocks?: ?array<array<string, mixed>>,
     *   buttonText?: ?string,
     *   description?: ?string,
     *   duplicateStrategy?: ?value-of<CreateSavedPopupRequestDuplicateStrategy>,
     *   frequency?: ?SavedPopupFrequency,
     *   headline?: ?string,
     *   listIds?: ?array<string>,
     *   placement?: ?value-of<CreateSavedPopupRequestPlacement>,
     *   presentation?: ?value-of<CreateSavedPopupRequestPresentation>,
     *   redirectUrl?: ?string,
     *   schedule?: ?SavedPopupSchedule,
     *   status?: ?value-of<CreateSavedPopupRequestStatus>,
     *   successMessage?: ?string,
     *   tagIds?: ?array<string>,
     *   targeting?: ?SavedPopupTargeting,
     *   template?: ?value-of<CreateSavedPopupRequestTemplate>,
     *   theme?: ?array<string, mixed>,
     *   trigger?: ?SavedPopupTrigger,
     *   visual?: ?SavedPopupVisual,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->buttonText = $values['buttonText'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->duplicateStrategy = $values['duplicateStrategy'] ?? null;
        $this->frequency = $values['frequency'] ?? null;
        $this->headline = $values['headline'] ?? null;
        $this->listIds = $values['listIds'] ?? null;
        $this->name = $values['name'];
        $this->placement = $values['placement'] ?? null;
        $this->presentation = $values['presentation'] ?? null;
        $this->redirectUrl = $values['redirectUrl'] ?? null;
        $this->schedule = $values['schedule'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->successMessage = $values['successMessage'] ?? null;
        $this->tagIds = $values['tagIds'] ?? null;
        $this->targeting = $values['targeting'] ?? null;
        $this->template = $values['template'] ?? null;
        $this->theme = $values['theme'] ?? null;
        $this->trigger = $values['trigger'] ?? null;
        $this->visual = $values['visual'] ?? null;
    }
}
