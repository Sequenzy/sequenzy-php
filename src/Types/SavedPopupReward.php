<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Scratch-to-reveal reward. When enabled the popup opens on a scratch card: the visitor scratches (or taps "Tap to reveal") to see the public teaser, clicks Claim, enters their email, and only then sees `value` and `code`. Neither appears in the embed script; a successful submit returns them and saves them on the subscriber as the `discount` custom attribute (`{ value, code, source: "popup", popupId, claimedAt }`), so emails can use `{{discount.value}}` and `{{discount.code}}`. A `discount` attribute the contact already has from another source is never overwritten. Merged key by key.
 *
 * While enabled, `value` is required, the popup cannot redirect after submission, the presentation cannot be `floating-bar`, and no form field may write a `discount` custom attribute.
 */
class SavedPopupReward extends JsonSerializableType
{
    /**
     * @var ?int $cardRadius
     */
    #[JsonProperty('cardRadius')]
    public ?int $cardRadius;

    /**
     * @var ?string $claimText Claim button label. Required while the reward is enabled.
     */
    #[JsonProperty('claimText')]
    public ?string $claimText;

    /**
     * @var ?string $code Optional discount code shown after submit with a copy button. Create it in your store first. Private until submit.
     */
    #[JsonProperty('code')]
    public ?string $code;

    /**
     * @var ?string $coverColor
     */
    #[JsonProperty('coverColor')]
    public ?string $coverColor;

    /**
     * @var ?string $coverImageUrl Optional https image painted as the cover instead of the foil. The host must allow cross-origin requests (CORS); otherwise visitors see the foil.
     */
    #[JsonProperty('coverImageUrl')]
    public ?string $coverImageUrl;

    /**
     * @var ?value-of<SavedPopupRewardCoverPattern> $coverPattern
     */
    #[JsonProperty('coverPattern')]
    public ?string $coverPattern;

    /**
     * @var ?value-of<SavedPopupRewardCoverStyle> $coverStyle Foil finish. `accent` follows the theme accent color; `custom` uses `coverColor`.
     */
    #[JsonProperty('coverStyle')]
    public ?string $coverStyle;

    /**
     * @var ?string $coverText
     */
    #[JsonProperty('coverText')]
    public ?string $coverText;

    /**
     * @var ?string $coverTextColor Cover label color. Null picks a readable color for the finish.
     */
    #[JsonProperty('coverTextColor')]
    public ?string $coverTextColor;

    /**
     * @var ?bool $enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?string $heading
     */
    #[JsonProperty('heading')]
    public ?string $heading;

    /**
     * @var ?string $prizeBackgroundColor Revealed card background. Null uses a tint of the accent color.
     */
    #[JsonProperty('prizeBackgroundColor')]
    public ?string $prizeBackgroundColor;

    /**
     * @var ?string $prizeTextColor Revealed teaser color. Null uses the accent color.
     */
    #[JsonProperty('prizeTextColor')]
    public ?string $prizeTextColor;

    /**
     * @var ?string $subheading
     */
    #[JsonProperty('subheading')]
    public ?string $subheading;

    /**
     * @var ?string $teaser Public text under the scratch cover, repeated above the form after Claim. Required while the reward is enabled.
     */
    #[JsonProperty('teaser')]
    public ?string $teaser;

    /**
     * @var ?string $teaserEyebrow
     */
    #[JsonProperty('teaserEyebrow')]
    public ?string $teaserEyebrow;

    /**
     * @var ?string $value The reward shown after submit, such as "10% off your first order". Private until submit.
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   cardRadius?: ?int,
     *   claimText?: ?string,
     *   code?: ?string,
     *   coverColor?: ?string,
     *   coverImageUrl?: ?string,
     *   coverPattern?: ?value-of<SavedPopupRewardCoverPattern>,
     *   coverStyle?: ?value-of<SavedPopupRewardCoverStyle>,
     *   coverText?: ?string,
     *   coverTextColor?: ?string,
     *   enabled?: ?bool,
     *   heading?: ?string,
     *   prizeBackgroundColor?: ?string,
     *   prizeTextColor?: ?string,
     *   subheading?: ?string,
     *   teaser?: ?string,
     *   teaserEyebrow?: ?string,
     *   value?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cardRadius = $values['cardRadius'] ?? null;
        $this->claimText = $values['claimText'] ?? null;
        $this->code = $values['code'] ?? null;
        $this->coverColor = $values['coverColor'] ?? null;
        $this->coverImageUrl = $values['coverImageUrl'] ?? null;
        $this->coverPattern = $values['coverPattern'] ?? null;
        $this->coverStyle = $values['coverStyle'] ?? null;
        $this->coverText = $values['coverText'] ?? null;
        $this->coverTextColor = $values['coverTextColor'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->heading = $values['heading'] ?? null;
        $this->prizeBackgroundColor = $values['prizeBackgroundColor'] ?? null;
        $this->prizeTextColor = $values['prizeTextColor'] ?? null;
        $this->subheading = $values['subheading'] ?? null;
        $this->teaser = $values['teaser'] ?? null;
        $this->teaserEyebrow = $values['teaserEyebrow'] ?? null;
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
