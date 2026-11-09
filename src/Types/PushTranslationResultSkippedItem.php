<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PushTranslationResultSkippedItem extends JsonSerializableType
{
    /**
     * @var ?string $locale
     */
    #[JsonProperty('locale')]
    public ?string $locale;

    /**
     * @var ?value-of<PushTranslationResultSkippedItemReason> $reason up_to_date - an AI version of the current main copy exists; edited - a person wrote it (pass overwrite to replace it).
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   locale?: ?string,
     *   reason?: ?value-of<PushTranslationResultSkippedItemReason>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locale = $values['locale'] ?? null;
        $this->reason = $values['reason'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
