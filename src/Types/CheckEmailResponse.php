<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CheckEmailResponse extends JsonSerializableType
{
    /**
     * @var ?CheckEmailResponseCategories $categories
     */
    #[JsonProperty('categories')]
    public ?CheckEmailResponseCategories $categories;

    /**
     * @var ?CheckEmailResponseEntity $entity
     */
    #[JsonProperty('entity')]
    public ?CheckEmailResponseEntity $entity;

    /**
     * @var ?value-of<CheckEmailResponseGrade> $grade
     */
    #[JsonProperty('grade')]
    public ?string $grade;

    /**
     * @var ?array<EmailCheckIssue> $issues Findings sorted by severity, errors first.
     */
    #[JsonProperty('issues'), ArrayType([EmailCheckIssue::class])]
    public ?array $issues;

    /**
     * @var ?array<EmailCheckLink> $links Every link and image in the email with its result.
     */
    #[JsonProperty('links'), ArrayType([EmailCheckLink::class])]
    public ?array $links;

    /**
     * @var ?bool $linksChecked False when links was false in the request.
     */
    #[JsonProperty('linksChecked')]
    public ?bool $linksChecked;

    /**
     * @var ?CheckEmailResponseLinkSummary $linkSummary
     */
    #[JsonProperty('linkSummary')]
    public ?CheckEmailResponseLinkSummary $linkSummary;

    /**
     * @var ?string $locale
     */
    #[JsonProperty('locale')]
    public ?string $locale;

    /**
     * @var ?value-of<CheckEmailResponsePlacement> $placement Predicted inbox tab.
     */
    #[JsonProperty('placement')]
    public ?string $placement;

    /**
     * @var ?string $previewText
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var ?int $score Overall score across subject (25%), preview text (15%) and content (40%), including live link findings, rescaled to 100. Sender settings are not part of this check, so the editor's score (which weighs the sender at 20%) can differ slightly.
     */
    #[JsonProperty('score')]
    public ?int $score;

    /**
     * @var ?string $subject Subject line with merge tags resolved for the checked contact.
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<array<string, mixed>> $unevaluatedConditions Same as the render endpoints' unevaluatedConditions.
     */
    #[JsonProperty('unevaluatedConditions'), ArrayType([['string' => 'mixed']])]
    public ?array $unevaluatedConditions;

    /**
     * @var ?array<CheckEmailResponseUnresolvedMergeTagsItem> $unresolvedMergeTags Same as the render endpoints' unresolvedMergeTags.
     */
    #[JsonProperty('unresolvedMergeTags'), ArrayType([CheckEmailResponseUnresolvedMergeTagsItem::class])]
    public ?array $unresolvedMergeTags;

    /**
     * @param array{
     *   categories?: ?CheckEmailResponseCategories,
     *   entity?: ?CheckEmailResponseEntity,
     *   grade?: ?value-of<CheckEmailResponseGrade>,
     *   issues?: ?array<EmailCheckIssue>,
     *   links?: ?array<EmailCheckLink>,
     *   linksChecked?: ?bool,
     *   linkSummary?: ?CheckEmailResponseLinkSummary,
     *   locale?: ?string,
     *   placement?: ?value-of<CheckEmailResponsePlacement>,
     *   previewText?: ?string,
     *   score?: ?int,
     *   subject?: ?string,
     *   success?: ?bool,
     *   unevaluatedConditions?: ?array<array<string, mixed>>,
     *   unresolvedMergeTags?: ?array<CheckEmailResponseUnresolvedMergeTagsItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->categories = $values['categories'] ?? null;
        $this->entity = $values['entity'] ?? null;
        $this->grade = $values['grade'] ?? null;
        $this->issues = $values['issues'] ?? null;
        $this->links = $values['links'] ?? null;
        $this->linksChecked = $values['linksChecked'] ?? null;
        $this->linkSummary = $values['linkSummary'] ?? null;
        $this->locale = $values['locale'] ?? null;
        $this->placement = $values['placement'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->score = $values['score'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->unevaluatedConditions = $values['unevaluatedConditions'] ?? null;
        $this->unresolvedMergeTags = $values['unresolvedMergeTags'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
