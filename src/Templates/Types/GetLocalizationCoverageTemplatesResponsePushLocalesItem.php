<?php

namespace Sequenzy\Templates\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GetLocalizationCoverageTemplatesResponsePushLocalesItem extends JsonSerializableType
{
    /**
     * @var ?int $edited Written by a person.
     */
    #[JsonProperty('edited')]
    public ?int $edited;

    /**
     * @var ?string $locale
     */
    #[JsonProperty('locale')]
    public ?string $locale;

    /**
     * @var ?int $missing No version yet. Devices in this language get the main copy.
     */
    #[JsonProperty('missing')]
    public ?int $missing;

    /**
     * @var ?int $outdated Translated before the main title or message changed. Still sends.
     */
    #[JsonProperty('outdated')]
    public ?int $outdated;

    /**
     * @var ?int $total
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @var ?int $translating Queued or being translated.
     */
    #[JsonProperty('translating')]
    public ?int $translating;

    /**
     * @var ?int $upToDate
     */
    #[JsonProperty('upToDate')]
    public ?int $upToDate;

    /**
     * @param array{
     *   edited?: ?int,
     *   locale?: ?string,
     *   missing?: ?int,
     *   outdated?: ?int,
     *   total?: ?int,
     *   translating?: ?int,
     *   upToDate?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->edited = $values['edited'] ?? null;
        $this->locale = $values['locale'] ?? null;
        $this->missing = $values['missing'] ?? null;
        $this->outdated = $values['outdated'] ?? null;
        $this->total = $values['total'] ?? null;
        $this->translating = $values['translating'] ?? null;
        $this->upToDate = $values['upToDate'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
