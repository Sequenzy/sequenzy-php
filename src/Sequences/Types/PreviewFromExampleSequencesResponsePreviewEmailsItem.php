<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PreviewFromExampleSequencesResponsePreviewEmailsItem extends JsonSerializableType
{
    /**
     * @var ?int $day Days after the start of the example sequence.
     */
    #[JsonProperty('day')]
    public ?int $day;

    /**
     * @var ?string $html
     */
    #[JsonProperty('html')]
    public ?string $html;

    /**
     * @var ?string $originalSubject
     */
    #[JsonProperty('originalSubject')]
    public ?string $originalSubject;

    /**
     * @var ?string $previewText
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var ?int $stepNumber Position of the email in the example, from 1.
     */
    #[JsonProperty('stepNumber')]
    public ?int $stepNumber;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @param array{
     *   day?: ?int,
     *   html?: ?string,
     *   originalSubject?: ?string,
     *   previewText?: ?string,
     *   stepNumber?: ?int,
     *   subject?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->day = $values['day'] ?? null;
        $this->html = $values['html'] ?? null;
        $this->originalSubject = $values['originalSubject'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->stepNumber = $values['stepNumber'] ?? null;
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
