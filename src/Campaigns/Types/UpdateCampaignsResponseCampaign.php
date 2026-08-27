<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\EmailPreset;

class UpdateCampaignsResponseCampaign extends JsonSerializableType
{
    /**
     * @var ?array<string> $bccEmails
     */
    #[JsonProperty('bccEmails'), ArrayType(['string'])]
    public ?array $bccEmails;

    /**
     * @var ?array<string> $ccEmails
     */
    #[JsonProperty('ccEmails'), ArrayType(['string'])]
    public ?array $ccEmails;

    /**
     * @var ?string $emailId The linked email body, reusable as `templateId` when creating later campaigns.
     */
    #[JsonProperty('emailId')]
    public ?string $emailId;

    /**
     * @var ?value-of<EmailPreset> $emailPreset
     */
    #[JsonProperty('emailPreset')]
    public ?string $emailPreset;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?array<string> $labels
     */
    #[JsonProperty('labels'), ArrayType(['string'])]
    public ?array $labels;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $previewUrl
     */
    #[JsonProperty('previewUrl')]
    public ?string $previewUrl;

    /**
     * @var ?string $replyProfileId
     */
    #[JsonProperty('replyProfileId')]
    public ?string $replyProfileId;

    /**
     * @var ?string $replyToEmail
     */
    #[JsonProperty('replyToEmail')]
    public ?string $replyToEmail;

    /**
     * @var ?string $replyToName
     */
    #[JsonProperty('replyToName')]
    public ?string $replyToName;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?array<string, mixed> $targetLists Saved campaign audience, or null when targeting is still unset.
     */
    #[JsonProperty('targetLists'), ArrayType(['string' => 'mixed'])]
    public ?array $targetLists;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   bccEmails?: ?array<string>,
     *   ccEmails?: ?array<string>,
     *   emailId?: ?string,
     *   emailPreset?: ?value-of<EmailPreset>,
     *   id?: ?string,
     *   labels?: ?array<string>,
     *   name?: ?string,
     *   previewUrl?: ?string,
     *   replyProfileId?: ?string,
     *   replyToEmail?: ?string,
     *   replyToName?: ?string,
     *   status?: ?string,
     *   subject?: ?string,
     *   targetLists?: ?array<string, mixed>,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bccEmails = $values['bccEmails'] ?? null;
        $this->ccEmails = $values['ccEmails'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->emailPreset = $values['emailPreset'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->previewUrl = $values['previewUrl'] ?? null;
        $this->replyProfileId = $values['replyProfileId'] ?? null;
        $this->replyToEmail = $values['replyToEmail'] ?? null;
        $this->replyToName = $values['replyToName'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->targetLists = $values['targetLists'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
