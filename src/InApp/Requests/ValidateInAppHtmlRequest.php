<?php

namespace Sequenzy\InApp\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ValidateInAppHtmlRequest extends JsonSerializableType
{
    /**
     * @var string $html The document (HTML, CSS and JavaScript).
     */
    #[JsonProperty('html')]
    public string $html;

    /**
     * @param array{
     *   html: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->html = $values['html'];
    }
}
