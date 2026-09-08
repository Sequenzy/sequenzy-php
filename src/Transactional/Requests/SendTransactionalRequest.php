<?php

namespace Sequenzy\Transactional\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\Attachment;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Core\Types\Union;
use Sequenzy\Transactional\Types\SendTransactionalRequestEmailType;
use Sequenzy\Transactional\Types\SendTransactionalRequestTrackingSettings;

class SendTransactionalRequest extends JsonSerializableType
{
    /**
     * @var ?string $idempotencyKey Caller-owned key for one logical email. Reuse the same key and request on retries to receive the original send for 14 days. Reusing the key with different content returns 409.
     */
    public ?string $idempotencyKey;

    /**
     * File attachments for the email. Each attachment must have a filename and either:
     * - `content`: Base64-encoded file content
     * - `path`: URL to fetch the file from
     *
     * Set `contentId` to embed the file as an inline image the HTML references with `<img src="cid:VALUE">` instead of attaching it.
     *
     * Maximum 10 attachments and 7MB total per email.
     *
     * @var ?array<Attachment> $attachments
     */
    #[JsonProperty('attachments'), ArrayType([Attachment::class])]
    public ?array $attachments;

    /**
     * @var (
     *    string
     *   |array<string>
     * )|null $bcc Blind-carbon-copy recipient email address(es). Duplicates already present in `to` or `cc` are removed.
     */
    #[JsonProperty('bcc'), Union('string', ['string'], 'null')]
    public string|array|null $bcc;

    /**
     * @var ?string $body Canonical email body HTML content (required if not using a template slug).
     */
    #[JsonProperty('body')]
    public ?string $body;

    /**
     * @var (
     *    string
     *   |array<string>
     * )|null $cc Visible carbon-copy recipient email address(es). Duplicates already present in `to` are removed.
     */
    #[JsonProperty('cc'), Union('string', ['string'], 'null')]
    public string|array|null $cc;

    /**
     * @var ?value-of<SendTransactionalRequestEmailType> $emailType Delivery policy. Marketing mode requires one recipient, creates or links a minimal subscriber, honors unsubscribe suppression, adds the standard footer, and emits RFC 8058 List-Unsubscribe and List-Unsubscribe-Post headers.
     */
    #[JsonProperty('emailType')]
    public ?string $emailType;

    /**
     * Custom from address. Format: "Name <email>" or just "email".
     * The domain must be verified for your account. If not verified, this field is silently ignored.
     * When the address exactly matches an existing sender identity (the display name disambiguates if
     * several identities share the address), that identity - including its sending route - is used for
     * the send; otherwise the template or company-default identity is kept and this field only changes
     * the visible From.
     *  Mutually exclusive with senderProfileId, fromEmail and fromName.
     *
     * @var ?string $from
     */
    #[JsonProperty('from')]
    public ?string $from;

    /**
     * @var ?string $fromEmail Address of an existing verified sender profile in this company. Mutually exclusive with senderProfileId and from. If several identities share the address, select one with fromName.
     */
    #[JsonProperty('fromEmail')]
    public ?string $fromEmail;

    /**
     * @var ?string $fromName Display name selecting an existing identity on fromEmail. Requires fromEmail; mutually exclusive with senderProfileId and from. Does not create a profile.
     */
    #[JsonProperty('fromName')]
    public ?string $fromName;

    /**
     * @var ?string $html Compatibility alias for `body`. Accepted with `subject` for direct sends and must match `body` when both are provided.
     */
    #[JsonProperty('html')]
    public ?string $html;

    /**
     * @var ?string $preview Preview text for the email (only used with direct content)
     */
    #[JsonProperty('preview')]
    public ?string $preview;

    /**
     * @var ?string $replyProfileId Existing reply profile ID. Mutually exclusive with replyTo and replyToName. Overrides the saved template and default reply identity.
     */
    #[JsonProperty('replyProfileId')]
    public ?string $replyProfileId;

    /**
     * @var ?string $replyTo Reply-to address as "Name <email>" or a bare email, optionally paired with replyToName. Mutually exclusive with replyProfileId. With reply tracking enabled, Sequenzy sends a trackable Reply-To and stores this address as its forwarding destination. Without a reply override, saved-template sends prefer the template reply profile; otherwise sends prefer the effective sending-domain default, then company default, then the first company reply profile.
     */
    #[JsonProperty('replyTo')]
    public ?string $replyTo;

    /**
     * @var ?string $replyToName Display name for a bare replyTo address. Requires replyTo and is mutually exclusive with replyProfileId. Does not create a profile.
     */
    #[JsonProperty('replyToName')]
    public ?string $replyToName;

