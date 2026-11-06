<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class AddPushImportRowsRequest extends JsonSerializableType
{
    /**
     * @var string $csv
     */
    #[JsonProperty('csv')]
    public string $csv;

    /**
     * @param array{
     *   csv: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->csv = $values['csv'];
    }
}
