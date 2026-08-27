<?php

namespace Sequenzy\Account\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GetIntegrationGuideResponse extends JsonSerializableType
{
    /**
     * @var ?string $code
     */
    #[JsonProperty('code')]
    public ?string $code;

    /**
     * @var ?string $framework
     */
    #[JsonProperty('framework')]
    public ?string $framework;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?string $tip
     */
    #[JsonProperty('tip')]
    public ?string $tip;

    /**
     * @var ?string $useCase
     */
    #[JsonProperty('use_case')]
    public ?string $useCase;

    /**
     * @param array{
     *   code?: ?string,
     *   framework?: ?string,
     *   success?: ?bool,
     *   tip?: ?string,
     *   useCase?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->code = $values['code'] ?? null;
        $this->framework = $values['framework'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->tip = $values['tip'] ?? null;
        $this->useCase = $values['useCase'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
