<?php

namespace Sequenzy\Widgets\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Widgets\Types\SubmitCompanyScopedSavedSignupFormRequestDuplicateStrategy;

class SubmitCompanyScopedSavedSignupFormRequest extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $customAttributes Subscriber custom attributes for custom fields configured on the saved form
     */
    #[JsonProperty('customAttributes'), ArrayType(['string' => 'mixed'])]
    public ?array $customAttributes;

    /**
     * @var ?value-of<SubmitCompanyScopedSavedSignupFormRequestDuplicateStrategy> $duplicateStrategy Ignored for saved forms. Stored form settings are used.
     */
    #[JsonProperty('duplicateStrategy')]
    public ?string $duplicateStrategy;

    /**
     * @var ?string $duplicateStrategyToken Ignored for saved forms. Stored form settings are used.
     */
    #[JsonProperty('duplicateStrategyToken')]
    public ?string $duplicateStrategyToken;

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
     * @var ?array<string> $listIds Ignored for saved forms. Stored form settings are used.
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var ?array<string> $listIdsBracketed Ignored for saved forms. Stored form settings are used.
     */
    #[JsonProperty('listIds[]'), ArrayType(['string'])]
    public ?array $listIdsBracketed;

    /**
     * @var ?string $phone Subscriber phone number in E.164 or US national format, when configured on the saved form. Stored on the base subscriber profile and does not grant SMS consent.
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?string $redirectUrl Ignored for saved forms. Stored form settings are used.
     */
    #[JsonProperty('redirectUrl')]
    public ?string $redirectUrl;

    /**
     * @var ?array<string> $tagIds Ignored for saved forms. Stored form settings are used.
     */
    #[JsonProperty('tagIds'), ArrayType(['string'])]
    public ?array $tagIds;

    /**
     * @var ?array<string> $tagIdsBracketed Ignored for saved forms. Stored form settings are used.
     */
    #[JsonProperty('tagIds[]'), ArrayType(['string'])]
    public ?array $tagIdsBracketed;

    /**
     * @var ?string $website Honeypot field. Leave empty.
     */
    #[JsonProperty('website')]
    public ?string $website;

    /**
     * @param array{
     *   email: string,
     *   customAttributes?: ?array<string, mixed>,
     *   duplicateStrategy?: ?value-of<SubmitCompanyScopedSavedSignupFormRequestDuplicateStrategy>,
     *   duplicateStrategyToken?: ?string,
     *   firstName?: ?string,
     *   lastName?: ?string,
     *   listIds?: ?array<string>,
     *   listIdsBracketed?: ?array<string>,
     *   phone?: ?string,
     *   redirectUrl?: ?string,
     *   tagIds?: ?array<string>,
     *   tagIdsBracketed?: ?array<string>,
     *   website?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->duplicateStrategy = $values['duplicateStrategy'] ?? null;
        $this->duplicateStrategyToken = $values['duplicateStrategyToken'] ?? null;
        $this->email = $values['email'];
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->listIds = $values['listIds'] ?? null;
        $this->listIdsBracketed = $values['listIdsBracketed'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->redirectUrl = $values['redirectUrl'] ?? null;
        $this->tagIds = $values['tagIds'] ?? null;
        $this->tagIdsBracketed = $values['tagIdsBracketed'] ?? null;
        $this->website = $values['website'] ?? null;
    }
}
