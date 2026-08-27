<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Full recipient envelope for multi-recipient transactional sends, as actually sent. Null for single-recipient sends.
 */
class EmailSendAdditionalRecipients extends JsonSerializableType
{
    /**
     * @var ?array<string> $bcc
     */
    #[JsonProperty('bcc'), ArrayType(['string'])]
    public ?array $bcc;

    /**
     * @var ?array<string> $cc
     */
    #[JsonProperty('cc'), ArrayType(['string'])]
    public ?array $cc;

    /**
     * @var ?array<string> $to
     */
    #[JsonProperty('to'), ArrayType(['string'])]
    public ?array $to;

    /**
     * @param array{
     *   bcc?: ?array<string>,
     *   cc?: ?array<string>,
     *   to?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bcc = $values['bcc'] ?? null;
        $this->cc = $values['cc'] ?? null;
        $this->to = $values['to'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
