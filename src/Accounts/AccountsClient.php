<?php

namespace Sequenzy\Accounts;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Accounts\Requests\AcceptSuggestionsAccountsRequest;
use Sequenzy\Types\AccountSuggestionsAcceptResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Accounts\Requests\AddMemberAccountsRequest;
use Sequenzy\Types\AccountMemberChangeResponse;
use Sequenzy\Accounts\Requests\AccountOrganizationIdKey;
use Sequenzy\Accounts\Types\CreateFromOrganizationIdAccountsResponse;
use Sequenzy\Accounts\Types\DeleteAccountsResponse;
use Sequenzy\Accounts\Types\DetectOrganizationIdsAccountsResponse;
use Sequenzy\Accounts\Types\GetByExternalIdAccountsResponse;
use Sequenzy\Accounts\Types\GetOrganizationIdJobAccountsResponse;
use Sequenzy\Accounts\Requests\ListAccountsRequest;
use Sequenzy\Accounts\Types\ListAccountsResponse;
use Sequenzy\Accounts\Requests\ListEventsAccountsRequest;
use Sequenzy\Accounts\Types\ListEventsAccountsResponse;
use Sequenzy\Accounts\Requests\ListMembersAccountsRequest;
use Sequenzy\Accounts\Types\ListMembersAccountsResponse;
use Sequenzy\Accounts\Requests\ListSuggestionsAccountsRequest;
use Sequenzy\Accounts\Types\ListSuggestionsAccountsResponse;
use Sequenzy\Accounts\Requests\PreviewFromOrganizationIdAccountsRequest;
use Sequenzy\Accounts\Types\PreviewFromOrganizationIdAccountsResponse;
use Sequenzy\Accounts\Requests\RemoveMemberAccountsRequest;
use Sequenzy\Accounts\Types\RemoveMemberAccountsResponse;
use Sequenzy\Accounts\Requests\TriggerEventAccountsRequest;
use Sequenzy\Accounts\Types\TriggerEventAccountsResponse;
use Sequenzy\Accounts\Requests\AccountPatchInput;
use Sequenzy\Accounts\Types\UpdateAccountsResponse;
use Sequenzy\Accounts\Requests\AccountUpsertInput;
use Sequenzy\Types\AccountUpsertResponse;

