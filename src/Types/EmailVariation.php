<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * An alternative version of a campaign email, compared side by side on the editor canvas.
 */
class EmailVariation extends JsonSerializableType
{
    /**
     * @var ?array<EmailBlock> $blocks Null while generating or after a failure.
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public ?array $blocks;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $emailId
     */
    #[JsonProperty('emailId')]
    public ?string $emailId;

    /**
     * @var ?array<string, mixed> $emailTheme The variation's own email theme. Null means it uses the email's theme.
     */
    #[JsonProperty('emailTheme'), ArrayType(['string' => 'mixed'])]
    public ?array $emailTheme;

    /**
     * @var ?string $error Why generation failed.
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $fontFamily The variation's own body font stack. Null means it uses the email's font.
     */
    #[JsonProperty('fontFamily')]
    public ?string $fontFamily;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $inUse Whether using this variation would leave the campaign email unchanged (same blocks, and its own subject, preview text, theme and font when it has them). When several match, only the one used most recently is in use.
     */
    #[JsonProperty('inUse')]
    public ?bool $inUse;

    /**
     * @var ?string $label Canvas label. V1, V2, ... for versions of the email; V2.1, V2.2, ... for branches of V2.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $parentId The nearest variation this one descends from that has not been discarded. Null when derived from the email.
     */
    #[JsonProperty('parentId')]
    public ?string $parentId;

    /**
     * @var ?EmailVariationPosition $position Where the user placed it on the editor canvas, in canvas pixels. Null means the canvas places it automatically.
     */
    #[JsonProperty('position')]
    public ?EmailVariationPosition $position;

    /**
     * @var ?string $previewText
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var ?string $prompt The request that generated this variation.
     */
    #[JsonProperty('prompt')]
    public ?string $prompt;

    /**
     * @var ?value-of<EmailVariationStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?value-of<EmailVariationStyle> $style How far it was asked to move from its source, when AI generated it.
     */
    #[JsonProperty('style')]
    public ?string $style;

    /**
     * @var ?string $subject Subject this variation uses. Null keeps the email's subject.
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?string $summary What changed, in a sentence.
     */
    #[JsonProperty('summary')]
    public ?string $summary;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?DateTime $usedAt When this variation was last put in the campaign email.
     */
    #[JsonProperty('usedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $usedAt;

    /**
     * @param array{
     *   blocks?: ?array<EmailBlock>,
     *   createdAt?: ?DateTime,
     *   emailId?: ?string,
     *   emailTheme?: ?array<string, mixed>,
     *   error?: ?string,
     *   fontFamily?: ?string,
     *   id?: ?string,
     *   inUse?: ?bool,
     *   label?: ?string,
     *   name?: ?string,
     *   parentId?: ?string,
     *   position?: ?EmailVariationPosition,
     *   previewText?: ?string,
     *   prompt?: ?string,
     *   status?: ?value-of<EmailVariationStatus>,
     *   style?: ?value-of<EmailVariationStyle>,
     *   subject?: ?string,
     *   summary?: ?string,
     *   updatedAt?: ?DateTime,
     *   usedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->emailTheme = $values['emailTheme'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->fontFamily = $values['fontFamily'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->inUse = $values['inUse'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->parentId = $values['parentId'] ?? null;
        $this->position = $values['position'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->prompt = $values['prompt'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->style = $values['style'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->summary = $values['summary'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->usedAt = $values['usedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
