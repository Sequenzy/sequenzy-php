<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * One item in a contact's in-app feed, with merge tags already resolved.
 */
class InAppMessage extends JsonSerializableType
{
    /**
     * @var ?string $body Plain text; may contain line breaks.
     */
    #[JsonProperty('body')]
    public ?string $body;

    /**
     * @var ?array<InAppMessageButtonsItem> $buttons
     */
    #[JsonProperty('buttons'), ArrayType([InAppMessageButtonsItem::class])]
    public ?array $buttons;

    /**
     * @var ?int $clickCount
     */
    #[JsonProperty('clickCount')]
    public ?int $clickCount;

    /**
     * @var ?DateTime $clickedAt
     */
    #[JsonProperty('clickedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $clickedAt;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?array<string, string> $data String key/values set on the step for your app's own logic.
     */
    #[JsonProperty('data'), ArrayType(['string' => 'string'])]
    public ?array $data;

    /**
     * @var ?DateTime $dismissedAt
     */
    #[JsonProperty('dismissedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $dismissedAt;

    /**
     * @var ?DateTime $displayedAt
     */
    #[JsonProperty('displayedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $displayedAt;

    /**
     * @var ?DateTime $expiresAt After this the item leaves the open feed. Messages default to 30 days; cards never expire unless the step sets it.
     */
    #[JsonProperty('expiresAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $expiresAt;

    /**
     * @var ?value-of<InAppMessageFormat> $format How a message is shown; null for cards.
     */
    #[JsonProperty('format')]
    public ?string $format;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $imageUrl
     */
    #[JsonProperty('imageUrl')]
    public ?string $imageUrl;

    /**
     * @var ?value-of<InAppMessageKind> $kind message: modal, banner or fullscreen, shown once. card: stays in the card feed until dismissed.
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var ?bool $pinned Cards only. Pinned cards sort first.
     */
    #[JsonProperty('pinned')]
    public ?bool $pinned;

    /**
     * @var ?value-of<InAppMessagePosition> $position Banner position; null for other formats and cards.
     */
    #[JsonProperty('position')]
    public ?string $position;

    /**
     * @var ?DateTime $readAt
     */
    #[JsonProperty('readAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $readAt;

    /**
     * @var ?string $sequenceId
     */
    #[JsonProperty('sequenceId')]
    public ?string $sequenceId;

    /**
     * @var ?string $stepId The sequence step (node) that created it.
     */
    #[JsonProperty('stepId')]
    public ?string $stepId;

    /**
     * @var ?InAppStyle $style
     */
    #[JsonProperty('style')]
    public ?InAppStyle $style;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @param array{
     *   body?: ?string,
     *   buttons?: ?array<InAppMessageButtonsItem>,
     *   clickCount?: ?int,
     *   clickedAt?: ?DateTime,
     *   createdAt?: ?DateTime,
     *   data?: ?array<string, string>,
     *   dismissedAt?: ?DateTime,
     *   displayedAt?: ?DateTime,
     *   expiresAt?: ?DateTime,
     *   format?: ?value-of<InAppMessageFormat>,
     *   id?: ?string,
     *   imageUrl?: ?string,
     *   kind?: ?value-of<InAppMessageKind>,
     *   pinned?: ?bool,
     *   position?: ?value-of<InAppMessagePosition>,
     *   readAt?: ?DateTime,
     *   sequenceId?: ?string,
     *   stepId?: ?string,
     *   style?: ?InAppStyle,
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->body = $values['body'] ?? null;
        $this->buttons = $values['buttons'] ?? null;
        $this->clickCount = $values['clickCount'] ?? null;
        $this->clickedAt = $values['clickedAt'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->data = $values['data'] ?? null;
        $this->dismissedAt = $values['dismissedAt'] ?? null;
        $this->displayedAt = $values['displayedAt'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->format = $values['format'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->pinned = $values['pinned'] ?? null;
        $this->position = $values['position'] ?? null;
        $this->readAt = $values['readAt'] ?? null;
        $this->sequenceId = $values['sequenceId'] ?? null;
        $this->stepId = $values['stepId'] ?? null;
        $this->style = $values['style'] ?? null;
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
