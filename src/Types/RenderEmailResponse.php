<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class RenderEmailResponse extends JsonSerializableType
{
    /**
     * @var RenderEmailResponseEntity $entity
     */
    #[JsonProperty('entity')]
    public RenderEmailResponseEntity $entity;

    /**
     * @var string $html Email-safe HTML document, rendered exactly as it would be sent.
     */
    #[JsonProperty('html')]
    public string $html;

    /**
     * @var string $locale Localization locale the render resolved to.
     */
    #[JsonProperty('locale')]
    public string $locale;

    /**
     * @var bool $personalized False means no contact was supplied, so a sample contact was used and contact-specific merge tags resolved to empty values.
     */
    #[JsonProperty('personalized')]
    public bool $personalized;

    /**
     * @var ?string $previewText Inbox preview text with merge tags resolved.
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var string $subject Subject line with merge tags resolved.
     */
    #[JsonProperty('subject')]
    public string $subject;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var bool $trackingApplied Whether auto-UTM link decoration was applied.
     */
    #[JsonProperty('trackingApplied')]
    public bool $trackingApplied;

    /**
     * @var array<RenderEmailResponseUnevaluatedConditionsItem> $unevaluatedConditions Block conditions this render could not decide. Each was rendered as false, the same fail-closed rule a live send uses, so an else branch in the HTML is not evidence that the condition is false for a real recipient. Empty when every condition was actually evaluated.
     */
    #[JsonProperty('unevaluatedConditions'), ArrayType([RenderEmailResponseUnevaluatedConditionsItem::class])]
    public array $unevaluatedConditions;

    /**
     * @var array<RenderEmailResponseUnresolvedMergeTagsItem> $unresolvedMergeTags Merge tags that rendered as an empty string. An unrecognized tag and a recognized but blank one are identical in the HTML, so this is the only way to tell them apart. Empty when every tag resolved.
     */
    #[JsonProperty('unresolvedMergeTags'), ArrayType([RenderEmailResponseUnresolvedMergeTagsItem::class])]
    public array $unresolvedMergeTags;

    /**
     * @param array{
     *   entity: RenderEmailResponseEntity,
     *   html: string,
     *   locale: string,
     *   personalized: bool,
     *   subject: string,
     *   success: bool,
     *   trackingApplied: bool,
     *   unevaluatedConditions: array<RenderEmailResponseUnevaluatedConditionsItem>,
     *   unresolvedMergeTags: array<RenderEmailResponseUnresolvedMergeTagsItem>,
     *   previewText?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->entity = $values['entity'];
        $this->html = $values['html'];
        $this->locale = $values['locale'];
        $this->personalized = $values['personalized'];
        $this->previewText = $values['previewText'] ?? null;
        $this->subject = $values['subject'];
        $this->success = $values['success'];
        $this->trackingApplied = $values['trackingApplied'];
        $this->unevaluatedConditions = $values['unevaluatedConditions'];
        $this->unresolvedMergeTags = $values['unresolvedMergeTags'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
