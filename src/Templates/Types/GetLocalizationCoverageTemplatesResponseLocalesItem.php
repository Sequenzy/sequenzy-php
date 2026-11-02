<?php

namespace Sequenzy\Templates\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GetLocalizationCoverageTemplatesResponseLocalesItem extends JsonSerializableType
{
    /**
     * @var ?int $edited Translations someone edited by hand that match the current original.
     */
    #[JsonProperty('edited')]
    public ?int $edited;

    /**
     * @var ?int $failed The last translation failed, or one stayed queued for over six hours. Subscribers in this language get the fallback language.
     */
    #[JsonProperty('failed')]
    public ?int $failed;

    /**
     * @var ?string $locale Enabled non-primary locale code.
     */
    #[JsonProperty('locale')]
    public ?string $locale;

    /**
     * @var ?int $missing No translation yet. Subscribers in this language get the fallback language.
     */
    #[JsonProperty('missing')]
    public ?int $missing;

    /**
     * @var ?int $outdated Translated before the original changed (status stale). These still send.
     */
    #[JsonProperty('outdated')]
    public ?int $outdated;

    /**
     * @var ?int $total Emails that should have this translation.
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @var ?int $translating Queued or being translated (status syncing).
     */
    #[JsonProperty('translating')]
    public ?int $translating;

    /**
     * @var ?int $upToDate Translated from the current original.
     */
    #[JsonProperty('upToDate')]
    public ?int $upToDate;

    /**
     * @param array{
     *   edited?: ?int,
     *   failed?: ?int,
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
        $this->failed = $values['failed'] ?? null;
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
