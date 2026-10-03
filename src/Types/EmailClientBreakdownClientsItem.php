<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class EmailClientBreakdownClientsItem extends JsonSerializableType
{
    /**
     * @var value-of<EmailClientBreakdownClientsItemKey> $key `android_mail_app` covers Android apps that render mail in a WebView, such as Samsung Email. `web_browser` covers webmail, the new Outlook for Windows, and opens recorded from a link click without a tracked open. `apple_mail` also includes some apps built on Apple's WebKit, such as Outlook for Mac. `other` covers unrecognized and missing user agents.
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var string $label
     */
    #[JsonProperty('label')]
    public string $label;

    /**
     * @var int $opens
     */
    #[JsonProperty('opens')]
    public int $opens;

    /**
     * @var float $share Percentage of `totalOpens`, from 0 to 100. Not rounded.
     */
    #[JsonProperty('share')]
    public float $share;

    /**
     * @param array{
     *   key: value-of<EmailClientBreakdownClientsItemKey>,
     *   label: string,
     *   opens: int,
     *   share: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->key = $values['key'];
        $this->label = $values['label'];
        $this->opens = $values['opens'];
        $this->share = $values['share'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
