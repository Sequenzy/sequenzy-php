<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Union;

class SetFcmCredentialsRequest extends JsonSerializableType
{
    /**
     * @var (
     *    string
     *   |array<string, mixed>
     * ) $serviceAccount The service account JSON file from Firebase project settings > Service accounts, as a JSON object or a string. The account needs the Firebase Cloud Messaging API Admin role.
     */
    #[JsonProperty('serviceAccount'), Union('string', ['string' => 'mixed'])]
    public string|array $serviceAccount;

    /**
     * @param array{
     *   serviceAccount: (
     *    string
     *   |array<string, mixed>
     * ),
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->serviceAccount = $values['serviceAccount'];
    }
}
