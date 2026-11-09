<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PushTranslationResultFailedItem extends JsonSerializableType
{
    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $locale
     */
    #[JsonProperty('locale')]
    public ?string $locale;

    /**
     * @param array{
     *   error?: ?string,
     *   locale?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->error = $values['error'] ?? null;
        $this->locale = $values['locale'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
