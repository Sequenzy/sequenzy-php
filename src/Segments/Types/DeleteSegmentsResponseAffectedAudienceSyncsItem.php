<?php

namespace Sequenzy\Segments\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class DeleteSegmentsResponseAffectedAudienceSyncsItem extends JsonSerializableType
{
    /**
     * @var ?string $audienceName
     */
    #[JsonProperty('audienceName')]
    public ?string $audienceName;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @param array{
     *   audienceName?: ?string,
     *   id?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->audienceName = $values['audienceName'] ?? null;
        $this->id = $values['id'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
