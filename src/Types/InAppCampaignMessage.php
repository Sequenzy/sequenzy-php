<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * The message an in-app campaign shows, the same fields as an in-app sequence step. Merge tags such as {{firstName}} are filled for each contact when their app receives it.
 */
class InAppCampaignMessage extends JsonSerializableType
{
    /**
     * @var ?string $body
     */
    #[JsonProperty('body')]
    public ?string $body;

    /**
     * @var ?array<InAppCampaignMessageButtonsItem> $buttons
     */
    #[JsonProperty('buttons'), ArrayType([InAppCampaignMessageButtonsItem::class])]
    public ?array $buttons;

    /**
     * @var ?array<string, string> $data Up to 20 string key/values passed to your app.
     */
    #[JsonProperty('data'), ArrayType(['string' => 'string'])]
    public ?array $data;

    /**
     * @var ?int $expiresAfterDays How long a contact keeps the item after first receiving it. null means until the campaign ends or the contact dismisses it.
     */
    #[JsonProperty('expiresAfterDays')]
    public ?int $expiresAfterDays;

    /**
     * @var ?string $eyebrow
     */
    #[JsonProperty('eyebrow')]
    public ?string $eyebrow;

    /**
     * @var ?value-of<InAppCampaignMessageFormat> $format Messages only. Defaults to modal. html needs html and is served only to callers that list html in formats.
     */
    #[JsonProperty('format')]
    public ?string $format;

    /**
     * @var ?string $html format html only. The document, at most 64 KB.
     */
    #[JsonProperty('html')]
    public ?string $html;

    /**
     * @var ?value-of<InAppCampaignMessageImagePlacement> $imagePlacement
     */
    #[JsonProperty('imagePlacement')]
    public ?string $imagePlacement;

    /**
     * @var ?string $imageUrl
     */
    #[JsonProperty('imageUrl')]
    public ?string $imageUrl;

    /**
     * @var ?value-of<InAppCampaignMessageKind> $kind
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var ?bool $pinned Cards only.
     */
    #[JsonProperty('pinned')]
    public ?bool $pinned;

    /**
     * @var ?value-of<InAppCampaignMessagePosition> $position Banners top or bottom; modals bottom (a sheet) or center.
     */
    #[JsonProperty('position')]
    public ?string $position;

    /**
     * @var ?bool $showCloseButton format html only. Defaults to true.
     */
    #[JsonProperty('showCloseButton')]
    public ?bool $showCloseButton;

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
     *   buttons?: ?array<InAppCampaignMessageButtonsItem>,
     *   data?: ?array<string, string>,
     *   expiresAfterDays?: ?int,
     *   eyebrow?: ?string,
     *   format?: ?value-of<InAppCampaignMessageFormat>,
     *   html?: ?string,
     *   imagePlacement?: ?value-of<InAppCampaignMessageImagePlacement>,
     *   imageUrl?: ?string,
     *   kind?: ?value-of<InAppCampaignMessageKind>,
     *   pinned?: ?bool,
     *   position?: ?value-of<InAppCampaignMessagePosition>,
     *   showCloseButton?: ?bool,
     *   style?: ?InAppStyle,
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->body = $values['body'] ?? null;
        $this->buttons = $values['buttons'] ?? null;
        $this->data = $values['data'] ?? null;
        $this->expiresAfterDays = $values['expiresAfterDays'] ?? null;
        $this->eyebrow = $values['eyebrow'] ?? null;
        $this->format = $values['format'] ?? null;
        $this->html = $values['html'] ?? null;
        $this->imagePlacement = $values['imagePlacement'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->pinned = $values['pinned'] ?? null;
        $this->position = $values['position'] ?? null;
        $this->showCloseButton = $values['showCloseButton'] ?? null;
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
