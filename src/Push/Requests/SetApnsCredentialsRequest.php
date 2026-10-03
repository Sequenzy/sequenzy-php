<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Push\Types\SetApnsCredentialsRequestEnvironment;

class SetApnsCredentialsRequest extends JsonSerializableType
{
    /**
     * @var string $bundleId Your app's bundle ID.
     */
    #[JsonProperty('bundleId')]
    public string $bundleId;

    /**
     * @var ?value-of<SetApnsCredentialsRequestEnvironment> $environment production for App Store and TestFlight builds, sandbox for Xcode development builds.
     */
    #[JsonProperty('environment')]
    public ?string $environment;

    /**
     * @var string $keyId 10-character APNs key ID.
     */
    #[JsonProperty('keyId')]
    public string $keyId;

    /**
     * @var string $privateKey Full contents of the AuthKey_XXXXXXXXXX.p8 file.
     */
    #[JsonProperty('privateKey')]
    public string $privateKey;

    /**
     * @var string $teamId 10-character Apple developer team ID.
     */
    #[JsonProperty('teamId')]
    public string $teamId;

    /**
     * @param array{
     *   bundleId: string,
     *   keyId: string,
     *   privateKey: string,
     *   teamId: string,
     *   environment?: ?value-of<SetApnsCredentialsRequestEnvironment>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->bundleId = $values['bundleId'];
        $this->environment = $values['environment'] ?? null;
        $this->keyId = $values['keyId'];
        $this->privateKey = $values['privateKey'];
        $this->teamId = $values['teamId'];
    }
}
