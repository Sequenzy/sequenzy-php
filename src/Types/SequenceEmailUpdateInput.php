<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceEmailUpdateInput extends JsonSerializableType
{
    /**
     * @var ?array<UrlAttachment> $attachments URL-backed file attachments for this email step, fetched at send time. Event-triggered sequences may use {{event.*}} URL templates. Send an empty array to clear them.
     */
    #[JsonProperty('attachments'), ArrayType([UrlAttachment::class])]
    public ?array $attachments;

    /**
     * @var ?array<string> $bccEmails
     */
    #[JsonProperty('bccEmails'), ArrayType(['string'])]
    public ?array $bccEmails;

    /**
     * @var ?array<EmailBlock> $blocks Replacement Sequenzy email blocks. Put visual styling under styles; top-level style keys such as backgroundColor, backgroundOpacity, borderColor, borderWidth, and borderRadius are normalized into styles. Replacing blocks keeps that step's existing Style > Format rather than the company default: a step that already had a logo or a footer gets them back even when you omit them, and every block added that way is named in the response warnings array. Send emailPreset to change the format instead. A step stored as one standalone raw HTML block has no format, so replacing it with another standalone raw HTML block stores it exactly as sent and nothing is added; replacing that markup with native blocks is a conversion rather than a markup edit, so the new blocks do get a footer.
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public ?array $blocks;

    /**
     * @var ?array<string> $ccEmails
     */
    #[JsonProperty('ccEmails'), ArrayType(['string'])]
    public ?array $ccEmails;

    /**
     * @var ?string $emailId Email template ID to update. You can also pass the node ID here for compatibility.
     */
    #[JsonProperty('emailId')]
    public ?string $emailId;

    /**
     * @var ?value-of<SequenceEmailUpdateInputEmailPreset> $emailPreset Per-email Style > Format for native Sequenzy blocks, including emails that contain supported custom HTML blocks. Minimal removes the company logo and uses the simple footer; branded restores the branded chrome. This is not supported when the entire email is standalone raw HTML and must not be combined with html or htmlContent.
     */
    #[JsonProperty('emailPreset')]
    public ?string $emailPreset;

    /**
     * @var ?EmailThemePatch $emailTheme Theme override for this step's linked email only. Partial patch merged into the email's current theme; a step with no override merges into the company theme. Null drops the override.
     */
    #[JsonProperty('emailTheme')]
    public ?EmailThemePatch $emailTheme;

    /**
     * @var ?string $fromEmail From address for this step. Its domain must be configured and verified. Mutually exclusive with senderProfileId.
     */
    #[JsonProperty('fromEmail')]
    public ?string $fromEmail;

    /**
     * @var ?string $fromName Display name override for this step. Alone it only changes the visible name; with fromEmail it also names a newly created sender profile.
     */
    #[JsonProperty('fromName')]
    public ?string $fromName;

    /**
     * @var ?string $html Raw HTML preserved as one HTML block. Provide html/htmlContent or blocks.
     */
    #[JsonProperty('html')]
    public ?string $html;

    /**
     * @var ?string $htmlContent Alias for html. Raw HTML is preserved as one HTML block.
     */
    #[JsonProperty('htmlContent')]
    public ?string $htmlContent;

    /**
     * @var ?bool $isTransactional Use transactional email chrome for this sequence email.
     */
    #[JsonProperty('isTransactional')]
    public ?bool $isTransactional;

    /**
     * @var ?string $name Updated step and email template name.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $nodeId Sequence email node ID to update.
     */
    #[JsonProperty('nodeId')]
    public ?string $nodeId;

    /**
     * @var ?string $previewText Updated preview text.
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var ?string $replyProfileId Reply profile for this step's Reply-To. Mutually exclusive with replyTo.
     */
    #[JsonProperty('replyProfileId')]
    public ?string $replyProfileId;

    /**
     * @var ?string $replyTo Reply-To address for this step. Mutually exclusive with replyProfileId.
     */
    #[JsonProperty('replyTo')]
    public ?string $replyTo;

    /**
     * @var ?string $replyToName Reply-To display name override for this step. Requires replyTo; omit it when using replyProfileId, which already carries its own display name.
     */
    #[JsonProperty('replyToName')]
    public ?string $replyToName;

    /**
     * @var ?string $senderProfileId Sender profile for this step's From identity. Overrides the sequence-level sender for this step. Mutually exclusive with fromEmail.
     */
    #[JsonProperty('senderProfileId')]
    public ?string $senderProfileId;

    /**
     * @var ?string $subject Updated subject line.
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @param array{
     *   attachments?: ?array<UrlAttachment>,
     *   bccEmails?: ?array<string>,
     *   blocks?: ?array<EmailBlock>,
     *   ccEmails?: ?array<string>,
     *   emailId?: ?string,
     *   emailPreset?: ?value-of<SequenceEmailUpdateInputEmailPreset>,
     *   emailTheme?: ?EmailThemePatch,
     *   fromEmail?: ?string,
     *   fromName?: ?string,
     *   html?: ?string,
     *   htmlContent?: ?string,
     *   isTransactional?: ?bool,
     *   name?: ?string,
     *   nodeId?: ?string,
     *   previewText?: ?string,
     *   replyProfileId?: ?string,
     *   replyTo?: ?string,
     *   replyToName?: ?string,
     *   senderProfileId?: ?string,
     *   subject?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->attachments = $values['attachments'] ?? null;
        $this->bccEmails = $values['bccEmails'] ?? null;
        $this->blocks = $values['blocks'] ?? null;
        $this->ccEmails = $values['ccEmails'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->emailPreset = $values['emailPreset'] ?? null;
        $this->emailTheme = $values['emailTheme'] ?? null;
        $this->fromEmail = $values['fromEmail'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->html = $values['html'] ?? null;
        $this->htmlContent = $values['htmlContent'] ?? null;
        $this->isTransactional = $values['isTransactional'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->nodeId = $values['nodeId'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->replyProfileId = $values['replyProfileId'] ?? null;
        $this->replyTo = $values['replyTo'] ?? null;
        $this->replyToName = $values['replyToName'] ?? null;
        $this->senderProfileId = $values['senderProfileId'] ?? null;
        $this->subject = $values['subject'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
