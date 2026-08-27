<?php

namespace Sequenzy\Widgets\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Widgets\Types\UpdateSavedPopupRequestDuplicateStrategy;
use Sequenzy\Types\SavedPopupFrequency;
use Sequenzy\Widgets\Types\UpdateSavedPopupRequestPlacement;
use Sequenzy\Widgets\Types\UpdateSavedPopupRequestPresentation;
use Sequenzy\Types\SavedPopupSchedule;
use Sequenzy\Widgets\Types\UpdateSavedPopupRequestStatus;
use Sequenzy\Types\SavedPopupTargeting;
use Sequenzy\Types\SavedPopupTrigger;
use Sequenzy\Types\SavedPopupVisual;

class UpdateSavedPopupRequest extends JsonSerializableType
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
     * @var ?string $description New text for the popup's first paragraph block. Fails when the popup has no paragraph block.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?value-of<UpdateSavedPopupRequestDuplicateStrategy> $duplicateStrategy
     */
    #[JsonProperty('duplicateStrategy')]
    public ?string $duplicateStrategy;

    /**
     * @var ?SavedPopupFrequency $frequency
     */
    #[JsonProperty('frequency')]
    public ?SavedPopupFrequency $frequency;

    /**
     * @var ?string $headline New text for the popup's first heading block. Fails when the popup has no heading block.
     */
    #[JsonProperty('headline')]
    public ?string $headline;

    /**
     * @var ?array<string> $listIds Replacement list targeting. Pass an empty array to capture into every list.
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<UpdateSavedPopupRequestPlacement> $placement
     */
    #[JsonProperty('placement')]
    public ?string $placement;

    /**
     * @var ?value-of<UpdateSavedPopupRequestPresentation> $presentation
     */
    #[JsonProperty('presentation')]
    public ?string $presentation;

    /**
     * @var ?string $redirectUrl HTTP or HTTPS URL for successful signups. Pass an empty string to switch back to the confirmation message.
     */
    #[JsonProperty('redirectUrl')]
    public ?string $redirectUrl;

    /**
     * @var ?SavedPopupSchedule $schedule
     */
    #[JsonProperty('schedule')]
    public ?SavedPopupSchedule $schedule;

    /**
     * @var ?value-of<UpdateSavedPopupRequestStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $successMessage
     */
    #[JsonProperty('successMessage')]
    public ?string $successMessage;

    /**
     * @var ?array<string> $tagIds Replacement tag IDs. Pass an empty array to clear tags.
     */
    #[JsonProperty('tagIds'), ArrayType(['string'])]
    public ?array $tagIds;

    /**
     * @var ?SavedPopupTargeting $targeting
     */
    #[JsonProperty('targeting')]
    public ?SavedPopupTargeting $targeting;

    /**
     * @var ?array<string, mixed> $theme Visual theme overrides merged into the current theme.
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
     *   blocks?: ?array<array<string, mixed>>,
     *   buttonText?: ?string,
     *   description?: ?string,
     *   duplicateStrategy?: ?value-of<UpdateSavedPopupRequestDuplicateStrategy>,
     *   frequency?: ?SavedPopupFrequency,
     *   headline?: ?string,
     *   listIds?: ?array<string>,
     *   name?: ?string,
     *   placement?: ?value-of<UpdateSavedPopupRequestPlacement>,
     *   presentation?: ?value-of<UpdateSavedPopupRequestPresentation>,
     *   redirectUrl?: ?string,
     *   schedule?: ?SavedPopupSchedule,
     *   status?: ?value-of<UpdateSavedPopupRequestStatus>,
     *   successMessage?: ?string,
     *   tagIds?: ?array<string>,
     *   targeting?: ?SavedPopupTargeting,
     *   theme?: ?array<string, mixed>,
     *   trigger?: ?SavedPopupTrigger,
     *   visual?: ?SavedPopupVisual,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->buttonText = $values['buttonText'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->duplicateStrategy = $values['duplicateStrategy'] ?? null;
        $this->frequency = $values['frequency'] ?? null;
        $this->headline = $values['headline'] ?? null;
        $this->listIds = $values['listIds'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->placement = $values['placement'] ?? null;
        $this->presentation = $values['presentation'] ?? null;
        $this->redirectUrl = $values['redirectUrl'] ?? null;
        $this->schedule = $values['schedule'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->successMessage = $values['successMessage'] ?? null;
        $this->tagIds = $values['tagIds'] ?? null;
        $this->targeting = $values['targeting'] ?? null;
        $this->theme = $values['theme'] ?? null;
        $this->trigger = $values['trigger'] ?? null;
        $this->visual = $values['visual'] ?? null;
    }
}
