<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceStepInput extends JsonSerializableType
{
    /**
     * @var ?float $amountOff Fixed discount amount in the smallest currency unit, for example 500 for $5. Required when discountType is amount.
     */
    #[JsonProperty('amountOff')]
    public ?float $amountOff;

    /**
     * @var ?bool $appliesToAllPlans Whether the discount applies to all plans. Defaults to true.
     */
    #[JsonProperty('appliesToAllPlans')]
    public ?bool $appliesToAllPlans;

    /**
     * @var ?array<UrlAttachment> $attachments URL-backed file attachments for this email step, fetched at send time. Event-triggered sequences may use {{event.*}} URL templates. Send an empty array to clear them.
     */
    #[JsonProperty('attachments'), ArrayType([UrlAttachment::class])]
    public ?array $attachments;

    /**
     * @var ?array<string> $bccEmails Addresses BCC'd on this email step in addition to sequence-level BCC. Send an empty array to clear them.
     */
    #[JsonProperty('bccEmails'), ArrayType(['string'])]
    public ?array $bccEmails;

    /**
     * @var ?array<EmailBlock> $blocks Structured Sequenzy email blocks. Provide either blocks or html. Put visual styling under styles; top-level style keys such as backgroundColor, backgroundOpacity, borderColor, borderWidth, and borderRadius are normalized into styles.
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public ?array $blocks;

    /**
     * @var ?array<string> $ccEmails Addresses CC'd on this email step. Send an empty array to clear them.
     */
    #[JsonProperty('ccEmails'), ArrayType(['string'])]
    public ?array $ccEmails;

    /**
     * @var ?string $codePrefix Optional prefix for generated dynamic codes. The final code also includes a subscriber/token suffix.
     */
    #[JsonProperty('codePrefix')]
    public ?string $codePrefix;

    /**
     * @var ?SubscriberUpdateConfig $config
     */
    #[JsonProperty('config')]
    public ?SubscriberUpdateConfig $config;

    /**
     * @var ?string $currency ISO currency for fixed-amount discounts. Defaults to usd.
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?SequenceDelayInput $delay
     */
    #[JsonProperty('delay')]
    public ?SequenceDelayInput $delay;

    /**
     * @var ?float $delayMs Delay before this step in milliseconds. Prefer delay for human-authored requests; use delayMs when importing provider waits.
     */
    #[JsonProperty('delayMs')]
    public ?float $delayMs;

    /**
     * @var ?SequenceDiscountInput $discount Discount configuration for create_discount steps. Prefer this nested shape for new integrations; legacy top-level discount fields are still accepted.
     */
    #[JsonProperty('discount')]
    public ?SequenceDiscountInput $discount;

    /**
     * @var ?value-of<SequenceStepInputDiscountType> $discountType Legacy top-level discount type. Prefer discount.discountType.
     */
    #[JsonProperty('discountType')]
    public ?string $discountType;

    /**
     * @var ?value-of<SequenceStepInputDuration> $duration Discount duration. Defaults to once.
     */
    #[JsonProperty('duration')]
    public ?string $duration;

    /**
     * @var ?float $durationInMonths Required for repeating discounts.
     */
    #[JsonProperty('durationInMonths')]
    public ?float $durationInMonths;

    /**
     * @var ?string $expiresAt Optional future expiration date or ISO timestamp. Mutually exclusive with expiresInHours.
     */
    #[JsonProperty('expiresAt')]
    public ?string $expiresAt;

    /**
     * @var ?float $expiresInHours Optional relative expiration in hours, resolved when each subscriber's code is created. Takes precedence over expiresAt.
     */
    #[JsonProperty('expiresInHours')]
    public ?float $expiresInHours;

    /**
     * @var ?string $fromEmail From address used to create a sender profile for this email step. Mutually exclusive with senderProfileId.
     */
    #[JsonProperty('fromEmail')]
    public ?string $fromEmail;

    /**
     * @var ?string $fromName Display name override for this email step. Alone it only changes the visible name; with fromEmail it also names a newly created sender profile.
     */
    #[JsonProperty('fromName')]
    public ?string $fromName;

    /**
     * @var ?string $html Raw HTML preserved as one HTML block. Provide either html or blocks.
     */
    #[JsonProperty('html')]
    public ?string $html;

    /**
     * @var ?array<string> $imageUrls SMS steps only. Up to 2 publicly reachable image URLs sent as MMS media.
     */
    #[JsonProperty('imageUrls'), ArrayType(['string'])]
    public ?array $imageUrls;

    /**
     * @var ?value-of<SequenceStepInputIneligibleAction> $ineligibleAction SMS steps only. skip (default) continues the sequence when the contact can't receive SMS; exit removes them from the sequence.
     */
    #[JsonProperty('ineligibleAction')]
    public ?string $ineligibleAction;

    /**
     * @var ?bool $isTransactional Send this email without the marketing unsubscribe footer.
     */
    #[JsonProperty('isTransactional')]
    public ?bool $isTransactional;

    /**
     * @var ?string $label Legacy top-level builder label for discount steps. Prefer discount.label.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?bool $lockToSubscriber Legacy top-level Stripe-only flag. Prefer discount.lockToSubscriber.
     */
    #[JsonProperty('lockToSubscriber')]
    public ?bool $lockToSubscriber;

    /**
     * @var ?float $maxRedemptions Maximum redemptions for each generated code. Use 1 for subscriber-specific codes.
     */
    #[JsonProperty('maxRedemptions')]
    public ?float $maxRedemptions;

    /**
     * @var ?string $name Optional email template name for email steps.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<SequenceStepInputNodeType> $nodeType Internal node-type alias for clients that work with automation nodes. Use action_update_attributes with config for Update Subscriber steps.
     */
    #[JsonProperty('nodeType')]
    public ?string $nodeType;

    /**
     * @var ?float $percentOff Percent discount. Required when discountType is percent.
     */
    #[JsonProperty('percentOff')]
    public ?float $percentOff;

    /**
     * @var ?array<string> $planIds Provider product IDs when appliesToAllPlans is false. Stripe uses IDs like prod_abc123; Shopify accepts numeric product IDs or gid://shopify/Product/... IDs.
     */
    #[JsonProperty('planIds'), ArrayType(['string'])]
    public ?array $planIds;

    /**
     * @var ?string $previewText Optional email preview text.
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var ?value-of<SequenceStepInputProvider> $provider Legacy top-level discount provider. Prefer discount.provider. Supports stripe and shopify.
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $replyProfileId Existing reply profile override for this email step.
     */
    #[JsonProperty('replyProfileId')]
    public ?string $replyProfileId;

    /**
     * @var ?string $replyTo Reply-To address used to create a reply profile for this email step. Mutually exclusive with replyProfileId.
     */
    #[JsonProperty('replyTo')]
    public ?string $replyTo;

    /**
     * @var ?string $replyToName Display name for the step reply profile. Requires replyTo; omit it when using replyProfileId, which already carries its own display name.
     */
    #[JsonProperty('replyToName')]
    public ?string $replyToName;

    /**
     * @var ?string $senderProfileId Existing sender profile override for this email step.
     */
    #[JsonProperty('senderProfileId')]
    public ?string $senderProfileId;

    /**
     * @var ?string $subject Email subject line for email steps.
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?string $text SMS steps only. Plain-text message body; merge tags like {{FIRST_NAME}} work. Do not include opt-out text or a brand prefix - Sequenzy adds both automatically at send time.
     */
    #[JsonProperty('text')]
    public ?string $text;

    /**
     * @var ?value-of<SequenceStepInputType> $type Step type. Omit or use email for email content; use sms for a native SMS step; use create_discount for a dynamic discount; use update_subscriber for an Update Subscriber action.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?SequenceWaitUntilInput $waitUntil
     */
    #[JsonProperty('waitUntil')]
    public ?SequenceWaitUntilInput $waitUntil;

    /**
     * @var ?SequenceWaitUntilWeekdayInput $waitUntilWeekday
     */
    #[JsonProperty('waitUntilWeekday')]
    public ?SequenceWaitUntilWeekdayInput $waitUntilWeekday;

    /**
     * @param array{
     *   amountOff?: ?float,
     *   appliesToAllPlans?: ?bool,
     *   attachments?: ?array<UrlAttachment>,
     *   bccEmails?: ?array<string>,
     *   blocks?: ?array<EmailBlock>,
     *   ccEmails?: ?array<string>,
     *   codePrefix?: ?string,
     *   config?: ?SubscriberUpdateConfig,
     *   currency?: ?string,
     *   delay?: ?SequenceDelayInput,
     *   delayMs?: ?float,
     *   discount?: ?SequenceDiscountInput,
     *   discountType?: ?value-of<SequenceStepInputDiscountType>,
     *   duration?: ?value-of<SequenceStepInputDuration>,
     *   durationInMonths?: ?float,
     *   expiresAt?: ?string,
     *   expiresInHours?: ?float,
     *   fromEmail?: ?string,
     *   fromName?: ?string,
     *   html?: ?string,
     *   imageUrls?: ?array<string>,
     *   ineligibleAction?: ?value-of<SequenceStepInputIneligibleAction>,
     *   isTransactional?: ?bool,
     *   label?: ?string,
     *   lockToSubscriber?: ?bool,
     *   maxRedemptions?: ?float,
     *   name?: ?string,
     *   nodeType?: ?value-of<SequenceStepInputNodeType>,
     *   percentOff?: ?float,
     *   planIds?: ?array<string>,
     *   previewText?: ?string,
     *   provider?: ?value-of<SequenceStepInputProvider>,
     *   replyProfileId?: ?string,
     *   replyTo?: ?string,
     *   replyToName?: ?string,
     *   senderProfileId?: ?string,
     *   subject?: ?string,
     *   text?: ?string,
     *   type?: ?value-of<SequenceStepInputType>,
     *   waitUntil?: ?SequenceWaitUntilInput,
     *   waitUntilWeekday?: ?SequenceWaitUntilWeekdayInput,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->amountOff = $values['amountOff'] ?? null;
        $this->appliesToAllPlans = $values['appliesToAllPlans'] ?? null;
        $this->attachments = $values['attachments'] ?? null;
        $this->bccEmails = $values['bccEmails'] ?? null;
        $this->blocks = $values['blocks'] ?? null;
        $this->ccEmails = $values['ccEmails'] ?? null;
        $this->codePrefix = $values['codePrefix'] ?? null;
        $this->config = $values['config'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->delay = $values['delay'] ?? null;
        $this->delayMs = $values['delayMs'] ?? null;
        $this->discount = $values['discount'] ?? null;
        $this->discountType = $values['discountType'] ?? null;
        $this->duration = $values['duration'] ?? null;
        $this->durationInMonths = $values['durationInMonths'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->expiresInHours = $values['expiresInHours'] ?? null;
        $this->fromEmail = $values['fromEmail'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->html = $values['html'] ?? null;
        $this->imageUrls = $values['imageUrls'] ?? null;
        $this->ineligibleAction = $values['ineligibleAction'] ?? null;
        $this->isTransactional = $values['isTransactional'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->lockToSubscriber = $values['lockToSubscriber'] ?? null;
        $this->maxRedemptions = $values['maxRedemptions'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->nodeType = $values['nodeType'] ?? null;
        $this->percentOff = $values['percentOff'] ?? null;
        $this->planIds = $values['planIds'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->replyProfileId = $values['replyProfileId'] ?? null;
        $this->replyTo = $values['replyTo'] ?? null;
        $this->replyToName = $values['replyToName'] ?? null;
        $this->senderProfileId = $values['senderProfileId'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->text = $values['text'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->waitUntil = $values['waitUntil'] ?? null;
        $this->waitUntilWeekday = $values['waitUntilWeekday'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
