<?php

namespace Sequenzy\Campaigns\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\EmailBlock;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Campaigns\Types\UpdateVariationCampaignsRequestPosition;

class UpdateVariationCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?array<EmailBlock> $blocks
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public ?array $blocks;

    /**
     * @var ?array<string, mixed> $emailTheme The variation's own email theme (presetId, colors, typography, layout). A partial theme is completed with defaults. Null uses the email's theme. Using the variation puts its theme on the email.
     */
    #[JsonProperty('emailTheme'), ArrayType(['string' => 'mixed'])]
    public ?array $emailTheme;

    /**
     * @var ?string $fontFamily The variation's own body font stack. Null uses the email's font.
     */
    #[JsonProperty('fontFamily')]
    public ?string $fontFamily;

    /**
     * @var ?string $html
     */
    #[JsonProperty('html')]
    public ?string $html;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?UpdateVariationCampaignsRequestPosition $position Where the variation sits on the editor canvas, in canvas pixels. Null lets the canvas place it automatically. Moving a variation does not change updatedAt.
     */
    #[JsonProperty('position')]
    public ?UpdateVariationCampaignsRequestPosition $position;

    /**
     * @var ?string $previewText
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?string $summary
     */
    #[JsonProperty('summary')]
    public ?string $summary;

    /**
     * @param array{
     *   blocks?: ?array<EmailBlock>,
     *   emailTheme?: ?array<string, mixed>,
     *   fontFamily?: ?string,
     *   html?: ?string,
     *   name?: ?string,
     *   position?: ?UpdateVariationCampaignsRequestPosition,
     *   previewText?: ?string,
     *   subject?: ?string,
     *   summary?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->emailTheme = $values['emailTheme'] ?? null;
        $this->fontFamily = $values['fontFamily'] ?? null;
        $this->html = $values['html'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->position = $values['position'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->summary = $values['summary'] ?? null;
    }
}
