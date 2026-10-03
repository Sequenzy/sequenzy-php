<?php

namespace Sequenzy\WarehouseSync\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PreviewWarehouseQueryRequest extends JsonSerializableType
{
    /**
     * @var string $query A single SELECT or WITH statement.
     */
    #[JsonProperty('query')]
    public string $query;

    /**
     * @param array{
     *   query: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->query = $values['query'];
    }
}
