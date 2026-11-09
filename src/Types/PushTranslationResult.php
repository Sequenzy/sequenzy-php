<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class PushTranslationResult extends JsonSerializableType
{
    /**
     * @var ?array<PushTranslationResultFailedItem> $failed Languages the model could not translate. The others are still returned or saved; retry these.
     */
    #[JsonProperty('failed'), ArrayType([PushTranslationResultFailedItem::class])]
    public ?array $failed;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?array<PushTranslationResultSkippedItem> $skipped Languages left as they were.
     */
    #[JsonProperty('skipped'), ArrayType([PushTranslationResultSkippedItem::class])]
    public ?array $skipped;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<string> $translated Languages translated by this request.
     */
    #[JsonProperty('translated'), ArrayType(['string'])]
    public ?array $translated;

    /**
     * @param array{
     *   failed?: ?array<PushTranslationResultFailedItem>,
     *   message?: ?string,
     *   skipped?: ?array<PushTranslationResultSkippedItem>,
     *   success?: ?bool,
     *   translated?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->failed = $values['failed'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->skipped = $values['skipped'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->translated = $values['translated'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
