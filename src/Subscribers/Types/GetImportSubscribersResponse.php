<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SubscriberImport;
use Sequenzy\Core\Json\JsonProperty;

class GetImportSubscribersResponse extends JsonSerializableType
{
    /**
     * @var ?SubscriberImport $import
     */
    #[JsonProperty('import')]
    public ?SubscriberImport $import;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   import?: ?SubscriberImport,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->import = $values['import'] ?? null;
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
