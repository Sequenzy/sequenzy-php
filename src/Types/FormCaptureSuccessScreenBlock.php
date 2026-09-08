<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class FormCaptureSuccessScreenBlock extends JsonSerializableType
{
    /**
     * @var string $heading Inline HTML is sanitized. Visible text after stripping markup and trimming must contain at most 120 characters. maxLength limits the raw markup separately.
     */
    #[JsonProperty('heading')]
    public string $heading;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $message Inline HTML is sanitized. Visible text after stripping markup and trimming must contain 1 to 240 characters. maxLength limits the raw markup separately.
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var ?string $sectionId
     */
    #[JsonProperty('sectionId')]
    public ?string $sectionId;

    /**
     * @param array{
     *   heading: string,
     *   id: string,
     *   message: string,
     *   sectionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->heading = $values['heading'];
        $this->id = $values['id'];
        $this->message = $values['message'];
        $this->sectionId = $values['sectionId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
