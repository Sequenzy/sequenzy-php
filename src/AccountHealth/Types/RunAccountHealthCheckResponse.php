<?php

namespace Sequenzy\AccountHealth\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\AccountHealthRun;

class RunAccountHealthCheckResponse extends JsonSerializableType
{
    /**
     * @var ?bool $alreadyInProgress
     */
    #[JsonProperty('alreadyInProgress')]
    public ?bool $alreadyInProgress;

    /**
     * @var ?AccountHealthRun $run
     */
    #[JsonProperty('run')]
    public ?AccountHealthRun $run;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   alreadyInProgress?: ?bool,
     *   run?: ?AccountHealthRun,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->alreadyInProgress = $values['alreadyInProgress'] ?? null;
        $this->run = $values['run'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
