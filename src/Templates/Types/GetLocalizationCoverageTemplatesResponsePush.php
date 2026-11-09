<?php

namespace Sequenzy\Templates\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Push steps in sequences that are not archived or defined in code. A failed push translation counts as missing again, so there is no failed count.
 */
class GetLocalizationCoverageTemplatesResponsePush extends JsonSerializableType
{
    /**
     * @var ?array<GetLocalizationCoverageTemplatesResponsePushLocalesItem> $locales
     */
    #[JsonProperty('locales'), ArrayType([GetLocalizationCoverageTemplatesResponsePushLocalesItem::class])]
    public ?array $locales;

    /**
     * @var ?int $totalPushes Push steps that should be translated.
     */
    #[JsonProperty('totalPushes')]
    public ?int $totalPushes;

    /**
     * @param array{
     *   locales?: ?array<GetLocalizationCoverageTemplatesResponsePushLocalesItem>,
     *   totalPushes?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locales = $values['locales'] ?? null;
        $this->totalPushes = $values['totalPushes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
