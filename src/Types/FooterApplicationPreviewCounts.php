<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class FooterApplicationPreviewCounts extends JsonSerializableType
{
    /**
     * @var ?int $campaigns
     */
    #[JsonProperty('campaigns')]
    public ?int $campaigns;

    /**
     * @var ?int $sequences
     */
    #[JsonProperty('sequences')]
    public ?int $sequences;

    /**
     * @var ?int $templates
     */
    #[JsonProperty('templates')]
    public ?int $templates;

    /**
     * @var ?int $transactional
     */
    #[JsonProperty('transactional')]
    public ?int $transactional;

    /**
     * @param array{
     *   campaigns?: ?int,
     *   sequences?: ?int,
     *   templates?: ?int,
     *   transactional?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaigns = $values['campaigns'] ?? null;
        $this->sequences = $values['sequences'] ?? null;
        $this->templates = $values['templates'] ?? null;
        $this->transactional = $values['transactional'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
