<?php

namespace Sequenzy\Traits;

use Sequenzy\Types\PushTranslationResultFailedItem;
use Sequenzy\Types\PushTranslationResultSkippedItem;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * @property ?array<PushTranslationResultFailedItem> $failed
 * @property ?string $message
 * @property ?array<PushTranslationResultSkippedItem> $skipped
 * @property ?bool $success
 * @property ?array<string> $translated
 */
trait PushTranslationResult
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
}
