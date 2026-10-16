<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class EditEmailsSequencesResponseEmailsItem extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $blocks
     */
    #[JsonProperty('blocks'), ArrayType([['string' => 'mixed']])]
    public ?array $blocks;

    /**
     * @var ?string $emailId
     */
    #[JsonProperty('emailId')]
    public ?string $emailId;

    /**
     * @var ?array<string, mixed> $emailTheme The email's theme after the change; null when it uses the company's.
     */
    #[JsonProperty('emailTheme'), ArrayType(['string' => 'mixed'])]
    public ?array $emailTheme;

    /**
     * @var ?string $error Why the email failed, or why a change couldn't be saved.
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $fontFamily
     */
    #[JsonProperty('fontFamily')]
    public ?string $fontFamily;

    /**
     * @var ?string $label How the editor names the step, e.g. Email 2 or Email 3a.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?string $nodeId
     */
    #[JsonProperty('nodeId')]
    public ?string $nodeId;

    /**
     * @var ?string $previewText
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var ?bool $saved Whether the change was saved. False on a dry run and for unchanged or failed emails.
     */
    #[JsonProperty('saved')]
    public ?bool $saved;

    /**
     * @var ?value-of<EditEmailsSequencesResponseEmailsItemStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?string $summary What changed, or why nothing did.
     */
    #[JsonProperty('summary')]
    public ?string $summary;

    /**
     * @param array{
     *   blocks?: ?array<array<string, mixed>>,
     *   emailId?: ?string,
     *   emailTheme?: ?array<string, mixed>,
     *   error?: ?string,
     *   fontFamily?: ?string,
     *   label?: ?string,
     *   nodeId?: ?string,
     *   previewText?: ?string,
     *   saved?: ?bool,
     *   status?: ?value-of<EditEmailsSequencesResponseEmailsItemStatus>,
     *   subject?: ?string,
     *   summary?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->emailTheme = $values['emailTheme'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->fontFamily = $values['fontFamily'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->nodeId = $values['nodeId'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->saved = $values['saved'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->summary = $values['summary'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
