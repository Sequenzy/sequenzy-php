<?php

namespace Sequenzy\Campaigns\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\EmailBlock;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CreateVariationCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?array<EmailBlock> $blocks Email blocks. Validated like campaign content.
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
     * @var ?string $html HTML converted to blocks. Use instead of blocks.
     */
    #[JsonProperty('html')]
    public ?string $html;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $parentVariationId The variation this one is derived from.
     */
    #[JsonProperty('parentVariationId')]
    public ?string $parentVariationId;

    /**
     * @var ?string $previewText Preview text this variation uses. Null keeps the email's preview text.
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var ?string $subject Subject this variation uses. Null keeps the email's subject.
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
     *   name: string,
     *   blocks?: ?array<EmailBlock>,
     *   emailTheme?: ?array<string, mixed>,
     *   fontFamily?: ?string,
     *   html?: ?string,
     *   parentVariationId?: ?string,
     *   previewText?: ?string,
     *   subject?: ?string,
     *   summary?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->emailTheme = $values['emailTheme'] ?? null;
        $this->fontFamily = $values['fontFamily'] ?? null;
        $this->html = $values['html'] ?? null;
        $this->name = $values['name'];
        $this->parentVariationId = $values['parentVariationId'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->summary = $values['summary'] ?? null;
    }
}