    /**
     * @var ?string $senderProfileId Existing verified sender profile ID. Mutually exclusive with fromEmail, fromName and from. Selects that identity and its sending route; does not create a profile.
     */
    #[JsonProperty('senderProfileId')]
    public ?string $senderProfileId;

    /**
     * @var ?string $slug Canonical slug of the transactional email template to use (mutually exclusive with direct content).
     */
    #[JsonProperty('slug')]
    public ?string $slug;

    /**
     * @var ?string $subject Email subject (required if not using slug)
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?string $subscriberExternalId Customer-owned subscriber ID for single-recipient sends. If it matches an existing subscriber, analytics and localization use that subscriber; the value is also stored on the send and emitted as external_id in outbound email webhooks even when no subscriber exists. Maximum length is 255 characters.
     */
    #[JsonProperty('subscriberExternalId')]
    public ?string $subscriberExternalId;

    /**
     * @var ?string $templateId Compatibility alias for `slug`. Despite the field name, pass the saved transactional email API slug, not its database ID. Must match `slug` when both are provided.
     */
    #[JsonProperty('templateId')]
    public ?string $templateId;

    /**
     * @var (
     *    string
     *   |array<string>
     * ) $to Recipient email address(es). Can be a single email string or an array of up to 50 emails.
     */
    #[JsonProperty('to'), Union('string', ['string'])]
    public string|array $to;

    /**
     * @var ?SendTransactionalRequestTrackingSettings $trackingSettings Per-send tracking opt-outs. Omitted fields follow the company Transactional API open/click defaults. Set false to disable tracking for this send. Neither true nor omission can enable tracking disabled by account-wide or Transactional API settings.
     */
    #[JsonProperty('trackingSettings')]
    public ?SendTransactionalRequestTrackingSettings $trackingSettings;

    /**
     * @var ?array<string, mixed> $variables Variables for template replacement (works with both modes). Values can be scalars, nested objects, or arrays used by repeat blocks. For a single recipient, stored subscriber first and last names fill missing name variables; explicit request variables take precedence. Raw HTML templates can use simple subscriber/custom-attribute conditionals such as `{{#if subscriber.plan}}...{{else}}...{{/if}}` and `{{#unless subscriber.plan}}...{{/unless}}`. Variables are always HTML-escaped; a template can prefix a tag with `html.` (`{{html.prerenderedHtml}}`) to insert a trusted HTML value unescaped. Injected HTML is sanitized (scripts, event handlers, and dangerous URLs are stripped), only applies in HTML text position, and must not contain end-user input. Likely variable issues are returned as non-blocking diagnostics when possible; missing required variables without defaults render as empty strings and do not block sending.
     */
    #[JsonProperty('variables'), ArrayType(['string' => 'mixed'])]
    public ?array $variables;

    /**
     * @param array{
     *   to: (
     *    string
     *   |array<string>
     * ),
     *   idempotencyKey?: ?string,
     *   attachments?: ?array<Attachment>,
     *   bcc?: (
     *    string
     *   |array<string>
     * )|null,
     *   body?: ?string,
     *   cc?: (
     *    string
     *   |array<string>
     * )|null,
     *   emailType?: ?value-of<SendTransactionalRequestEmailType>,
     *   from?: ?string,
     *   fromEmail?: ?string,
     *   fromName?: ?string,
     *   html?: ?string,
     *   preview?: ?string,
     *   replyProfileId?: ?string,
     *   replyTo?: ?string,
     *   replyToName?: ?string,
     *   senderProfileId?: ?string,
     *   slug?: ?string,
     *   subject?: ?string,
     *   subscriberExternalId?: ?string,
     *   templateId?: ?string,
     *   trackingSettings?: ?SendTransactionalRequestTrackingSettings,
     *   variables?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->attachments = $values['attachments'] ?? null;
        $this->bcc = $values['bcc'] ?? null;
        $this->body = $values['body'] ?? null;
        $this->cc = $values['cc'] ?? null;
        $this->emailType = $values['emailType'] ?? null;
        $this->from = $values['from'] ?? null;
        $this->fromEmail = $values['fromEmail'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->html = $values['html'] ?? null;
        $this->preview = $values['preview'] ?? null;
        $this->replyProfileId = $values['replyProfileId'] ?? null;
        $this->replyTo = $values['replyTo'] ?? null;
        $this->replyToName = $values['replyToName'] ?? null;
        $this->senderProfileId = $values['senderProfileId'] ?? null;
        $this->slug = $values['slug'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->subscriberExternalId = $values['subscriberExternalId'] ?? null;
        $this->templateId = $values['templateId'] ?? null;
        $this->to = $values['to'];
        $this->trackingSettings = $values['trackingSettings'] ?? null;
        $this->variables = $values['variables'] ?? null;
    }
}
