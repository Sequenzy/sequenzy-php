<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\TemplateSummary;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;

class TemplateDetail extends JsonSerializableType
{
    use TemplateSummary;

    /**
     * Present when this email belongs to one or more A/B test
     * variants and the key has ab_tests:read. Content edits must use
     * the A/B variant update endpoint / `update_ab_test_variant`
     * tool, not PUT /templates/{templateId}. Campaign variants can
     * share one email, so each test lists every matching variant.
     *
     * @var ?array<TemplateAbTestReference> $abTests
     */
    #[JsonProperty('abTests'), ArrayType([TemplateAbTestReference::class])]
    public ?array $abTests;

    /**
     * @var ?array<EmailBlock> $blocks
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public ?array $blocks;

    /**
     * @var ?string $companyId
     */
    #[JsonProperty('companyId')]
    public ?string $companyId;

    /**
     * @var ?array<string, mixed> $emailLocalizationConfig
     */
    #[JsonProperty('emailLocalizationConfig'), ArrayType(['string' => 'mixed'])]
    public ?array $emailLocalizationConfig;

    /**
     * @var ?string $fontFamily
     */
    #[JsonProperty('fontFamily')]
    public ?string $fontFamily;

    /**
     * Public anonymized view-in-browser URL. Null until a link is
     * minted via POST /templates/{templateId}/share-link.
     *
     * @var ?string $shareUrl
     */
    #[JsonProperty('shareUrl')]
    public ?string $shareUrl;

    /**
     * @param array{
     *   createdAt?: ?DateTime,
     *   emailPreset?: ?value-of<EmailPreset>,
     *   id?: ?string,
     *   labels?: ?array<string>,
     *   localizations?: ?array<array<string, mixed>>,
     *   name?: ?string,
     *   previewText?: ?string,
     *   subject?: ?string,
     *   updatedAt?: ?DateTime,
     *   abTests?: ?array<TemplateAbTestReference>,
     *   blocks?: ?array<EmailBlock>,
     *   companyId?: ?string,
     *   emailLocalizationConfig?: ?array<string, mixed>,
     *   fontFamily?: ?string,
     *   shareUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->emailPreset = $values['emailPreset'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->localizations = $values['localizations'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->abTests = $values['abTests'] ?? null;
        $this->blocks = $values['blocks'] ?? null;
        $this->companyId = $values['companyId'] ?? null;
        $this->emailLocalizationConfig = $values['emailLocalizationConfig'] ?? null;
        $this->fontFamily = $values['fontFamily'] ?? null;
        $this->shareUrl = $values['shareUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
