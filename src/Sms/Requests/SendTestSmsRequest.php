<?php

namespace Sequenzy\Sms\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SendTestSmsRequest extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $blocks SMS content blocks (text + image subset). Provide text or blocks, not both.
     */
    #[JsonProperty('blocks'), ArrayType([['string' => 'mixed']])]
    public ?array $blocks;

    /**
     * @var ?array<string> $imageUrls Up to 2 publicly reachable image URLs sent as MMS media (US/CA only).
     */
    #[JsonProperty('imageUrls'), ArrayType(['string'])]
    public ?array $imageUrls;

    /**
     * @var ?string $text Plain-text message body. Provide text or blocks, not both.
     */
    #[JsonProperty('text')]
    public ?string $text;

    /**
     * @var string $to Destination phone number in international E.164 format.
     */
    #[JsonProperty('to')]
    public string $to;

    /**
     * @param array{
     *   to: string,
     *   blocks?: ?array<array<string, mixed>>,
     *   imageUrls?: ?array<string>,
     *   text?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->imageUrls = $values['imageUrls'] ?? null;
        $this->text = $values['text'] ?? null;
        $this->to = $values['to'];
    }
}
