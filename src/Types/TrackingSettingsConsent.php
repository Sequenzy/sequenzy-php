<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Signup consent settings, as opposed to engagement measurement.
 */
class TrackingSettingsConsent extends JsonSerializableType
{
    /**
     * @var ?string $doubleOptInEmailId Confirmation email sent to pending contacts. Null when double opt-in has never been enabled; enabling it provisions one automatically.
     */
    #[JsonProperty('doubleOptInEmailId')]
    public ?string $doubleOptInEmailId;

    /**
     * @var ?bool $doubleOptInEnabled Whether new contacts must confirm by email before they become subscribed. When on, contacts added by forms, the API, and integrations start pending and are never sent marketing email until they confirm.
     */
    #[JsonProperty('doubleOptInEnabled')]
    public ?bool $doubleOptInEnabled;

    /**
     * @var ?string $doubleOptInRedirectUrl Where the hosted confirmation page sends subscribers after they confirm. Null keeps them on the branded confirmation page.
     */
    #[JsonProperty('doubleOptInRedirectUrl')]
    public ?string $doubleOptInRedirectUrl;

    /**
     * @param array{
     *   doubleOptInEmailId?: ?string,
     *   doubleOptInEnabled?: ?bool,
     *   doubleOptInRedirectUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->doubleOptInEmailId = $values['doubleOptInEmailId'] ?? null;
        $this->doubleOptInEnabled = $values['doubleOptInEnabled'] ?? null;
        $this->doubleOptInRedirectUrl = $values['doubleOptInRedirectUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
