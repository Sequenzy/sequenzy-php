<?php

namespace Sequenzy\Push\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\PushTranslationResult;
use Sequenzy\Types\PushLocalization;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\PushTranslationResultFailedItem;
use Sequenzy\Types\PushTranslationResultSkippedItem;

class TranslatePushContentResponse extends JsonSerializableType
{
    use PushTranslationResult;

    /**
     * @var ?array<PushLocalization> $localizations Every version, the ones passed in plus the new translations.
     */
    #[JsonProperty('localizations'), ArrayType([PushLocalization::class])]
    public ?array $localizations;

    /**
     * @param array{
     *   failed?: ?array<PushTranslationResultFailedItem>,
     *   message?: ?string,
     *   skipped?: ?array<PushTranslationResultSkippedItem>,
     *   success?: ?bool,
     *   translated?: ?array<string>,
     *   localizations?: ?array<PushLocalization>,
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
        $this->localizations = $values['localizations'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
