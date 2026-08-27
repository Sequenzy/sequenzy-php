<?php

namespace Sequenzy\Account\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GetIntegrationGuideRequest extends JsonSerializableType
{
    /**
     * @var ?string $framework
     */
    #[JsonProperty('framework')]
    public ?string $framework;

    /**
     * @var ?string $useCase
     */
    #[JsonProperty('use_case')]
    public ?string $useCase;

    /**
     * @param array{
     *   framework?: ?string,
     *   useCase?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->framework = $values['framework'] ?? null;
        $this->useCase = $values['useCase'] ?? null;
    }
}