class AccountsClient
{
    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param RawClient $client
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        RawClient $client,
        ?array $options = null,
    ) {
        $this->client = $client;
        $this->options = $options ?? [];
    }

    /**
     * Creates an account for each domain (external ID and domain set to the domain, name derived from it) and adds the domain's contacts that belong to no account as members. When one account already uses the domain as its domain or external ID, contacts are added to it instead; with several, the domain is skipped (`multiple_accounts`). A domain whose contacts already partly belong to another account is skipped (`already_in_account`) so an organization is not duplicated. Domains without eligible contacts are skipped (`no_contacts`). Existing roles, names and domains are kept, no sync rules run, segment-entered sequences are not triggered, and retries are safe. Accounts hold at most 5,000 members, the attribute fan-out limit; `truncated` reports contacts left out.
     *
     * Example:
     * ```php
     * $client->accounts->acceptSuggestions(
     *     new AcceptSuggestionsAccountsRequest([
     *         'domains' => [
     *             'domains',
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param AcceptSuggestionsAccountsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?AccountSuggestionsAcceptResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function acceptSuggestions(AcceptSuggestionsAccountsRequest $request, ?array $options = null): ?AccountSuggestionsAcceptResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "account-suggestions",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return AccountSuggestionsAcceptResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Adds a contact to the account (creating the contact when `email` is new). Re-adding an existing member with a role updates it; without a role keeps the current one.
     *
     * Example:
     * ```php
     * $client->accounts->addMember(
     *     'externalId',
     *     new AddMemberAccountsRequest([]),
     * );
     * ```
     *
     * @param string $externalIdPathParam
     * @param AddMemberAccountsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?AccountMemberChangeResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function addMember(string $externalIdPathParam, AddMemberAccountsRequest $request = new AddMemberAccountsRequest(), ?array $options = null): ?AccountMemberChangeResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "accounts/{$externalIdPathParam}/members",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return AccountMemberChangeResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Starts a background job that creates one account per distinct value of `propertyKey` and adds each contact seen with that value as a `member`. Accounts are named from `nameKey` when set, otherwise after the work email domain most of their contacts share; existing names, domains and roles are kept. No emails are sent, no sync rules run and segment-entered sequences are not triggered. A run already queued or running for the same key is returned with `alreadyRunning` set instead of starting another; its `job.settings` show the source and name key it uses. Reruns are safe. Accounts is turned on before the job is queued and stays on even if the job fails.
     *
     * Example:
     * ```php
     * $client->accounts->createFromOrganizationId(
     *     new AccountOrganizationIdKey([
     *         'propertyKey' => 'propertyKey',
     *     ]),
     * );
     * ```
     *
     * @param AccountOrganizationIdKey $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateFromOrganizationIdAccountsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createFromOrganizationId(AccountOrganizationIdKey $request, ?array $options = null): ?CreateFromOrganizationIdAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "account-suggestions/organization-ids",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return CreateFromOrganizationIdAccountsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Deletes the account and its memberships. Contacts are kept; their `account.*` attributes are cleared.
     *
     * Example:
     * ```php
     * $client->accounts->delete(
     *     'externalId',
     * );
     * ```
     *
     * @param string $externalId Customer-owned organization ID (URL-encode slashes).
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteAccountsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function delete(string $externalId, ?array $options = null): ?DeleteAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "accounts/{$externalId}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return DeleteAccountsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Finds event properties from the last 180 days (such as `workspaceId` or `organization_id`) and contact attributes (such as `account_id`) that look like your own organization ID, so you can create accounts from data you already send. Most useful first. Read-only; preview a candidate before creating accounts from it.
     *
     * Example:
     * ```php
     * $client->accounts->detectOrganizationIds();
     * ```
     *
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DetectOrganizationIdsAccountsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function detectOrganizationIds(?array $options = null): ?DetectOrganizationIdsAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "account-suggestions/organization-ids",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return DetectOrganizationIdsAccountsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Returns the account and up to 100 members, owners first.
     *
     * Example:
     * ```php
     * $client->accounts->getByExternalId(
     *     'externalId',
     * );
     * ```
     *
     * @param string $externalId Customer-owned organization ID (URL-encode slashes).
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetByExternalIdAccountsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getByExternalId(string $externalId, ?array $options = null): ?GetByExternalIdAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "accounts/{$externalId}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return GetByExternalIdAccountsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Reports a job started by `POST /account-suggestions/organization-ids`. Finished jobs are kept for a limited time, after which this returns 404; the accounts stay.
     *
     * Example:
     * ```php
     * $client->accounts->getOrganizationIdJob(
     *     'jobId',
     * );
     * ```
     *
     * @param string $jobId The `jobId` returned when the job started, URL-encoded.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetOrganizationIdJobAccountsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getOrganizationIdJob(string $jobId, ?array $options = null): ?GetOrganizationIdJobAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "account-suggestions/organization-ids/jobs/{$jobId}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return GetOrganizationIdJobAccountsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Lists the B2B accounts (organizations) in the workspace. Search matches name, external ID and domain. Sort with `sort` (updatedAt, createdAt, name, memberCount, lastEventAt) and `order` (asc, desc).
     *
     * Example:
     * ```php
     * $client->accounts->list(
     *     new ListAccountsRequest([]),
     * );
     * ```
     *
     * @param ListAccountsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListAccountsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function list(ListAccountsRequest $request = new ListAccountsRequest(), ?array $options = null): ?ListAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->order != null) {
            $query['order'] = $request->order;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->search != null) {
            $query['search'] = $request->search;
        }
        if ($request->sort != null) {
            $query['sort'] = $request->sort;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "accounts",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ListAccountsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Recent events recorded on the account timeline, newest first (maximum 500).
     *
     * Example:
     * ```php
     * $client->accounts->listEvents(
     *     'externalId',
     *     new ListEventsAccountsRequest([]),
     * );
     * ```
     *
     * @param string $externalId
     * @param ListEventsAccountsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListEventsAccountsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listEvents(string $externalId, ListEventsAccountsRequest $request = new ListEventsAccountsRequest(), ?array $options = null): ?ListEventsAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "accounts/{$externalId}/events",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ListEventsAccountsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Lists the contacts that belong to the account with their role. Owners first, then admins, then members.
     *
     * Example:
     * ```php
     * $client->accounts->listMembers(
     *     'externalId',
     *     new ListMembersAccountsRequest([]),
     * );
     * ```
     *
     * @param string $externalId
     * @param ListMembersAccountsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListMembersAccountsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listMembers(string $externalId, ListMembersAccountsRequest $request = new ListMembersAccountsRequest(), ?array $options = null): ?ListMembersAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "accounts/{$externalId}/members",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ListMembersAccountsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Suggests accounts from work email domains that several contacts share, with up to 10 sample emails each. Personal and disposable providers (gmail.com, outlook.com, yopmail.com, ...), the workspace's own sending domains and their subdomains, domains where any contact already belongs to an account, and domains an account already uses (as its domain or external ID) are skipped. Largest domains first. Read-only; nothing is created until you accept a suggestion.
     *
     * Example:
     * ```php
     * $client->accounts->listSuggestions(
     *     new ListSuggestionsAccountsRequest([]),
     * );
     * ```
     *
     * @param ListSuggestionsAccountsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSuggestionsAccountsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listSuggestions(ListSuggestionsAccountsRequest $request = new ListSuggestionsAccountsRequest(), ?array $options = null): ?ListSuggestionsAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->minContacts != null) {
            $query['minContacts'] = $request->minContacts;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "account-suggestions",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ListSuggestionsAccountsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Shows the biggest organizations that creating accounts from `propertyKey` would make, with the name each account would get and sample contacts. Read-only.
     *
     * Example:
     * ```php
     * $client->accounts->previewFromOrganizationId(
     *     new PreviewFromOrganizationIdAccountsRequest([
     *         'propertyKey' => 'propertyKey',
     *     ]),
     * );
     * ```
     *
     * @param PreviewFromOrganizationIdAccountsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PreviewFromOrganizationIdAccountsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function previewFromOrganizationId(PreviewFromOrganizationIdAccountsRequest $request, ?array $options = null): ?PreviewFromOrganizationIdAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['propertyKey'] = $request->propertyKey;
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->nameKey != null) {
            $query['nameKey'] = $request->nameKey;
        }
        if ($request->source != null) {
            $query['source'] = $request->source;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "account-suggestions/organization-ids/preview",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return PreviewFromOrganizationIdAccountsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Removes a contact from the account. The contact is kept; its `account.*` attributes are cleared or replaced by another account it belongs to.
     *
     * Example:
     * ```php
     * $client->accounts->removeMember(
     *     'externalId',
     *     new RemoveMemberAccountsRequest([]),
     * );
     * ```
     *
     * @param string $externalIdPathParam
     * @param RemoveMemberAccountsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RemoveMemberAccountsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function removeMember(string $externalIdPathParam, RemoveMemberAccountsRequest $request = new RemoveMemberAccountsRequest(), ?array $options = null): ?RemoveMemberAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "accounts/{$externalIdPathParam}/members",
                    method: HttpMethod::DELETE,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return RemoveMemberAccountsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Records an event on the account timeline and delivers it as a contact event to the chosen recipients (`owners` by default, falling back to admins when there is no owner; `admins` includes owners; `all` every member; `none` records only). Each delivery runs the normal event pipeline with `event.account.*` properties. Pass `eventId` to make retries idempotent. Retries reuse the original recipients and event data, skip completed deliveries, and resume failed work without duplicating events or sequence enrollments.
     *
     * Example:
     * ```php
     * $client->accounts->triggerEvent(
     *     'externalId',
     *     new TriggerEventAccountsRequest([
     *         'event' => 'trial_ending',
     *     ]),
     * );
     * ```
     *
     * @param string $externalId
     * @param TriggerEventAccountsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?TriggerEventAccountsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function triggerEvent(string $externalId, TriggerEventAccountsRequest $request, ?array $options = null): ?TriggerEventAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "accounts/{$externalId}/events",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return TriggerEventAccountsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Updates name, domain and attributes of an existing account. Returns 404 when the account does not exist.
     *
     * Example:
     * ```php
     * $client->accounts->update(
     *     'externalId',
     *     new AccountPatchInput([]),
     * );
     * ```
     *
     * @param string $externalId Customer-owned organization ID (URL-encode slashes).
     * @param AccountPatchInput $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateAccountsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function update(string $externalId, AccountPatchInput $request = new AccountPatchInput(), ?array $options = null): ?UpdateAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "accounts/{$externalId}",
                    method: HttpMethod::PATCH,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return UpdateAccountsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Upserts an account by its customer-owned externalId. Attributes merge into the stored attributes (null deletes a key; replaceAttributes replaces them all). Optional members are added in the same call. Account attributes fan out to every member for segments and `{{account.*}}` merge tags.
     *
     * Example:
     * ```php
     * $client->accounts->upsert(
     *     new AccountUpsertInput([
     *         'externalId' => 'org_123',
     *     ]),
     * );
     * ```
     *
     * @param AccountUpsertInput $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?AccountUpsertResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function upsert(AccountUpsertInput $request, ?array $options = null): ?AccountUpsertResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "accounts",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return AccountUpsertResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
