<?php

namespace Sequenzy\Widgets\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SubmitSavedPopupRequest extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $customAttributes Subscriber custom attributes for custom fields configured on the popup
     */
    #[JsonProperty('customAttributes'), ArrayType(['string' => 'mixed'])]
    public ?array $customAttributes;

    /**
     * @var string $email Subscriber email address
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var ?string $firstName
     */
    #[JsonProperty('firstName')]
    public ?string $firstName;

    /**
     * @var ?string $lastName
     */
    #[JsonProperty('lastName')]
    public ?string $lastName;

    /**
     * @var ?string $phone Subscriber phone number in E.164 or US national format, when configured on the popup. Stored on the base subscriber profile and does not grant SMS consent.
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?string $sequenzyBotCheckToken Cloudflare Turnstile token that the hosted embed script and popups add automatically when the form or popup has bot protection on. Custom integrations cannot obtain one. When bot protection is on, submissions without a valid token must confirm by email before they are subscribed; if the workspace's confirmation email or sender was removed after bot protection was turned on, they return `400` with a retry message instead. Ignored when bot protection is off.
     */
    #[JsonProperty('sequenzyBotCheckToken')]
    public ?string $sequenzyBotCheckToken;

    /**
     * @var ?string $sequenzyToken Signed bot-protection token that Sequenzy's hosted embed script and popups add automatically. Custom integrations can omit it. Submissions without a valid token may be asked to confirm by email. Workspaces with strict protection ignore submissions without a token, or with a token for a different form or popup, and return the normal success response.
     */
    #[JsonProperty('sequenzyToken')]
    public ?string $sequenzyToken;

    /**
     * @var ?string $website Honeypot field. Leave empty.
     */
    #[JsonProperty('website')]
    public ?string $website;

    /**
     * @param array{
     *   email: string,
     *   customAttributes?: ?array<string, mixed>,
     *   firstName?: ?string,
     *   lastName?: ?string,
     *   phone?: ?string,
     *   sequenzyBotCheckToken?: ?string,
     *   sequenzyToken?: ?string,
     *   website?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->email = $values['email'];
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->sequenzyBotCheckToken = $values['sequenzyBotCheckToken'] ?? null;
        $this->sequenzyToken = $values['sequenzyToken'] ?? null;
        $this->website = $values['website'] ?? null;
    }
}
