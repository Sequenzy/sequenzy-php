# Reference
## AbTests
<details><summary><code>$client-&gt;abTests-&gt;addVariant($abTestId, $request) -> ?AddVariantAbTestsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Adds a variant to a draft campaign or sequence A/B test. Sequence variants receive an independent email template. The body defaults to the control email when blocks are omitted. Sequence tests whose parent sequence is active require confirmLiveChange.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->abTests->addVariant(
    'abTestId',
    new AddVariantAbTestsRequest([
        'subject' => 'subject',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$abTestId:** `string` — A/B test ID.
    
</dd>
</dl>

<dl>
<dd>

**$blocks:** `?array` — Variant body blocks. Defaults to the campaign or sequence control email blocks.
    
</dd>
</dl>

<dl>
<dd>

**$confirmLiveChange:** `?bool` — Required as true when the A/B test belongs to an active sequence, because new variants immediately enter the live rotation.
    
</dd>
</dl>

<dl>
<dd>

**$previewText:** `?string` — Variant preview text.
    
</dd>
</dl>

<dl>
<dd>

**$subject:** `string` — Variant subject line.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;abTests-&gt;create($request) -> ?CreateAbTestsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a draft campaign A/B test or converts a sequence email node to action_ab_test. Provide exactly one owner. Variant A is copied into an independent email for sequences; sequence conversions require at least one extra variant.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->abTests->create(
    new CreateAbTestsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$automationNodeId:** `?string` — Sequence action_email node to convert. Mutually exclusive with campaignId.
    
</dd>
</dl>

<dl>
<dd>

**$campaignId:** `?string` — Campaign to attach the test to. Must be in draft or rejected status. Mutually exclusive with automationNodeId.
    
</dd>
</dl>

<dl>
<dd>

**$confirmLiveChange:** `?bool` — Must be true when converting an email node in an active sequence.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Test name. Defaults to "A/B Test for <campaign name>".
    
</dd>
</dl>

<dl>
<dd>

**$testDurationMinutes:** `?int` — Campaign-only duration before winner selection. Sequence tests select after winnerThreshold recipients.
    
</dd>
</dl>

<dl>
<dd>

**$testPercentage:** `?int` — Campaign-only share of the audience that receives test sends. Sequence tests use winnerThreshold.
    
</dd>
</dl>

<dl>
<dd>

**$testType:** `?string` — Sequence variant strategy. Subject defaults to open_rate and content defaults to click_rate unless winnerCriteria is explicit.
    
</dd>
</dl>

<dl>
<dd>

**$variants:** `?array` — Extra variants beyond the control. Required (min 1) when converting with automationNodeId. Total variants cannot exceed 5.
    
</dd>
</dl>

<dl>
<dd>

**$winnerCriteria:** `?string` — Metric used to pick the winner. For sequence tests, an explicit value overrides the testType default.
    
</dd>
</dl>

<dl>
<dd>

**$winnerThreshold:** `?int` — Number of sequence recipients in the test sample.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;abTests-&gt;delete($abTestId) -> ?DeleteAbTestsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a campaign A/B test and its variants. Running tests cannot be deleted, and the linked campaign must be in draft or rejected status.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->abTests->delete(
    'abTestId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$abTestId:** `string` — A/B test ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;abTests-&gt;deleteVariant($abTestId, $variantId, $request) -> ?DeleteVariantAbTestsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Removes a variant from a draft campaign or sequence A/B test. The control variant A cannot be deleted, and at least 2 variants must remain. Deleting a sequence variant also deletes its dedicated email template; sequence tests whose parent sequence is active require confirmLiveChange.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->abTests->deleteVariant(
    'abTestId',
    'variantId',
    new DeleteVariantAbTestsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$abTestId:** `string` — A/B test ID.
    
</dd>
</dl>

<dl>
<dd>

**$variantId:** `string` — Variant ID.
    
</dd>
</dl>

<dl>
<dd>

**$confirmLiveChange:** `?bool` — Required as true when the A/B test belongs to an active sequence, because deletion immediately changes the live rotation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;abTests-&gt;get($abTestId) -> ?GetAbTestsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns one A/B test with variants and variant localization status.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->abTests->get(
    'abTestId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$abTestId:** `string` — A/B test ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;abTests-&gt;getStats($abTestId, $request) -> ?GetStatsAbTestsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns aggregate and per-variant engagement stats for an A/B test.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->abTests->getStats(
    'abTestId',
    new GetStatsAbTestsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$abTestId:** `string` — A/B test ID.
    
</dd>
</dl>

<dl>
<dd>

**$end:** `?DateTime` — Custom range end. Requires start.
    
</dd>
</dl>

<dl>
<dd>

**$includeMachineEngagement:** `?bool` — Include detected scanner, preview, and tracked asset open/click events.
    
</dd>
</dl>

<dl>
<dd>

**$period:** `?string` — Optional period filter.
    
</dd>
</dl>

<dl>
<dd>

**$start:** `?DateTime` — Custom range start. Requires end.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;abTests-&gt;list($request) -> ?ListAbTestsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists A/B tests and variants for the authenticated company, optionally filtered by sequence.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->abTests->list(
    new ListAbTestsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `?string` — Optional sequence ID filter for automation A/B tests.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;abTests-&gt;restart($abTestId, $request) -> ?RestartAbTestsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Starts a new draft sequence A/B test from the selected control variant after a winner has been selected. The new test becomes active after generated variants are ready.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->abTests->restart(
    'abTestId',
    new RestartAbTestsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$abTestId:** `string` — A/B test ID to restart.
    
</dd>
</dl>

<dl>
<dd>

**$sourceVariantId:** `?string` — Variant ID to use as the new control email. Defaults to the selected winner.
    
</dd>
</dl>

<dl>
<dd>

**$testType:** `?string` — Test type for generated variants.
    
</dd>
</dl>

<dl>
<dd>

**$variantCount:** `?int` — Total variants including the control.
    
</dd>
</dl>

<dl>
<dd>

**$winnerThreshold:** `?int` — Subscribers before selecting a winner.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;abTests-&gt;selectWinner($abTestId, $request) -> ?SelectWinnerAbTestsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Selects a winner for a campaign A/B test in the testing phase and queues the winning variant for the remaining audience.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->abTests->selectWinner(
    'abTestId',
    new SelectWinnerAbTestsRequest([
        'variantId' => 'variantId',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$abTestId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$variantId:** `string` — Variant to select as the winner.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;abTests-&gt;update($abTestId, $request) -> ?UpdateAbTestsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates a draft campaign test or the effective settings for a sequence test. Campaigns use testPercentage and testDurationMinutes; sequences use testType and winnerThreshold. Sequence changes that affect a live or already-used test require confirmLiveChange.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->abTests->update(
    'abTestId',
    new UpdateAbTestsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$abTestId:** `string` — A/B test ID.
    
</dd>
</dl>

<dl>
<dd>

**$confirmLiveChange:** `?bool` — Required when sequence settings affect an active test or a test with recorded activity.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$testDurationMinutes:** `?int` — Campaign-only test duration.
    
</dd>
</dl>

<dl>
<dd>

**$testPercentage:** `?int` — Campaign-only test audience percentage.
    
</dd>
</dl>

<dl>
<dd>

**$testType:** `?string` — Sequence-only variant strategy.
    
</dd>
</dl>

<dl>
<dd>

**$winnerCriteria:** `?string` — Winner metric for campaign or sequence tests.
    
</dd>
</dl>

<dl>
<dd>

**$winnerThreshold:** `?int` — Sequence-only recipient threshold.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;abTests-&gt;updateVariant($abTestId, $variantId, $request) -> ?UpdateVariantAbTestsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates an A/B test variant's subject, preview text, or body content. Campaign variants remain editable only while the test is in draft. Sequence variants can be edited later with confirmLiveChange when the sequence is active, the test is no longer a draft, or the test has recorded activity; earlier sends remain unchanged, so combined results may no longer be accurate.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->abTests->updateVariant(
    'abTestId',
    'variantId',
    new UpdateVariantAbTestsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$abTestId:** `string` — A/B test ID.
    
</dd>
</dl>

<dl>
<dd>

**$variantId:** `string` — Variant ID.
    
</dd>
</dl>

<dl>
<dd>

**$confirmLiveChange:** `?bool` — Required as true when the sequence is active, the test is no longer a draft, or the test has recorded activity. Earlier sends remain unchanged, so combined results may no longer be accurate.
    
</dd>
</dl>

<dl>
<dd>

**$previewText:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$subject:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Account
<details><summary><code>$client-&gt;account-&gt;createApiKey($request) -> ?CreateApiKeyResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a company-scoped API key. The caller must have the `api_keys:manage` permission. Account-scoped keys select the target company with the x-company-id header; companyId in the JSON body is not a supported selector. The plain key is returned only once.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->createApiKey(
    new CreateApiKeyRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `?string` — Human-readable key name.
    
</dd>
</dl>

<dl>
<dd>

**$preset:** `?string` — Permission preset to apply when scopes is omitted. Defaults to full_access. Full-access keys are stored with scopes set to null, meaning all current and future permissions.
    
</dd>
</dl>

<dl>
<dd>

**$scopes:** `?array` — Explicit permission scopes for the new key. Overrides preset when provided.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;get() -> ?GetAccountResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the companies available to the authenticated API key, the currently selected company, and a read-only summary of the key's own permissions.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->get();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;getIntegrationGuide($request) -> ?GetIntegrationGuideResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a framework-specific code example and implementation tip for common integration use cases.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->getIntegrationGuide(
    new GetIntegrationGuideRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$framework:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$useCase:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;listApiKeys() -> ?ListApiKeysResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists company-scoped API keys as non-secret metadata. The caller must have the `api_keys:manage` permission. Account-scoped keys select the company with the x-company-id header. Plain key values and stored hashes are never returned.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->listApiKeys();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;requestApiKeyHandoff($request) -> ?RequestApiKeyHandoffResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Builds a dashboard link that opens the create-key form prefilled with a suggested name and permissions. Requires only `account:read`, because it creates nothing, changes nothing, and returns no secret - the new key is issued in the owner's authenticated browser session. Use it when key management is blocked because the calling key lacks `api_keys:manage`, which cannot be granted through the API by the key that is missing it. Pass replaceApiKeyId to rotate; the dashboard then offers to revoke the predecessor once the replacement exists.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->requestApiKeyHandoff(
    new RequestApiKeyHandoffRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `?string` — Suggested name for the new key. Trimmed to 80 characters in the link.
    
</dd>
</dl>

<dl>
<dd>

**$preset:** `?string` — Suggested permission preset.
    
</dd>
</dl>

<dl>
<dd>

**$replaceApiKeyId:** `?string` — ID of the key the new one replaces. Pass the literal string "current" for the key making the request.
    
</dd>
</dl>

<dl>
<dd>

**$scopes:** `?array` — Suggested explicit permission scopes. Overrides preset when provided.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;revokeApiKey($apiKeyId) -> ?RevokeApiKeyResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Permanently revokes a company-scoped API key. The caller must have the `api_keys:manage` permission. The response contains non-secret metadata only.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->revokeApiKey(
    'apiKeyId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$apiKeyId:** `string` — Exact API key ID returned by the list API keys endpoint.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;updateApiKey($apiKeyId, $request) -> ?UpdateApiKeyResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Renames a company-scoped API key and/or replaces its permissions in place. The caller must have the `api_keys:manage` permission. The key value is unchanged. Added permissions apply on the next retry; removed permissions may remain usable for up to five minutes while API caches expire. `preset` and `scopes` replace the whole selection rather than merging into it. The response contains non-secret metadata only.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->updateApiKey(
    'apiKeyId',
    new UpdateApiKeyRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$apiKeyId:** `string` — Exact API key ID returned by the list API keys endpoint.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — New human-readable key name.
    
</dd>
</dl>

<dl>
<dd>

**$preset:** `?string` — Replacement permission preset. Full-access keys are stored with scopes set to null, meaning all current and future permissions.
    
</dd>
</dl>

<dl>
<dd>

**$scopes:** `?array` — Replacement explicit permission scopes. Overrides preset when provided.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Analytics
<details><summary><code>$client-&gt;analytics-&gt;getCampaignMetrics($campaignId, $request) -> ?GetCampaignMetricsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns aggregated engagement metrics, attached campaign-goal results, a lifetime per-link click breakdown, and lifetime Poll/NPS summaries for a specific campaign. Clicked links and poll summaries are not limited by period/start/end.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->getCampaignMetrics(
    'campaignId',
    new GetCampaignMetricsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID
    
</dd>
</dl>

<dl>
<dd>

**$end:** `?DateTime` — End of custom time range (ISO 8601). Must be used with `start`. Max range: 90 days.
    
</dd>
</dl>

<dl>
<dd>

**$includeMachineEngagement:** `?bool` — Include detected scanner, preview, and tracked asset open/click events.
    
</dd>
</dl>

<dl>
<dd>

**$mailboxProvider:** `?string` — Recipient mailbox provider filter (e.g. gmail, microsoft, yahoo, icloud). Scopes engagement metrics to recipients of that provider. Provider-filtered responses report replies, conversions, and revenue as 0 because those metrics cannot be segmented per provider.
    
</dd>
</dl>

<dl>
<dd>

**$period:** `?string` — Sliding time window. Ignored when `start` and `end` are provided.
    
</dd>
</dl>

<dl>
<dd>

**$start:** `?DateTime` — Start of custom time range (ISO 8601). Must be used with `end`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;getCampaignStatsLegacy($campaignId, $request) -> ?GetCampaignStatsLegacyResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Backward-compatible alias for `GET /metrics/campaigns/{campaignId}`. Returns aggregated engagement metrics, attached campaign-goal results, a lifetime per-link click breakdown, and lifetime Poll/NPS summaries for a specific campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->getCampaignStatsLegacy(
    'campaignId',
    new GetCampaignStatsLegacyRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID
    
</dd>
</dl>

<dl>
<dd>

**$end:** `?DateTime` — End of custom time range (ISO 8601). Must be used with `start`. Max range: 90 days.
    
</dd>
</dl>

<dl>
<dd>

**$includeMachineEngagement:** `?bool` — Include detected scanner, preview, and tracked asset open/click events.
    
</dd>
</dl>

<dl>
<dd>

**$mailboxProvider:** `?string` — Recipient mailbox provider filter (e.g. gmail, microsoft, yahoo, icloud). Scopes engagement metrics to recipients of that provider. Provider-filtered responses report replies, conversions, and revenue as 0 because those metrics cannot be segmented per provider.
    
</dd>
</dl>

<dl>
<dd>

**$period:** `?string` — Sliding time window. Ignored when `start` and `end` are provided.
    
</dd>
</dl>

<dl>
<dd>

**$start:** `?DateTime` — Start of custom time range (ISO 8601). Must be used with `end`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;getMetrics($request) -> ?GetMetricsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns aggregated email engagement metrics for the specified time period, plus live subscriberCount (every stored contact) and activeSubscriberCount (status=active) as an audience snapshot independent of period. Set emailType=transactional for Send API and transactional SMTP traffic.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->getMetrics(
    new GetMetricsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$emailType:** `?string` — Structural email type filter. Use transactional for Send API and transactional SMTP traffic.
    
</dd>
</dl>

<dl>
<dd>

**$end:** `?DateTime` — End of custom time range (ISO 8601). Must be used with `start`. Max range: 90 days.
    
</dd>
</dl>

<dl>
<dd>

**$includeMachineEngagement:** `?bool` — Include detected scanner, preview, and tracked asset open/click events.
    
</dd>
</dl>

<dl>
<dd>

**$mailboxProvider:** `?string` — Recipient mailbox provider filter (e.g. gmail, microsoft, yahoo, icloud). Scopes engagement metrics to recipients of that provider. Provider-filtered responses report replies as 0 (replies cannot be segmented per provider) and omit the commerce forecast.
    
</dd>
</dl>

<dl>
<dd>

**$period:** `?string` — Sliding time window. Ignored when start/end are provided.
    
</dd>
</dl>

<dl>
<dd>

**$start:** `?DateTime` — Start of custom time range (ISO 8601). Must be used with `end`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;getRecipients($request) -> ?GetRecipientsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a paginated list of recipients with their open, click, and unsubscribe events. Use this to sync engagement data to your own database.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->getRecipients(
    new GetRecipientsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `?string` — Filter to recipients of a specific campaign
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — Filter to a single recipient by email address
    
</dd>
</dl>

<dl>
<dd>

**$end:** `?DateTime` — End of custom time range (ISO 8601). Must be used with `start`. Max range: 90 days.
    
</dd>
</dl>

<dl>
<dd>

**$includeMachineEngagement:** `?bool` — Include detected scanner, preview, and tracked asset open/click events in recipient engagement arrays.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Recipients per page (max 100)
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — Page number
    
</dd>
</dl>

<dl>
<dd>

**$period:** `?string` — Sliding time window. Ignored when start/end are provided.
    
</dd>
</dl>

<dl>
<dd>

**$sequenceId:** `?string` — Filter to recipients of a specific sequence
    
</dd>
</dl>

<dl>
<dd>

**$start:** `?DateTime` — Start of custom time range (ISO 8601). Must be used with `end`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;getSequenceMetrics($sequenceId, $request) -> ?GetSequenceMetricsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns aggregated engagement metrics plus a live active/waiting enrollment breakdown by current node for a specific sequence (automation).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->getSequenceMetrics(
    'sequenceId',
    new GetSequenceMetricsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` — Sequence (automation) ID
    
</dd>
</dl>

<dl>
<dd>

**$end:** `?DateTime` — End of custom time range (ISO 8601). Must be used with `start`. Max range: 90 days.
    
</dd>
</dl>

<dl>
<dd>

**$includeMachineEngagement:** `?bool` — Include detected scanner, preview, and tracked asset open/click events.
    
</dd>
</dl>

<dl>
<dd>

**$period:** `?string` — Sliding time window. Ignored when `start` and `end` are provided.
    
</dd>
</dl>

<dl>
<dd>

**$start:** `?DateTime` — Start of custom time range (ISO 8601). Must be used with `end`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;getStatsLegacy($request) -> ?GetStatsLegacyResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Backward-compatible alias for `GET /metrics`. Returns aggregated email engagement metrics for the specified time period and supports the same emailType filter.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->getStatsLegacy(
    new GetStatsLegacyRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$emailType:** `?string` — Structural email type filter. Use transactional for Send API and transactional SMTP traffic.
    
</dd>
</dl>

<dl>
<dd>

**$end:** `?DateTime` — End of custom time range (ISO 8601). Must be used with `start`. Max range: 90 days.
    
</dd>
</dl>

<dl>
<dd>

**$includeMachineEngagement:** `?bool` — Include detected scanner, preview, and tracked asset open/click events.
    
</dd>
</dl>

<dl>
<dd>

**$mailboxProvider:** `?string` — Recipient mailbox provider filter (e.g. gmail, microsoft, yahoo, icloud). Scopes engagement metrics to recipients of that provider. Provider-filtered responses report replies as 0 (replies cannot be segmented per provider) and omit the commerce forecast.
    
</dd>
</dl>

<dl>
<dd>

**$period:** `?string` — Sliding time window. Ignored when start/end are provided.
    
</dd>
</dl>

<dl>
<dd>

**$start:** `?DateTime` — Start of custom time range (ISO 8601). Must be used with `end`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;getTransactionalMetrics($idOrSlug, $request) -> ?TransactionalMetricsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns aggregate engagement metrics for one saved transactional email selected by ID or slug. Results are all-time unless a period or custom range is supplied.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->getTransactionalMetrics(
    'idOrSlug',
    new GetTransactionalMetricsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$idOrSlug:** `string` — Saved transactional email ID or API slug.
    
</dd>
</dl>

<dl>
<dd>

**$end:** `?DateTime` — Custom range end. Must be used with start; maximum 90 days.
    
</dd>
</dl>

<dl>
<dd>

**$includeMachineEngagement:** `?bool` — Include detected scanner, preview, and tracked asset open/click events.
    
</dd>
</dl>

<dl>
<dd>

**$period:** `?string` — Optional sliding time window. Ignored when start/end are provided.
    
</dd>
</dl>

<dl>
<dd>

**$start:** `?DateTime` — Custom range start. Must be used with end.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;getTransactionalMetricsLegacy($idOrSlug, $request) -> ?TransactionalMetricsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Backward-compatible alias for `GET /metrics/transactional/{idOrSlug}`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->getTransactionalMetricsLegacy(
    'idOrSlug',
    new GetTransactionalMetricsLegacyRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$idOrSlug:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$end:** `?DateTime` 
    
</dd>
</dl>

<dl>
<dd>

**$includeMachineEngagement:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$period:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$start:** `?DateTime` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;listCampaignEvents($campaignId, $request) -> ?ListCampaignEventsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns paginated raw email events for a specific campaign. Defaults to delivery events.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->listCampaignEvents(
    'campaignId',
    new ListCampaignEventsRequest([
        'eventTypes' => 'delivery,click',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID
    
</dd>
</dl>

<dl>
<dd>

**$end:** `?DateTime` — End of custom time range (ISO 8601). Must be used with `start`. Max range: 90 days.
    
</dd>
</dl>

<dl>
<dd>

**$eventType:** `?string` — Single event type to include. Defaults to delivery when no event type filter is provided.
    
</dd>
</dl>

<dl>
<dd>

**$eventTypes:** `?string` — Comma-separated event types to include. Supported values are send, delivery, bounce, complaint, open, click, unsubscribe, delivery_delay, and transport_failure.
    
</dd>
</dl>

<dl>
<dd>

**$includeMachineEngagement:** `?bool` — Include detected scanner, preview, and tracked asset open/click events when requesting engagement event types.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Events per page (max 500)
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — Page number
    
</dd>
</dl>

<dl>
<dd>

**$period:** `?string` — Sliding time window. Ignored when `start` and `end` are provided.
    
</dd>
</dl>

<dl>
<dd>

**$start:** `?DateTime` — Start of custom time range (ISO 8601). Must be used with `end`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;listCampaignPollResponses($campaignId, $request) -> ?ListCampaignPollResponsesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns one row per respondent per Poll or NPS block in a campaign, newest answer first, with the answer, its stored value, the subscriber attribute the answer was saved to, and the response time. Only each subscriber's latest answer per block is returned, so counts match the `polls` summaries from the campaign metrics endpoint. Multi-select answers list every selected option in `answers` and `values`. For a sequence email step, pass the step's automation node ID as `campaignId`. Also available at `GET /campaigns/{campaignId}/poll-responses`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->listCampaignPollResponses(
    'campaignId',
    new ListCampaignPollResponsesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID, or the automation node ID of a sequence email step
    
</dd>
</dl>

<dl>
<dd>

**$blockId:** `?string` — Restrict results to one poll block. Block IDs come from the `polls` array of the campaign metrics endpoint.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Responses per page (max 500)
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — Page number
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;listCampaignPollResponsesLegacy($campaignId, $request) -> ?ListCampaignPollResponsesLegacyResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Alias for `GET /metrics/campaigns/{campaignId}/poll-responses`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->listCampaignPollResponsesLegacy(
    'campaignId',
    new ListCampaignPollResponsesLegacyRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID, or the automation node ID of a sequence email step
    
</dd>
</dl>

<dl>
<dd>

**$blockId:** `?string` — Restrict results to one poll block.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Responses per page (max 500)
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — Page number
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;listEmailMetrics($request) -> ?ListEmailMetricsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns one row per email - each campaign and each sequence email step - with its own delivery funnel, attributed conversions, and revenue. Sequence rows carry sequenceId, automationNodeId, and the step number, so cross-sequence questions such as how many step-4 emails went out are one request instead of one per sequence. Counts come from retained event storage and match the steps array of the sequence metrics endpoint. The totals object covers every matching email rather than the current page.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->listEmailMetrics(
    new ListEmailMetricsRequest([
        'campaignId' => 'camp_abc123,camp_def456',
        'sequenceId' => 'seq_abc123,seq_def456',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `?string` — Comma-separated campaign IDs to restrict the breakdown to. Cannot be combined with sequenceId, step, or emailType=sequence.
    
</dd>
</dl>

<dl>
<dd>

**$emailType:** `?string` — Restrict to campaigns or sequence emails. Defaults to both. Implied as sequence when sequenceId or step is set, and as campaign when campaignId is set.
    
</dd>
</dl>

<dl>
<dd>

**$end:** `?DateTime` — End of custom time range (ISO 8601). Must be used with `start`. Max range: 90 days.
    
</dd>
</dl>

<dl>
<dd>

**$includeMachineEngagement:** `?bool` — Include detected scanner, preview, and tracked asset open/click events in engagement metrics.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Emails per page.
    
</dd>
</dl>

<dl>
<dd>

**$order:** `?string` — Sort order.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — Page number.
    
</dd>
</dl>

<dl>
<dd>

**$period:** `?string` — Sliding time window. Ignored when start/end are provided. Omit both for all-time counts.
    
</dd>
</dl>

<dl>
<dd>

**$sequenceId:** `?string` — Comma-separated sequence IDs to restrict the breakdown to. Cannot be combined with campaignId or emailType=campaign.
    
</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Sort field.
    
</dd>
</dl>

<dl>
<dd>

**$start:** `?DateTime` — Start of custom time range (ISO 8601). Must be used with `end`.
    
</dd>
</dl>

<dl>
<dd>

**$step:** `?int` — Keep only sequence emails at this 1-based position, counted in graph order per sequence. Cannot be combined with emailType=campaign.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;analytics-&gt;listSequenceEvents($sequenceId, $request) -> ?ListSequenceEventsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns paginated raw email events for every email step in a sequence, or for one step via automationNodeId. Defaults to delivery events. This is the per-recipient stream; for per-step totals read the steps array of the sequence metrics endpoint or GET /metrics/emails.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->listSequenceEvents(
    'sequenceId',
    new ListSequenceEventsRequest([
        'eventTypes' => 'delivery,open,click',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` — Sequence (automation) ID
    
</dd>
</dl>

<dl>
<dd>

**$automationNodeId:** `?string` — Scope the stream to one email step of this sequence. Take the node ID from the steps array of the sequence metrics endpoint. A node that is not an email step of this sequence returns 400.
    
</dd>
</dl>

<dl>
<dd>

**$end:** `?DateTime` — End of custom time range (ISO 8601). Must be used with `start`. Max range: 90 days.
    
</dd>
</dl>

<dl>
<dd>

**$eventType:** `?string` — Single event type to include. Defaults to delivery when no event type filter is provided.
    
</dd>
</dl>

<dl>
<dd>

**$eventTypes:** `?string` — Comma-separated event types to include. Supported values are send, delivery, bounce, complaint, open, click, unsubscribe, delivery_delay, and transport_failure.
    
</dd>
</dl>

<dl>
<dd>

**$includeMachineEngagement:** `?bool` — Include detected scanner, preview, and tracked asset open/click events when requesting engagement event types.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Events per page (max 500)
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — Page number
    
</dd>
</dl>

<dl>
<dd>

**$period:** `?string` — Sliding time window. Ignored when `start` and `end` are provided.
    
</dd>
</dl>

<dl>
<dd>

**$start:** `?DateTime` — Start of custom time range (ISO 8601). Must be used with `end`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## AudienceSyncs
<details><summary><code>$client-&gt;audienceSyncs-&gt;create($request) -> ?CreateAudienceSyncsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Pushes a segment to a Meta custom audience and keeps it synced on a schedule. Provide segmentId for an existing segment or predefinedSegmentId for a ready-made template (for example zero-ltv, no-purchase-1y, recent-buyers); template segments are created automatically on first use. The first upload runs immediately. Audiences are add-only - subscribers who later leave the segment stay in the Meta audience. Requires the Meta Ads integration to be connected in the dashboard.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->audienceSyncs->create(
    [
        'key' => "value",
    ],
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `mixed` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;audienceSyncs-&gt;delete($syncId) -> ?DeleteAudienceSyncsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Removes the sync mapping. The Meta audience itself is kept so running ads are not disrupted - only future syncs stop.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->audienceSyncs->delete(
    'syncId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$syncId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;audienceSyncs-&gt;list() -> ?ListAudienceSyncsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists segment-to-Meta-audience syncs with schedule and last sync status.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->audienceSyncs->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;audienceSyncs-&gt;listAdAccounts() -> ?ListAdAccountsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists the Meta ad accounts reachable through the connected Meta Ads integration.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->audienceSyncs->listAdAccounts();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;audienceSyncs-&gt;runNow($syncId) -> ?RunNowAudienceSyncsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Triggers an immediate upload outside the regular schedule. The sync must be active.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->audienceSyncs->runNow(
    'syncId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$syncId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;audienceSyncs-&gt;update($syncId, $request) -> ?UpdateAudienceSyncsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Changes an audience sync's frequency or pauses/resumes it.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->audienceSyncs->update(
    'syncId',
    new UpdateAudienceSyncsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$syncId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$frequency:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$isActive:** `?bool` — false pauses the sync, true resumes it.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Campaigns
<details><summary><code>$client-&gt;campaigns-&gt;cancel($campaignId) -> ?CancelCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancels a sending, paused, scheduled, waiting_approval, or rejected campaign and removes any pending send jobs.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->cancel(
    'campaignId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;create($request) -> ?CreateCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a campaign and linked email from at most one of prompt, HTML, Sequenzy blocks, or an existing template. Omit all content sources to create an empty draft. Optional From/Reply-To inputs create or select profiles; From addresses require a verified sending domain. Defaults to draft. Use status `sent` only to archive an imported/already-sent campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->create(
    new CreateCampaignsRequest([
        'html' => '<p>Hello there!</p>',
        'labels' => [
            'edm',
            'api',
        ],
        'name' => 'April Launch',
        'preheaderText' => 'A short preview for the inbox',
        'subject' => 'A quick update',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$blocks:** `?array` — Sequenzy email blocks. Mutually exclusive with html. Put visual styling under styles; top-level style keys such as backgroundColor, backgroundOpacity, borderColor, borderWidth, and borderRadius are normalized into styles.
    
</dd>
</dl>

<dl>
<dd>

**$campaignData:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$computedLists:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$emailPreset:** `?string` — Per-email Style > Format for native Sequenzy blocks. This is separate from the prompt-generation `style` field. Cannot be combined with `html`, and a template or blocks payload stored as one standalone raw HTML block does not support it. Applying `minimal` removes standalone logo blocks; switching back to `branded` generates a new logo unless the authored logo block is sent again.
    
</dd>
</dl>

<dl>
<dd>

**$fromEmail:** `?string` — Campaign From address. Its domain must be configured and verified.
    
</dd>
</dl>

<dl>
<dd>

**$fromName:** `?string` — Display name recipients see, e.g. 'Brennon at TradeTally'. Selects the sender identity of that name on fromEmail, creating it when the address has no identity by that name; the mailbox's other display names, and everything pinned to them, are untouched. Requires fromEmail; omit it when using senderProfileId, which already carries its own display name.
    
</dd>
</dl>

<dl>
<dd>

**$html:** `?string` — Raw HTML body. Mutually exclusive with blocks.
    
</dd>
</dl>

<dl>
<dd>

**$label:** `?array` — Compatibility alias for labels.
    
</dd>
</dl>

<dl>
<dd>

**$labels:** `?array` — Label names to assign. Missing labels are created automatically.
    
</dd>
</dl>

<dl>
<dd>

**$listIds:** `?array` — Shorthand for targeting one or more lists. Equivalent to `targetLists` `{"type":"lists","listIds":["list_123"]}`. Mutually exclusive with targetLists and segmentId.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$preheaderText:** `?string` — Compatibility alias for previewText.
    
</dd>
</dl>

<dl>
<dd>

**$previewText:** `?string` — Optional inbox preview text saved on the linked email.
    
</dd>
</dl>

<dl>
<dd>

**$prompt:** `?string` — Natural-language request for branded native campaign blocks.
    
</dd>
</dl>

<dl>
<dd>

**$replyProfileId:** `?string` — Existing reply profile ID. It already supplies both the Reply-To address and display name, so send it on its own and omit replyTo and replyToName.
    
</dd>
</dl>

<dl>
<dd>

**$replyTo:** `?string` — Campaign Reply-To address. A reply profile is created when needed.
    
</dd>
</dl>

<dl>
<dd>

**$replyToName:** `?string` — Display name for the Reply-To address. Requires replyTo; omit it when using replyProfileId, which already carries its own display name. An address carries one Reply-To name company-wide, so if replyTo already has a saved profile under a different name, that saved name is kept and the response `warnings` array says so.
    
</dd>
</dl>

<dl>
<dd>

**$segmentId:** `?string` — Shorthand for targeting one saved segment. Equivalent to `targetLists` `{"type":"segment","segmentId":"seg_123"}`. Mutually exclusive with targetLists and listIds.
    
</dd>
</dl>

<dl>
<dd>

**$senderProfileId:** `?string` — Existing sender profile ID. It already supplies both the From address and display name, so send it on its own and omit fromEmail and fromName.
    
</dd>
</dl>

<dl>
<dd>

**$sentAt:** `?DateTime` — ISO date-time for an imported/already-sent campaign. Only valid with status sent; defaults to now when omitted.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Initial status. Defaults to draft. Use sent only for imported/already-sent campaigns.
    
</dd>
</dl>

<dl>
<dd>

**$style:** `?string` — Generation style; valid only with prompt.
    
</dd>
</dl>

<dl>
<dd>

**$subject:** `?string` — Required with HTML, blocks, or templateId; optional with prompt, where it overrides the generated subject.
    
</dd>
</dl>

<dl>
<dd>

**$targetLists:** `?array` — Campaign audience saved on the draft. Omit to leave targeting unset and choose it when scheduling. The object is a union discriminated on type: {"type":"all"}, {"type":"lists","listIds":["list_123"]}, {"type":"segment","segmentId":"seg_123"}, {"type":"filtered","filters":[],"filterJoinOperator":"and"}, {"type":"rules","include":[],"exclude":[]}. Mutually exclusive with segmentId and listIds.
    
</dd>
</dl>

<dl>
<dd>

**$templateId:** `?string` — Company-owned email template to copy into the campaign. Mutually exclusive with prompt, HTML, and blocks.
    
</dd>
</dl>

<dl>
<dd>

**$tone:** `?string` — Generation tone; valid only with prompt.
    
</dd>
</dl>

<dl>
<dd>

**$trackingCode:** `?string` — Optional campaign tracking code available to UTM templates as `{{campaign.trackingCode}}`. Empty strings are stored as null.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;createGoal($campaignId, $request) -> ?CreateGoalCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates an event, subscriber-attribute, or tag-applied conversion goal on one email campaign. SMS campaigns are not supported. The attribution window defaults to 168 hours when omitted.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->createGoal(
    'campaignId',
    new CreateGoalCampaignsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;createShareLink($campaignId) -> ?CreateShareLinkCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates (or fetches) the campaign's public view-in-browser link. The hosted page renders an anonymized copy - sample contact, inert unsubscribe link, no open/click tracking - so the URL is safe to forward to anyone. Idempotent - an already-active link is returned with created=false instead of being rotated. Email campaigns only.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->createShareLink(
    'campaignId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;delete($campaignId) -> ?DeleteCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Permanently deletes a campaign. Active campaigns (sending, scheduled, or paused) must be cancelled first.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->delete(
    'campaignId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;deleteGoal($campaignId, $goalId) -> ?DeleteGoalCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Permanently removes a conversion goal from the campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->deleteGoal(
    'campaignId',
    'goalId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$goalId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;duplicate($campaignId, $request) -> ?DuplicateCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a draft copy of a campaign. Optionally copies the campaign's A/B test or duplicates a single variant as a plain campaign.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->duplicate(
    'campaignId',
    new DuplicateCampaignsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID
    
</dd>
</dl>

<dl>
<dd>

**$mode:** `?string` — campaign copies the campaign email, ab_test also copies the linked A/B test and variants, variant copies one variant's content as a plain campaign.
    
</dd>
</dl>

<dl>
<dd>

**$variantId:** `?string` — Variant ID to copy. Required when mode is variant.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;get($campaignId) -> ?GetCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns one campaign with its email blocks, campaign data, reply-to profile, and schedule timestamps. Poll this to follow a campaign held in waiting_approval: on approval the status returns to scheduled (or sending, if the scheduled time already passed), and on rejection it becomes rejected with reviewer feedback in rejectionComment.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->get(
    'campaignId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;getAudience($campaignId) -> ?GetAudienceCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Resolves the campaign's stored targeting into named lists and segments and returns a recipient count computed at read time. When audience.isUnset is true the campaign has no targeting and scheduling sends to every active subscriber.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->getAudience(
    'campaignId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;list($request) -> ?ListCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists campaigns for the authenticated company, optionally filtered by status or label. Each item includes delivery pacing (sendTimeOptimization, sendTimeWindowHours, spreadOverHours, sendInRecipientTimezone, scheduledTimezone) so a company-wide STO audit does not need one getCampaign call each. STO is campaign-only; sequences use sendingWindow.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->list(
    new ListCampaignsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$label:** `?string` — Optional label name filter. Only campaigns assigned this label are returned.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Optional page size. Values above 100 are capped to 100.
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Optional zero-based row offset.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Optional campaign status filter.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;listGoals($campaignId) -> ?ListGoalsCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists the conversion goals attached to an email campaign. SMS campaigns are not supported.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->listGoals(
    'campaignId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;pause($campaignId) -> ?PauseCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Pauses a campaign that is currently sending. In-progress chunk workers stop and remaining recipients are held until resume.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->pause(
    'campaignId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;previewComputedData($campaignId, $request) -> ?PreviewComputedDataCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Preview the per-recipient lists that a campaign computes from campaign data.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->previewComputedData(
    'campaignId',
    new PreviewComputedDataCampaignsRequest([
        'subscriber' => new PreviewComputedDataCampaignsRequestSubscriber([
            'customAttributes' => [
                'interests' => [
                    "theatre",
                    "arts",
                ],
                'region' => "Auckland",
            ],
            'email' => 'anna@example.com',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID
    
</dd>
</dl>

<dl>
<dd>

**$subscriber:** `?PreviewComputedDataCampaignsRequestSubscriber` — Inline subscriber preview data.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberId:** `?string` — Existing subscriber ID to use for preview.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;render($campaignId, $request) -> ?RenderEmailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Render a campaign to the exact email-safe HTML that would be sent, for embedding a visual preview. Read-only: this never sends or modifies anything, and uses POST only so personalization input can travel in a request body.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->render(
    'campaignId',
    new RenderCampaignsRequest([
        'body' => new RenderEmailRequest([]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID
    
</dd>
</dl>

<dl>
<dd>

**$request:** `RenderEmailRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;resendToNonOpeners($campaignId) -> ?ResendToNonOpenersCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a draft that resends a sent campaign to everyone in the same audience who didn't open it. Reuses the original audience plus a "didn't open this campaign" rule. Only available 6 hours after the campaign finishes sending, and never for imported already-sent campaigns, which have no opens in Sequenzy. The draft must be scheduled or sent separately.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->resendToNonOpeners(
    'campaignId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;resume($campaignId, $request) -> ?ResumeCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Resumes a paused campaign. Sending continues with remaining recipients, including A/B test phases when the campaign has a linked test.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->resume(
    'campaignId',
    new ResumeCampaignsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID
    
</dd>
</dl>

<dl>
<dd>

**$spreadOverHours:** `?int` — Spread remaining delivery over this many hours. Pass null to clear an existing spread.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;revokeShareLink($campaignId) -> ?RevokeShareLinkCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Revokes the campaign's public view-in-browser link. The shared URL returns 404 immediately; sharing again later mints a different URL. Returns revoked=false when no link was active.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->revokeShareLink(
    'campaignId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;schedule($campaignId, $request) -> ?ScheduleCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Schedules a draft or already scheduled campaign for a future send time. Requires a verified sending domain. Campaigns that require safety review are held in waiting_approval and scheduled after a reviewer approves them. A waiting_approval result is a normal 200 outcome and is most common on new accounts and recently registered sending domains; retrying the schedule call does not clear the hold, so branch on campaign.status and poll GET /campaigns/{campaignId} instead. See https://docs.sequenzy.com/concepts/campaigns#safety-review
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->schedule(
    'campaignId',
    new ScheduleCampaignsRequest([
        'scheduledAt' => new DateTime('2024-01-15T09:30:00Z'),
        'targetLists' => [
            'type' => "all",
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID
    
</dd>
</dl>

<dl>
<dd>

**$listIds:** `?array` — Shorthand for sending to one or more lists. Equivalent to `targetLists` `{"type":"lists","listIds":["list_123"]}`. Mutually exclusive with targetLists.
    
</dd>
</dl>

<dl>
<dd>

**$recurringInterval:** `?string` — Repeat the campaign on a cadence starting at scheduledAt. The campaign becomes a recurring template - each run is duplicated and sent automatically, re-evaluating audience membership every time. Omit or send null for a one-shot send; scheduling again without it stops the recurrence.
    
</dd>
</dl>

<dl>
<dd>

**$scheduledAt:** `DateTime` — Future send time.
    
</dd>
</dl>

<dl>
<dd>

**$scheduledTimezone:** `?string` — IANA timezone the scheduledAt wall-clock time refers to, for example America/New_York. Required with sendInRecipientTimezone.
    
</dd>
</dl>

<dl>
<dd>

**$sendInRecipientTimezone:** `?bool` — Deliver at scheduledAt's wall-clock time in each recipient's own timezone. Requires scheduledTimezone. Contacts without a stored timezone receive the campaign at scheduledAt itself. Not combinable with recurringInterval or spreadOverHours. Omitting it on a reschedule preserves the campaign's existing setting; send false to turn it off.
    
</dd>
</dl>

<dl>
<dd>

**$sendTimeOptimization:** `?bool` — Deliver each recipient at their predicted best open hour within sendTimeWindowHours of scheduledAt (default 12h, max 24). Campaign-only: there is no company or sequence STO toggle. Sequences use sendingWindow instead. spreadOverHours takes precedence and turns STO off; sendInRecipientTimezone also turns it off.
    
</dd>
</dl>

<dl>
<dd>

**$sendTimeWindowHours:** `?int` — STO delivery window in hours from scheduledAt. Defaults to 12. Only used when sendTimeOptimization is true. Recipients whose predicted hour falls outside the window are snapped to the nearest edge.
    
</dd>
</dl>

<dl>
<dd>

**$spreadOverHours:** `?float` — Spread delivery over this many hours. When set, spread delivery takes precedence over send-time optimization.
    
</dd>
</dl>

<dl>
<dd>

**$targetLists:** `?array` — Optional targeting object. Omit to reuse saved targeting - or, when none is saved, ALL active subscribers. The object is a union discriminated on type: {"type":"all"}, {"type":"lists","listIds":["list_123"]}, {"type":"segment","segmentId":"seg_123"}, {"type":"filtered","filters":[],"filterJoinOperator":"and"}, {"type":"rules","include":[],"exclude":[]}. Mutually exclusive with listIds.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;sendTest($campaignId, $request) -> ?SendTestCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Queues a test send for a campaign and returns a durable email send ID for delivery-status inspection.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->sendTest(
    'campaignId',
    new SendTestCampaignsRequest([
        'to' => 'to',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID
    
</dd>
</dl>

<dl>
<dd>

**$to:** `string` — Test recipient email address.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;unschedule($campaignId) -> ?UnscheduleCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Removes the pending send for a scheduled campaign and returns it to an editable draft. Recurrence is stopped, and the campaign can be edited and scheduled again.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->unschedule(
    'campaignId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;update($campaignId, $request) -> ?UpdateCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a draft campaign's name, labels, content, audience, From/Reply-To settings, campaign personalization data, or delivery pacing (sendTimeOptimization and sendTimeWindowHours). Direct addresses create profiles when needed. Send Time Optimization is campaign-only; sequences use sendingWindow.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->update(
    'campaignId',
    new UpdateCampaignsRequest([
        'subject' => 'A quick update',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` — Campaign ID
    
</dd>
</dl>

<dl>
<dd>

**$bccEmails:** `?array` — Addresses BCC'd on every recipient's email for this campaign. Send an empty array or null to clear them.
    
</dd>
</dl>

<dl>
<dd>

**$blocks:** `?array` — Updated Sequenzy email blocks. Mutually exclusive with `html`. Put visual styling under styles; top-level style keys such as backgroundColor, backgroundOpacity, borderColor, borderWidth, and borderRadius are normalized into styles.
    
</dd>
</dl>

<dl>
<dd>

**$campaignData:** `?array` — Campaign-scoped JSON data available while rendering this campaign. Top-level arrays can contain up to 500 items. Set to null to clear it.
    
</dd>
</dl>

<dl>
<dd>

**$ccEmails:** `?array` — Addresses CC'd on every recipient's email for this campaign. Send an empty array or null to clear them.
    
</dd>
</dl>

<dl>
<dd>

**$computedLists:** `?array` — Personalized list definitions computed from campaignData. Keys can use letters, numbers, underscores, and dots. Use maxItems to cap each subscriber's list length. Pass an empty array to clear computed lists.
    
</dd>
</dl>

<dl>
<dd>

**$emailPreset:** `?string` — Change the linked email's Style > Format without rewriting its copy. Supported only for native Sequenzy blocks and cannot be combined with `html`. An email stored as one standalone raw HTML block does not support it. Applying `minimal` removes standalone logo blocks; switching back to `branded` generates a new logo unless the authored logo block is sent again.
    
</dd>
</dl>

<dl>
<dd>

**$fromEmail:** `?string` — Campaign From address. Its domain must be configured and verified.
    
</dd>
</dl>

<dl>
<dd>

**$fromName:** `?string` — Display name recipients see, e.g. 'Brennon at TradeTally'. Selects the sender identity of that name on fromEmail, creating it when the address has no identity by that name; the mailbox's other display names, and everything pinned to them, are untouched. Requires fromEmail; omit it when using senderProfileId, which already carries its own display name.
    
</dd>
</dl>

<dl>
<dd>

**$html:** `?string` — Updated email HTML content. Mutually exclusive with `blocks`.
    
</dd>
</dl>

<dl>
<dd>

**$label:** `?array` — Compatibility alias for labels.
    
</dd>
</dl>

<dl>
<dd>

**$labels:** `?array` — Replacement label names. Send an empty array to clear labels. Missing labels are created automatically.
    
</dd>
</dl>

<dl>
<dd>

**$listIds:** `?array` — Shorthand for retargeting the draft at one or more lists. Equivalent to `targetLists` `{"type":"lists","listIds":["list_123"]}`. Mutually exclusive with targetLists and segmentId.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Updated campaign name
    
</dd>
</dl>

<dl>
<dd>

**$preheaderText:** `?string` — Compatibility alias for previewText.
    
</dd>
</dl>

<dl>
<dd>

**$previewText:** `?string` — Updated inbox preview text. Set to null to clear it.
    
</dd>
</dl>

<dl>
<dd>

**$replyProfileId:** `?string` — Reply profile ID for this company. It already supplies both the Reply-To address and display name, so send it on its own and omit replyTo and replyToName.
    
</dd>
</dl>

<dl>
<dd>

**$replyTo:** `?string` — Reply-To email for this campaign. A profile is created when needed. Mutually exclusive with `replyProfileId`.
    
</dd>
</dl>

<dl>
<dd>

**$replyToName:** `?string` — Display name for the Reply-To address. Requires replyTo; omit it when using replyProfileId, which already carries its own display name. An address carries one Reply-To name company-wide, so if replyTo already has a saved profile under a different name, that saved name is kept and the response `warnings` array says so.
    
</dd>
</dl>

<dl>
<dd>

**$segmentId:** `?string` — Shorthand for retargeting the draft at one saved segment. Equivalent to `targetLists` `{"type":"segment","segmentId":"seg_123"}`. Mutually exclusive with targetLists and listIds.
    
</dd>
</dl>

<dl>
<dd>

**$senderProfileId:** `?string` — Existing sender profile ID. It already supplies both the From address and display name, so send it on its own and omit fromEmail and fromName.
    
</dd>
</dl>

<dl>
<dd>

**$sendTimeOptimization:** `?bool` — Deliver each recipient at their predicted best open hour within sendTimeWindowHours of scheduledAt. Campaign-only: there is no company or sequence STO toggle. Sequences use sendingWindow instead. Persists on the draft until schedule overrides it. spreadOverHours and sendInRecipientTimezone each turn STO off.
    
</dd>
</dl>

<dl>
<dd>

**$sendTimeWindowHours:** `?int` — STO delivery window in hours from scheduledAt. Defaults to 12. Only used when sendTimeOptimization is true.
    
</dd>
</dl>

<dl>
<dd>

**$subject:** `?string` — Updated email subject line
    
</dd>
</dl>

<dl>
<dd>

**$targetLists:** `?array` — Replacement campaign audience, using the same shapes as campaign create, e.g. {"type":"lists","listIds":["list_123"]}. Send null to clear saved targeting and choose the audience when scheduling; omit to leave it unchanged. Mutually exclusive with segmentId and listIds.
    
</dd>
</dl>

<dl>
<dd>

**$trackingCode:** `?string` — Campaign tracking code available to UTM templates as `{{campaign.trackingCode}}`. Send an empty string or null to clear it.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;updateGoal($campaignId, $goalId, $request) -> ?UpdateGoalCampaignsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replaces the editable configuration for an existing email-campaign goal. SMS campaigns are not supported.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->updateGoal(
    'campaignId',
    'goalId',
    new UpdateGoalCampaignsRequest([
        'body' => new CampaignGoalInput([]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$campaignId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$goalId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$request:** `CampaignGoalInput` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Companies
<details><summary><code>$client-&gt;companies-&gt;create($request) -> ?CreateCompaniesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a company workspace and queues brand processing for its website. Requires a personal account key (seq_user_...). Company-scoped keys (seq_live_... and legacy ek_... keys) are bound to a single company and are rejected with 403, because they could never access the workspace they created.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->companies->create(
    new CreateCompaniesRequest([
        'domain' => 'domain',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$domain:** `string` — Company website domain or URL.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Company display name. If omitted, Sequenzy derives it from the domain.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;companies-&gt;get($companyId) -> ?GetCompaniesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns one company workspace that the authenticated key can access.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->companies->get(
    'companyId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$companyId:** `string` — Company ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;companies-&gt;list() -> ?ListCompaniesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists companies available to the authenticated API key.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->companies->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;companies-&gt;update($companyId, $request) -> ?UpdateCompaniesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates product info, brand context, the default email theme, reply-tracking settings, the workspace default lists, and account-wide From/Reply-To defaults. New profiles are created as needed; From addresses require a verified sending domain. Requires the company_profile:manage scope; the sending-identity, reply-tracking, and defaultSubscriberListIds fields additionally require companies:manage.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->companies->update(
    'companyId',
    new UpdateCompaniesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$companyId:** `string` — Company ID
    
</dd>
</dl>

<dl>
<dd>

**$address:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$brandColors:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$companyContext:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$defaultSubscriberListIds:** `?array` — Which lists new contacts join when something creates a subscriber without explicit list targeting - forms, API writes, events, tag actions, imports, and any integration without its own list targeting. null means every current and future list, [] means no list at all, and an array means exactly those lists. Unknown or foreign list IDs are rejected rather than skipped. Applies only to later writes; nobody is moved or removed retroactively. Requires the companies:manage scope.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$emailDesignPrompt:** `?string` — Art direction for AI-designed emails: layout, density, which sections belong in an email, imagery, and CTA prominence. `toneVoice` steers copy; this steers design. When empty, the next email generation prefills it with the direction derived from the brand; null clears it so the next generation writes a fresh one.
    
</dd>
</dl>

<dl>
<dd>

**$emailDirection:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$emailLengthPreference:** `?string` — How long AI-written email copy should be. New workspaces default to `concise`.
    
</dd>
</dl>

<dl>
<dd>

**$emailTheme:** `?UpdateCompaniesRequestEmailTheme` — Default email theme. Partial update - omitted fields keep their current value (or the preset default) and numeric values are clamped to supported ranges. Pass null to reset to the platform default theme.
    
</dd>
</dl>

<dl>
<dd>

**$fontFamily:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$forwardReplies:** `?bool` — Enable or disable forwarding captured replies to the configured mailbox.
    
</dd>
</dl>

<dl>
<dd>

**$founderName:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$fromEmail:** `?string` — Account-wide default From address. The domain must be configured and verified.
    
</dd>
</dl>

<dl>
<dd>

**$fromName:** `?string` — Display name of the default From profile. Sent on its own it renames the current default profile; with senderProfileId it renames that profile; with fromEmail it names the profile for that address. If the address already carries several display names, the request is rejected - pass senderProfileId to say which one to rename.
    
</dd>
</dl>

<dl>
<dd>

**$language:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$logoUrl:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$pricing:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$primaryColor:** `?string` — 6-digit hex color, for example
    
</dd>
</dl>

<dl>
<dd>

**$privacyPolicyUrl:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$replyProfileId:** `?string` — Existing reply profile to make the account-wide default, and the profile replyToName renames. Mutually exclusive with replyTo.
    
</dd>
</dl>

<dl>
<dd>

**$replyTo:** `?string` — Account-wide default Reply-To address. A reply profile is created when needed.
    
</dd>
</dl>

<dl>
<dd>

**$replyToName:** `?string` — Display name of the default Reply-To profile. Sent on its own it renames the current default profile; with replyProfileId it renames that profile; with replyTo it names the profile for that address.
    
</dd>
</dl>

<dl>
<dd>

**$replyTrackingDomainMode:** `?string` — Use Sequenzy's managed inbound domain or a configured custom domain.
    
</dd>
</dl>

<dl>
<dd>

**$replyTrackingEnabled:** `?bool` — Enable or disable inbound reply capture.
    
</dd>
</dl>

<dl>
<dd>

**$senderProfileId:** `?string` — Existing sender profile to make the account-wide default, and the profile fromName renames. List IDs with GET /v1/sender-profiles. Mutually exclusive with fromEmail.
    
</dd>
</dl>

<dl>
<dd>

**$socialLinks:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$termsUrl:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$testimonials:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$toneVoice:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$valueProps:** `?array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Conversations
<details><summary><code>$client-&gt;conversations-&gt;get($conversationId) -> ?GetConversationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns one conversation with all messages, originating campaign or sequence context, and subscriber details.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->get(
    'conversationId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `string` — Conversation ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;conversations-&gt;list($request) -> ?ListConversationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists inbox conversations with subscriber replies, filtered by status, unread flag, or search term.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->list(
    new ListConversationsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` — Results per page.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — Page number.
    
</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Search in subject, subscriber email, or subscriber name.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by conversation status.
    
</dd>
</dl>

<dl>
<dd>

**$unread:** `?string` — Pass "true" to only return conversations with unread messages.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;conversations-&gt;markRead($conversationId) -> ?MarkReadConversationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Marks all unread inbound messages in a conversation as read and clears the unread flag.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->markRead(
    'conversationId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `string` — Conversation ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;conversations-&gt;sendMessage($conversationId, $request) -> ?SendMessageConversationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Sends an email reply to the subscriber or adds an internal note. Replies reopen closed conversations.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->sendMessage(
    'conversationId',
    new SendMessageConversationsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `string` — Conversation ID.
    
</dd>
</dl>

<dl>
<dd>

**$bodyHtml:** `?string` — HTML body. Outbound messages require bodyText or bodyHtml.
    
</dd>
</dl>

<dl>
<dd>

**$bodyText:** `?string` — Plain text body. Outbound messages require bodyText or bodyHtml.
    
</dd>
</dl>

<dl>
<dd>

**$subject:** `?string` — Message subject. Defaults to the conversation subject.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — outbound sends an email reply, note adds an internal team note.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;conversations-&gt;updateStatus($conversationId, $request) -> ?UpdateStatusConversationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Opens or closes a conversation.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->updateStatus(
    'conversationId',
    new UpdateStatusConversationsRequest([
        'status' => UpdateStatusConversationsRequestStatus::Open->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `string` — Conversation ID.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `string` — New conversation status.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Email Blocks
<details><summary><code>$client-&gt;emailBlocks-&gt;get($type, $request) -> ?GetEmailBlocksResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the full field reference for one block type, with a minimal valid example and authoring notes.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->emailBlocks->get(
    'steps',
    new GetEmailBlocksRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$type:** `string` — Block type, for example list, steps, text, or hero.
    
</dd>
</dl>

<dl>
<dd>

**$conditionFields:** `?string` — Include the per-field condition table in the response. Not needed for `conditional-group`, which always carries it. The table is several times the size of one block type's reference, so a targeted lookup does not carry it unless asked.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;emailBlocks-&gt;list($request) -> ?ListEmailBlocksResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists every block type accepted by the `blocks` array on campaigns, sequence email steps, templates, transactional emails, and email components, with the required and optional fields of each. Derived from the same schemas that validate a write, so it cannot drift from what those endpoints accept.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->emailBlocks->list(
    new ListEmailBlocksRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$creatableOnly:** `?string` — Hide structural block types the editor manages for you.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Email Components
<details><summary><code>$client-&gt;emailComponents-&gt;create($request) -> ?CreateEmailComponentsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a reusable email component from a block list. Component names are unique per company.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->emailComponents->create(
    new CreateEmailComponentsRequest([
        'blocks' => [
            new EmailBlock([
                'type' => EmailBlockType::Text->value,
            ]),
        ],
        'name' => 'Promo banner',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$blocks:** `array` 
    
</dd>
</dl>

<dl>
<dd>

**$componentType:** `?string` — Defaults to section. Creating a footer component does not pin it as the company default.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;emailComponents-&gt;delete($componentId) -> ?DeleteEmailComponentsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes an email component. Emails that already rendered it keep their copied blocks. Deleting the pinned default footer makes new emails fall back to the generated footer.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->emailComponents->delete(
    'componentId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$componentId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;emailComponents-&gt;get($componentId) -> ?GetEmailComponentsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a single email component by id.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->emailComponents->get(
    'componentId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$componentId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;emailComponents-&gt;getDefault($slot) -> ?GetDefaultEmailComponentsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the component used as the company default for a slot. A 404 means emails fall back to the generated footer.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->emailComponents->getDefault(
    GetDefaultEmailComponentsRequestSlot::Footer->value,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$slot:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;emailComponents-&gt;list($request) -> ?ListEmailComponentsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists reusable email components newest first, including the components pinned as company defaults.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->emailComponents->list(
    new ListEmailComponentsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$defaultsOnly:** `?string` — Return only components pinned as a company default.
    
</dd>
</dl>

<dl>
<dd>

**$slot:** `?string` — Filter by default slot.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — Filter by component type.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;emailComponents-&gt;setDefault($slot, $request) -> ?SetDefaultEmailComponentsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates or replaces the company default component for a slot. New sequence, campaign, and AI-generated emails clone this component when they are built. A default footer always keeps its unsubscribe link enabled; transactional sends hide it at render time. Emails that already exist keep the footer they were built with.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->emailComponents->setDefault(
    SetDefaultEmailComponentsRequestSlot::Footer->value,
    new SetDefaultEmailComponentsRequest([
        'blocks' => [
            new EmailBlock([
                'type' => EmailBlockType::Text->value,
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$slot:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$blocks:** `array` 
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Defaults to "Default Footer" when creating the footer default.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;emailComponents-&gt;update($componentId, $request) -> ?UpdateEmailComponentsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates component metadata or replaces its blocks. Replacing blocks bumps the component version; emails built earlier keep the copy they were created with. Editing the component pinned as the default footer keeps its unsubscribe link enabled.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->emailComponents->update(
    'componentId',
    new UpdateEmailComponentsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$componentId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$blocks:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$componentType:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## EmailDesignSystem
<details><summary><code>$client-&gt;emailDesignSystem-&gt;getEmailDesignSystem() -> ?GetEmailDesignSystemResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the company's effective email design system - the visual identity every AI-generated email (campaigns and sequence steps) renders inside. The identity is stored as the company's emailDesignPrompt direction text; tokens are parsed from that text, with unstated tokens derived deterministically from brand context. isDefault is true while the identity is purely derived.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->emailDesignSystem->getEmailDesignSystem();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;emailDesignSystem-&gt;updateEmailDesignSystem($request) -> ?UpdateEmailDesignSystemResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Adjusts the company's email design system. This is a partial update - only the passed fields change - and it affects every future AI email generation and sequence enrichment. The adjustment is written into the company's emailDesignPrompt direction text (the single source of truth) - the new identity's sentences are prepended and custom prose the text carried is preserved below them. Pass reset true to clear the direction text and return to the brand-derived defaults.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->emailDesignSystem->updateEmailDesignSystem(
    new UpdateEmailDesignSystemRequest([
        'compositionSpine' => UpdateEmailDesignSystemRequestCompositionSpine::Editorial->value,
        'designCode' => new UpdateEmailDesignSystemRequestDesignCode([
            'kickerStyle' => UpdateEmailDesignSystemRequestDesignCodeKickerStyle::Letterspaced->value,
            'openerTreatments' => [
                UpdateEmailDesignSystemRequestDesignCodeOpenerTreatmentsItem::EditorialMasthead->value,
                UpdateEmailDesignSystemRequestDesignCodeOpenerTreatmentsItem::TitleLed->value,
            ],
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$compositionSpine:** `?string` — Which worked-example skeleton anchors generation.
    
</dd>
</dl>

<dl>
<dd>

**$designCode:** `?UpdateEmailDesignSystemRequestDesignCode` — Partial visual-grammar adjustment; omitted tokens keep their current value.
    
</dd>
</dl>

<dl>
<dd>

**$reset:** `?bool` — true clears the direction text and returns to brand-derived defaults. Cannot be combined with designCode or compositionSpine.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Emails
<details><summary><code>$client-&gt;emails-&gt;create($request) -> ?CreateEmailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates an email template with block content. Raw HTML is stored as a native HTML body.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->emails->create(
    new CreateEmailsRequest([
        'name' => 'Welcome email',
        'subject' => 'Welcome',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$previewText:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$subject:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;emails-&gt;update($emailId, $request) -> ?UpdateEmailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates email metadata or replaces the email body.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->emails->update(
    'emailId',
    new UpdateEmailsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$emailId:** `string` — Email ID
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$previewText:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$subject:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;emails-&gt;updateBlocks($emailId, $request) -> ?UpdateBlocksEmailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replaces an email body or mutates an existing block type.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->emails->updateBlocks(
    'emailId',
    new UpdateBlocksEmailsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$emailId:** `string` — Email ID
    
</dd>
</dl>

<dl>
<dd>

**$blockId:** `?string` — Existing block ID to mutate.
    
</dd>
</dl>

<dl>
<dd>

**$content:** `?string` — Optional replacement content for the mutated block.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — New block type. Type mutation supports text and html.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## EmailSends
<details><summary><code>$client-&gt;emailSends-&gt;get($emailSendId) -> ?GetEmailSendsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Gets an email delivery snapshot by ID, including queued and test sends, the stored HTML body when available, and retained ClickHouse events when the short-lived row has been cleaned up. Test sends remain hidden from sent-email history but are available through this exact-ID endpoint while their row is retained.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->emailSends->get(
    'emailSendId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$emailSendId:** `string` — Email send ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;emailSends-&gt;list($request) -> ?ListEmailSendsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists the recent 14-day delivery history with dashboard-equivalent subject, recipient, status, type, bounce, source, pagination, and sorting filters. Successful test sends and copied-recipient bookkeeping rows are hidden; a test send that failed, bounced, or was suppressed IS listed, flagged with an `isTestEmail` value of true, because it is the only record of a test that never arrived.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->emailSends->list(
    new ListEmailSendsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$automationId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$automationNodeId:** `?string` — Filter to one email step of a sequence. Take the node ID from the `steps` array of the sequence metrics endpoint. Combined with `automationId` the two intersect.
    
</dd>
</dl>

<dl>
<dd>

**$bounceType:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$campaignId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$days:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$emailType:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$q:** `?string` — Compatibility alias for `search`.
    
</dd>
</dl>

<dl>
<dd>

**$recipient:** `?string` — Case-insensitive recipient email filter.
    
</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Case-insensitive subject/title or recipient search. `q` is accepted as an alias.
    
</dd>
</dl>

<dl>
<dd>

**$sortField:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$sortOrder:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Delivery status. Opened includes clicked deliveries.
    
</dd>
</dl>

<dl>
<dd>

**$subject:** `?string` — Case-insensitive subject/title filter. `title` is accepted as an alias.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — Compatibility alias for `subject`.
    
</dd>
</dl>

<dl>
<dd>

**$transactionalEmailId:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Events
<details><summary><code>$client-&gt;events-&gt;getSchemas($request) -> ?GetSchemasEventsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the published payload of a built-in event - a real example payload per provider, plus every property path with its type, the merge tag that resolves it, and a description wherever the example alone is ambiguous (a null sample, an empty list, a unit that is not obvious, or a type that differs per provider). Omit eventName to list every documented event. Static reference data describing the shape of an event, not what the account has received. An event with no published payload returns documented false; it is still valid to trigger and to build a sequence on, because custom events carry exactly the properties you send.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->events->getSchemas(
    new GetSchemasEventsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$eventName:** `?string` — Event to describe, such as ecommerce.order_placed. Legacy aliases like order.completed resolve to their current name. Omit to list every documented event.
    
</dd>
</dl>

<dl>
<dd>

**$provider:** `?string` — Return only this provider's payload: shopify, woocommerce, manual, api, or stripe.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Feedback
<details><summary><code>$client-&gt;feedback-&gt;submit($request) -> ?SubmitFeedbackResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Submits product feedback about Sequenzy itself to the Sequenzy team - for example, when a workflow you or your user needed is not exposed via the API, CLI, or MCP server.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->feedback->submit(
    new SubmitFeedbackRequest([
        'message' => 'There is no endpoint to bulk-delete campaigns by label.',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$actual:** `?string` — What actually happened instead.
    
</dd>
</dl>

<dl>
<dd>

**$category:** `?string` — Feedback category. Use missing_capability when a needed workflow is not supported. Defaults to other.
    
</dd>
</dl>

<dl>
<dd>

**$context:** `?string` — Optional description of what you were trying to accomplish when you hit the gap.
    
</dd>
</dl>

<dl>
<dd>

**$expected:** `?string` — What you expected to happen.
    
</dd>
</dl>

<dl>
<dd>

**$message:** `string` — The feedback itself. Be specific about what was needed and what was missing or wrong.
    
</dd>
</dl>

<dl>
<dd>

**$resourceIds:** `?array` — IDs of the affected resources so the team can correlate the report with server logs.
    
</dd>
</dl>

<dl>
<dd>

**$source:** `?string` — Where the feedback was submitted from. Defaults to api.
    
</dd>
</dl>

<dl>
<dd>

**$toolCalls:** `?array` — For bug or wrong-outcome reports - the ordered API calls, CLI commands, or MCP tool calls that led to the problem. Summarize arguments; do not include raw subscriber data.
    
</dd>
</dl>

<dl>
<dd>

**$userIntent:** `?string` — For bug or wrong-outcome reports - the user's request, verbatim or closely paraphrased. Omit personal data not needed to reproduce the problem.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Generation
<details><summary><code>$client-&gt;generation-&gt;generateEmail($request) -> ?GenerateEmailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Generates a draft email from scratch as structured editor-compatible blocks. By default, the generated content is wrapped with the company's logo and footer.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->generation->generateEmail(
    new GenerateEmailRequest([
        'prompt' => 'Announce our new analytics dashboard to trial users',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$applyBranding:** `?bool` — Whether to wrap generated content with the company logo and footer. Set to false to return raw generated content blocks.
    
</dd>
</dl>

<dl>
<dd>

**$emailType:** `?string` — Email type. Transactional emails include a footer without an unsubscribe link.
    
</dd>
</dl>

<dl>
<dd>

**$prompt:** `string` — What you want the email to say or accomplish.
    
</dd>
</dl>

<dl>
<dd>

**$style:** `?string` — Optional style guidance.
    
</dd>
</dl>

<dl>
<dd>

**$tone:** `?string` — Optional tone guidance.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;generation-&gt;generateSmsMessages($request) -> ?GenerateSmsMessagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Generates draft SMS marketing message variants with per-message encoding and segment counts. Messages exclude opt-out footers and brand prefixes - Sequenzy adds both automatically at send time.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->generation->generateSmsMessages(
    new GenerateSmsMessagesRequest([
        'prompt' => 'Cart reminder with a free-shipping hook',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$count:** `?float` — Number of variants to generate. Defaults to 3.
    
</dd>
</dl>

<dl>
<dd>

**$prompt:** `string` — Description of the SMS to generate.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;generation-&gt;generateSubjectLines($request) -> ?GenerateSubjectLinesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Generates draft subject line variants for a campaign or sequence email.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->generation->generateSubjectLines(
    new GenerateSubjectLinesRequest([
        'topic' => 'April product launch',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$count:** `?float` — Number of variants to generate. Defaults to 5.
    
</dd>
</dl>

<dl>
<dd>

**$topic:** `string` — Topic, campaign idea, or context for the subject lines.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Integrations
<details><summary><code>$client-&gt;integrations-&gt;activatePixel($id) -> ?ActivatePixelIntegrationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Installs the Shopify storefront tracking pixel, or repoints an existing one at this account. Idempotent - an already-live pixel returns changed false without writing to the store. Events start arriving on the next storefront visit; nothing is backfilled. Fails with a 400 naming the reconnect step when the store granted an older permission set. Shopify only. Requires the integrations:manage scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->activatePixel(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Shopify integration ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;connect($request) -> ?ConnectIntegrationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Connects an API-key / webhook-secret integration: polar, paddle, dodo, whop, creem, chargebee, clerk, posthog, segment, or affonso. Credentials are validated against the provider where possible, stored encrypted, and never returned. Payment providers queue their initial revenue backfill; Affonso queues its affiliate backfill; PostHog and Segment can optionally import event history. The response includes the webhookUrl to configure at the provider with the same secret. Reconnecting replaces stored credentials. OAuth and app-install providers (Stripe, Shopify, Supabase, GitHub, WooCommerce, Meta) return a 400 pointing at the dashboard. Requires the integrations:manage scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->connect(
    new ConnectIntegrationsRequest([
        'provider' => ConnectIntegrationsRequestProvider::Polar->value,
        'webhookSecret' => 'webhookSecret',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$apiKey:** `?string` — Provider API key. Required for every provider except clerk, posthog, and segment.
    
</dd>
</dl>

<dl>
<dd>

**$historyImport:** `?ConnectIntegrationsRequestHistoryImport` — PostHog and Segment only. Imports event history after connecting: PostHog reads the project archive (projectId + personalApiKey); Segment walks your existing contacts' Unify profiles (spaceId + profileApiToken) and covers at most the last 14 days the Profile API serves, because Segment has no bulk event export.
    
</dd>
</dl>

<dl>
<dd>

**$provider:** `string` — Provider to connect.
    
</dd>
</dl>

<dl>
<dd>

**$providerAccountId:** `?string` — Provider account id: Paddle seller ID, Dodo business ID, Whop company ID, Creem store ID, or Chargebee site name. Polar resolves it from the API key.
    
</dd>
</dl>

<dl>
<dd>

**$settings:** `?ConnectIntegrationsRequestSettings` — PostHog and Segment only. Event delivery scope. PostHog defaults to every non-internal event; new Segment connections skip automatic page/screen calls unless explicitly allowlisted.
    
</dd>
</dl>

<dl>
<dd>

**$webhookSecret:** `string` — Signing secret of the webhook created at the provider. For Chargebee, the webhook's basic-auth credentials as username:password. For Segment, the secret is your own choice and must be between 16 and 153 UTF-8 bytes.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;get($id) -> ?IntegrationDetail</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Inspects one connected integration - what the provider syncs, every event it emits, the tags each event applies through the company's sync rules, the sequences that trigger on those events, recent activity, the ingestion block naming which lists its contacts join, and prioritized recommendations. Credentials are never returned. Requires the account:read, subscribers:read, sequences:read, and lists:read scopes.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->get(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Integration ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;getPixel($id) -> ?IntegrationPixelState</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Reads the live state of a Shopify store's storefront tracking pixel. Nothing about the pixel is stored locally, so this queries the store on every call. A confirmed missing or stale pixel prevents on-site events (product views, cart activity, browse abandonment) from arriving; a Shopify read error reports the state as unknown instead. Shopify only. Requires the account:read scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->getPixel(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Shopify integration ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;list($request) -> ?ListIntegrationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists connected integrations with connection state, sync health, last sync error, and any records the last sync could not import normally. Credentials, access tokens, and webhook secrets are never returned.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->list(
    new ListIntegrationsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$includeInactive:** `?bool` — Include disconnected integrations. Defaults to false.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;listActivity($request) -> ?ListActivityIntegrationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Recent integration webhook and sync activity, newest first. Retained for 24 hours. Payloads are sanitized when written, so no credentials or signatures appear. Requires the account:read and subscribers:read scopes.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->listActivity(
    new ListActivityIntegrationsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$integrationId:** `?string` — Only show activity for this integration.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Rows to return, 1-100. Defaults to 25.
    
</dd>
</dl>

<dl>
<dd>

**$provider:** `?string` — Only show activity for this provider.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by activity status.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;listCapabilities($request) -> ?ListCapabilitiesIntegrationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Describes what each integration provider syncs, which events it emits and when, the subscriber attributes it writes, and which actions it supports. Works whether or not the provider is connected, so it can be used to compare providers before connecting one.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->listCapabilities(
    new ListCapabilitiesIntegrationsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$category:** `?string` — Filter by category: payments, ecommerce, auth, analytics, ads, affiliate, cms, or developer.
    
</dd>
</dl>

<dl>
<dd>

**$provider:** `?string` — Return only this provider, for example stripe.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;sync($id) -> ?SyncIntegrationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Queues a manual re-sync for a connected integration - customers and revenue for a payment provider (Stripe, Polar, Paddle, Dodo, Creem, Chargebee, Whop), the user backfill for Supabase, or the event-history import for PostHog and Segment. The Supabase sync reads the project, schema, and table already configured for the integration and returns 400 when none is configured. PostHog and Segment re-run their event-history imports with credentials stored at connect time and are the supported retry path for failed imports; each restarts from the beginning, already-imported events dedupe, and returns 409 while queued or syncing. Segment requires a saved Unify space ID and Profile API token and covers the most recent 14 days served by the Profile API. Terminal BullMQ failures release imports for retry. Returns immediately; poll the integration to watch syncStatus. Other providers re-sync from the dashboard. Requires the integrations:manage scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->sync(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Integration ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;integrations-&gt;updateSync($id, $request) -> ?UpdateSyncIntegrationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Controls what a connected integration does to the contact list. Two independent settings - `syncEnabled` turns bulk imports and backfills on or off, and `listIds` chooses which lists the contacts the provider's live webhook creates join. Neither stops that webhook: disabling bulk sync only pauses full imports, and list targeting changes membership only. Contacts are still created, their attributes still sync, sync-rule tags still apply, and default any_contact sequences still enroll them. Explicit any_list and specific-list sequences require a matching membership and do not enroll a list-less contact. `listIds` takes effect on future provider writes: nothing is applied retroactively and nobody is ever removed from a list. Wix or Webflow submissions, Shopify customer updates, and Supabase resubscriptions can add an existing contact to the new targets; Stripe applies targeting only when its webhook creates a subscriber. Provider support is declared in the catalog's `actions` as set_list_targeting. At least one field is required, an in-flight sync must finish before bulk sync can be disabled, and setting the current state succeeds with `changed: false`. Requires the integrations:manage scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->integrations->updateSync(
    'id',
    new UpdateSyncIntegrationsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Integration ID.
    
</dd>
</dl>

<dl>
<dd>

**$listIds:** `?array` — Lists that contacts created by this integration join, applied from the provider's next write onward. `null` clears the choice so they follow the workspace default lists; `[]` means they join no list; a populated array means exactly those lists. Every ID must belong to this company.
    
</dd>
</dl>

<dl>
<dd>

**$syncEnabled:** `?bool` — True to enable bulk imports and backfills, false to pause them. This does not stop the provider's live webhook creating contacts.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## LandingPages
<details><summary><code>$client-&gt;landingPages-&gt;connectDedicatedDomain($landingPageId, $request) -> ?ConnectDedicatedDomainLandingPagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Assigns one hostname to one landing page. The page opens at the hostname root, while existing workspace and Sequenzy URLs remain available.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->connectDedicatedDomain(
    'landingPageId',
    new ConnectDedicatedDomainLandingPagesRequest([
        'domain' => 'offer.example.com',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$landingPageId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$domain:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;connectDomain($request) -> ?ConnectDomainLandingPagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Connects or replaces the custom domain for published landing pages.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->connectDomain(
    new ConnectDomainLandingPagesRequest([
        'domain' => 'pages.example.com',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$domain:** `string` — Custom landing page domain.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;create($request) -> ?CreateLandingPagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a draft landing page from default template content or supplied builder JSON.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->create(
    new CreateLandingPagesRequest([
        'name' => 'Product Waitlist',
        'slug' => 'product-waitlist',
        'template' => CreateLandingPagesRequestTemplate::Waitlist->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$content:** `?LandingPageContent` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Landing page name.
    
</dd>
</dl>

<dl>
<dd>

**$slug:** `?string` — URL slug. It is normalized and made unique for the company.
    
</dd>
</dl>

<dl>
<dd>

**$template:** `?string` — Template key used when content is omitted.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;delete($landingPageId) -> ?DeleteLandingPagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a landing page.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->delete(
    'landingPageId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$landingPageId:** `string` — Landing page ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;duplicate($landingPageId, $request) -> ?DuplicateLandingPagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Copies a landing page into a new draft with its own slug, views, and conversions. The original keeps its published URL and stats.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->duplicate(
    'landingPageId',
    new DuplicateLandingPagesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$landingPageId:** `string` — Landing page ID to copy
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Name for the copy. Defaults to the original name with a "(copy)" suffix.
    
</dd>
</dl>

<dl>
<dd>

**$slug:** `?string` — Slug for the copy. Normalized and made unique within the company.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;get($landingPageId) -> ?GetLandingPagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns one landing page with builder content and public URLs.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->get(
    'landingPageId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$landingPageId:** `string` — Landing page ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;getDedicatedDomain($landingPageId) -> ?GetDedicatedDomainLandingPagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the domain assigned only to this landing page plus its workspace fallback.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->getDedicatedDomain(
    'landingPageId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$landingPageId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;getDomain() -> ?GetDomainLandingPagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the custom landing page domain settings for the authenticated company.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->getDomain();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;list() -> ?ListLandingPagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists landing pages for the authenticated company.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;publish($landingPageId, $request) -> ?PublishLandingPagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Publishes a landing page and optionally updates name, slug, or content first.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->publish(
    'landingPageId',
    new PublishLandingPagesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$landingPageId:** `string` — Landing page ID
    
</dd>
</dl>

<dl>
<dd>

**$content:** `?LandingPageContent` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$slug:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;removeDedicatedDomain($landingPageId) -> ?RemoveDedicatedDomainLandingPagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Removes only the page-specific hostname. Workspace and Sequenzy fallback URLs remain available.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->removeDedicatedDomain(
    'landingPageId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$landingPageId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;render($landingPageId) -> ?RenderLandingPagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a signed, unlisted preview URL for the current landing page content. Works for drafts. Does not publish the page or collect signup form submissions on a draft preview.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->render(
    'landingPageId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$landingPageId:** `string` — Landing page ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;unpublish($landingPageId, $request) -> ?UnpublishLandingPagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a landing page to draft status and optionally updates name, slug, or content first.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->unpublish(
    'landingPageId',
    new UnpublishLandingPagesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$landingPageId:** `string` — Landing page ID
    
</dd>
</dl>

<dl>
<dd>

**$content:** `?LandingPageContent` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$slug:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;update($landingPageId, $request) -> ?UpdateLandingPagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates a landing page name, slug, or builder content.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->update(
    'landingPageId',
    new UpdateLandingPagesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$landingPageId:** `string` — Landing page ID
    
</dd>
</dl>

<dl>
<dd>

**$content:** `?LandingPageContent` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$slug:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;updateDomainSettings($request) -> ?UpdateDomainSettingsLandingPagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replaces the custom landing page domain, verifies the current domain, or both.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->updateDomainSettings(
    new UpdateDomainSettingsLandingPagesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$domain:** `?string` — Replacement custom landing page domain.
    
</dd>
</dl>

<dl>
<dd>

**$verify:** `?bool` — Check DNS and SSL status for the current domain.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;verifyDedicatedDomain($landingPageId) -> ?VerifyDedicatedDomainLandingPagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Checks DNS and SSL status for the hostname assigned to this landing page.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->verifyDedicatedDomain(
    'landingPageId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$landingPageId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;landingPages-&gt;verifyDomain() -> ?VerifyDomainLandingPagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Checks DNS and SSL status for the current custom landing page domain.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->landingPages->verifyDomain();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Lists
<details><summary><code>$client-&gt;lists-&gt;addSubscribers($listId, $request) -> ?AddSubscribersListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Adds existing or new subscribers to one subscriber list from an email array. Use this endpoint without a `/bulk` suffix. Requires the lists:write and subscribers:write scopes.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->addSubscribers(
    'listId',
    new AddSubscribersListsRequest([
        'emails' => [
            'emails',
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — Subscriber list ID.
    
</dd>
</dl>

<dl>
<dd>

**$duplicateStrategy:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$emails:** `array` — Up to 500 email addresses per request.
    
</dd>
</dl>

<dl>
<dd>

**$enrollInSequences:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$optInMode:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;create($request) -> ?CreateListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a subscriber list for grouping contacts.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->create(
    new CreateListsRequest([
        'name' => 'name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$description:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$isPrivate:** `?bool` — Set to true to keep the list internal and omit it from individual controls on the hosted subscriber email preferences/unsubscribe page. Public lists expose their name and description on that page. List privacy does not override a subscriber's global unsubscribe. Defaults to false when omitted.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;delete($listId) -> ?DeleteListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a subscriber list and removes all list memberships. Subscribers themselves are not deleted.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->delete(
    'listId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — Subscriber list ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;list() -> ?ListListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists subscriber lists for the authenticated company. Each list includes subscriberCount (current members of any status) and activeSubscriberCount (current members with status=active). Members who unsubscribed from the list are not counted.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;removeSubscribers($listId, $request) -> ?RemoveSubscribersListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Removes subscribers from one subscriber list by email or subscriber ID. Subscribers themselves are not deleted. Requires the lists:write and subscribers:write scopes, the same as adding them.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->removeSubscribers(
    'listId',
    new RemoveSubscribersListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — Subscriber list ID.
    
</dd>
</dl>

<dl>
<dd>

**$emails:** `?array` — Email addresses to remove. Combined with subscriberIds, up to 500 per request.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberIds:** `?array` — Subscriber IDs to remove. Combined with emails, up to 500 per request.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;lists-&gt;update($listId, $request) -> ?UpdateListsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates a subscriber list's name, description, or privacy flag. Only provided fields are changed.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->lists->update(
    'listId',
    new UpdateListsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listId:** `string` — Subscriber list ID.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — New list description. Pass null to clear it.
    
</dd>
</dl>

<dl>
<dd>

**$isPrivate:** `?bool` — Set to true to keep the list internal and omit it from individual controls on the hosted subscriber email preferences/unsubscribe page. Set to false to expose its name and description on that page. List privacy does not override a subscriber's global unsubscribe. Omit this field to leave the current visibility unchanged.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — New list name.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Media
<details><summary><code>$client-&gt;media-&gt;completeEmailImageUpload($request) -> ?CompleteEmailImageUploadResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Idempotently registers a completed company-scoped image upload in the shared media library and returns its hosted URL.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->media->completeEmailImageUpload(
    new CompleteEmailImageUploadRequest([
        'altText' => 'altText',
        'contentType' => 'image/png',
        'filename' => 'filename',
        'fileSizeBytes' => 1,
        'key' => 'key',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$altText:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$contentType:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$filename:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$fileSizeBytes:** `int` 
    
</dd>
</dl>

<dl>
<dd>

**$height:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$key:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$width:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;media-&gt;createEmailImageUploadUrl($request) -> ?CreateEmailImageUploadUrlResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns an authenticated API URL for a block-ready email image. PUT the exact bytes to uploadUrl using the same API credentials, then register the key with POST /media/complete-upload. The public object does not exist until its bytes pass server-side validation.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->media->createEmailImageUploadUrl(
    new CreateEmailImageUploadUrlRequest([
        'contentType' => 'image/png',
        'filename' => 'filename',
        'fileSizeBytes' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contentType:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$filename:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$fileSizeBytes:** `int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;media-&gt;uploadEmailImageBytes($request) -> ?UploadEmailImageBytesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Uploads the exact bytes to the authenticated URL returned by POST /media/upload-url. The server enforces the requested size, verifies the file signature, and creates the public object only once.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->media->uploadEmailImageBytes($request): ?UploadEmailImageBytesResponse;
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contentType:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$filename:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$fileSizeBytes:** `int` 
    
</dd>
</dl>

<dl>
<dd>

**$key:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Migrations
<details><summary><code>$client-&gt;migrations-&gt;approvePlan($runId, $request) -> ?ApprovePlanMigrationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Approves provider-neutral resources and freezes the execution plan for a migration run.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->migrations->approvePlan(
    'runId',
    new ApprovePlanMigrationsRequest([
        'resourceIds' => [
            'resourceIds',
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$runId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$resourceIds:** `array` 
    
</dd>
</dl>

<dl>
<dd>

**$resourceOptions:** `?array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;migrations-&gt;cancel($runId) -> ?CancelMigrationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancels queued/pre-execution runs immediately. Running imports move to cancel_requested while workers stop linked subscriber import chunks, then finish as canceled.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->migrations->cancel(
    'runId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$runId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;migrations-&gt;connectSource($runId, $request) -> ?ConnectSourceMigrationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Stores a provider credential on an existing migration run connection.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->migrations->connectSource(
    'runId',
    new ConnectSourceMigrationsRequest([
        'credential' => 'credential',
        'provider' => 'provider',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$runId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$credential:** `string` — Provider API credential.
    
</dd>
</dl>

<dl>
<dd>

**$provider:** `string` — Provider adapter ID. Supported values include `active-campaign`, `brevo`, `constant-contact`, `customer-io`, `drip`, `hubspot`, `kit`, `klaviyo`, `loops`, `mailchimp`, `mailerlite`, `mailjet`, `omnisend`, `resend`, and `sendgrid`.
    
</dd>
</dl>

<dl>
<dd>

**$providerLabel:** `?string` — Optional display label for manual providers.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;migrations-&gt;discoverSource($runId) -> ?DiscoverSourceMigrationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Queues provider discovery for a migration run.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->migrations->discoverSource(
    'runId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$runId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;migrations-&gt;getAgentPackage($runId) -> ?GetAgentPackageMigrationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns endpoint URLs and exact call sequence for an agent-assisted migration.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->migrations->getAgentPackage(
    'runId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$runId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;migrations-&gt;getRun($runId) -> ?GetRunMigrationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns provider-neutral migration status, discovery, plan, progress, and report.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->migrations->getRun(
    'runId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$runId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;migrations-&gt;start($runId, $request) -> ?StartMigrationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Queues execution for an approved migration run.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->migrations->start(
    'runId',
    new StartMigrationsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$runId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$resourceIds:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$resourceOptions:** `?array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## NotificationPreferences
<details><summary><code>$client-&gt;notificationPreferences-&gt;get() -> ?NotificationPreferences</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the account notification settings for the API key's own user in the active company, along with the modes each event supports and the platform defaults. Every event is always present; an event the user has never configured reports its default. There is no way to read another member's preferences through this API. Requires account:read.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->notificationPreferences->get();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;notificationPreferences-&gt;update($request) -> ?NotificationPreferences</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Changes which account notifications Sequenzy emails the API key's own user for the active company. Events not listed keep their current value. Useful before a bulk import or migration, though imports never trigger new-subscriber notifications in the first place. Requires companies:manage; account:read alone cannot mutate these settings.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->notificationPreferences->update(
    new UpdateNotificationPreferencesRequest([
        'notificationPreferences' => [
            new NotificationPreference([
                'event' => NotificationPreferenceEvent::NewSubscriber->value,
                'mode' => NotificationPreferenceMode::Off->value,
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$notificationPreferences:** `array` — Preferences to set. Events not listed are left unchanged.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Orders
<details><summary><code>$client-&gt;orders-&gt;push($request) -> ?PushOrdersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Pushes a normalized order from any e-commerce platform. Triggers the matching ecommerce.* event (order placed, cancelled, fulfilled, or refunded), updates the customer's revenue attributes (ltv, totalSpent, ordersCount, aov), cancels superseded commerce automations, and schedules replenishment reminders. Processing is asynchronous.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->orders->push(
    new PushOrdersRequest([
        'currency' => 'USD',
        'customer' => new CommerceCustomer([
            'email' => 'buyer@example.com',
        ]),
        'orderId' => 'order-1001',
        'totalCents' => 8850,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$currency:** `string` — ISO 4217 currency code
    
</dd>
</dl>

<dl>
<dd>

**$customer:** `CommerceCustomer` 
    
</dd>
</dl>

<dl>
<dd>

**$customerTotals:** `?PushOrdersRequestCustomerTotals` — Authoritative customer aggregates from your platform. When provided, these override Sequenzy's additive revenue bookkeeping.
    
</dd>
</dl>

<dl>
<dd>

**$items:** `?array` — Order line items
    
</dd>
</dl>

<dl>
<dd>

**$orderedAt:** `?DateTime` — ISO 8601 timestamp of when the order happened. Defaults to now.
    
</dd>
</dl>

<dl>
<dd>

**$orderId:** `string` — Unique order identifier in your platform. Used for idempotency - pushing the same orderId twice never double counts revenue.
    
</dd>
</dl>

<dl>
<dd>

**$orderNumber:** `?string` — Human-facing order number, if different from orderId
    
</dd>
</dl>

<dl>
<dd>

**$properties:** `?array` — Extra event properties to attach to the triggered ecommerce.* event
    
</dd>
</dl>

<dl>
<dd>

**$refundAmountCents:** `?int` — For refunded orders - refunded amount in cents
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Lifecycle status of this order event
    
</dd>
</dl>

<dl>
<dd>

**$totalCents:** `int` — Order total in cents
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;orders-&gt;trackCheckoutStarted($request) -> ?TrackCheckoutStartedResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Tracks a started checkout and triggers the ecommerce.checkout_started event, which can power abandoned checkout automations.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->orders->trackCheckoutStarted(
    new TrackCheckoutStartedRequest([
        'checkoutId' => 'checkout-abc123',
        'customer' => new CommerceCustomer([
            'email' => 'buyer@example.com',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$checkoutId:** `string` — Unique checkout identifier in your platform
    
</dd>
</dl>

<dl>
<dd>

**$checkoutUrl:** `?string` — URL the customer can use to resume the checkout
    
</dd>
</dl>

<dl>
<dd>

**$currency:** `?string` — ISO 4217 currency code
    
</dd>
</dl>

<dl>
<dd>

**$customer:** `CommerceCustomer` 
    
</dd>
</dl>

<dl>
<dd>

**$items:** `?array` — Checkout line items
    
</dd>
</dl>

<dl>
<dd>

**$properties:** `?array` — Extra event properties to attach to the triggered event
    
</dd>
</dl>

<dl>
<dd>

**$totalCents:** `?int` — Checkout total in cents
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Products
<details><summary><code>$client-&gt;products-&gt;attachDelivery($productId, $request) -> ?AttachDeliveryProductsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Attaches the distributable file delivered after a purchase of this product. Purchase events then expose it as download.url / download.name. Accepts the internal product id or, for Commerce API products, your productId.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->products->attachDelivery(
    'productId',
    new AttachDeliveryProductsRequest([
        'url' => 'url',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$productId:** `string` — Internal product id, or your own productId for products pushed via the Commerce API.
    
</dd>
</dl>

<dl>
<dd>

**$fileName:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$fileSizeBytes:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$mimeType:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$source:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$url:** `string` — Public http(s) URL of the file.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;products-&gt;createDeliveryUploadUrl($request) -> ?CreateDeliveryUploadUrlProductsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a presigned URL to upload a distributable file. PUT the file bytes to uploadUrl, then attach publicUrl to a product.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->products->createDeliveryUploadUrl(
    new CreateDeliveryUploadUrlProductsRequest([
        'contentType' => 'application/pdf',
        'filename' => 'filename',
        'fileSizeBytes' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contentType:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$filename:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$fileSizeBytes:** `int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;products-&gt;delete($productId) -> ?DeleteProductsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a product previously pushed via the Commerce API, identified by your productId. Products synced from other providers are not affected.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->products->delete(
    'productId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$productId:** `string` — Your product identifier
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;products-&gt;get($productId) -> ?GetProductsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a product previously pushed via the Commerce API, identified by your productId.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->products->get(
    'productId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$productId:** `string` — Your product identifier
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;products-&gt;list($request) -> ?ListProductsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists products in the catalog. Includes products synced from Stripe, Shopify/WooCommerce, and products pushed via the Commerce API.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->products->list(
    new ListProductsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` — Maximum number of products to return
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of products to skip
    
</dd>
</dl>

<dl>
<dd>

**$provider:** `?string` — Filter products by source provider
    
</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Filter products by title
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;products-&gt;registerBackInStock($request) -> ?RegisterBackInStockResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Registers a customer's request to be notified when a product (pushed via the Commerce API) is back in stock. When a later product upsert marks the product or variant in stock again, the ecommerce.back_in_stock event fires for waiting subscribers.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->products->registerBackInStock(
    new RegisterBackInStockRequest([
        'customer' => new CommerceCustomer([
            'email' => 'buyer@example.com',
        ]),
        'productId' => 'SKU-PROTEIN-1KG',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customer:** `CommerceCustomer` 
    
</dd>
</dl>

<dl>
<dd>

**$productId:** `string` — Your product identifier
    
</dd>
</dl>

<dl>
<dd>

**$productTitle:** `?string` — Product title snapshot. Defaults to the synced product title.
    
</dd>
</dl>

<dl>
<dd>

**$variantId:** `?string` — Your variant identifier. Defaults to productId for products without variants.
    
</dd>
</dl>

<dl>
<dd>

**$variantTitle:** `?string` — Variant title snapshot. Defaults to the synced variant title.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;products-&gt;removeDelivery($productId) -> ?RemoveDeliveryProductsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Removes the attached distributable file from a product. Accepts the internal product id or, for Commerce API products, your productId.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->products->removeDelivery(
    'productId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$productId:** `string` — Internal product id, or your own productId for products pushed via the Commerce API.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;products-&gt;syncStripe($request) -> ?SyncStripeProductsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Queues a sync of the Stripe product catalog into the products list. Requires an active Stripe integration with bulk sync enabled.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->products->syncStripe(
    new SyncStripeProductsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$integrationId:** `?string` — Stripe integration to sync. When omitted, the most recently connected active integration with bulk sync enabled is used.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;products-&gt;upsert($request) -> ?UpsertProductsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates or updates up to 100 products, keyed by your productId. Products pushed here behave like Shopify/WooCommerce products - they power product blocks, replenishment reminders, and back-in-stock notifications. Stock transitions trigger back-in-stock events for waiting subscribers. Updates are partial - omitted optional fields keep their stored values; pass an explicit null to clear one.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->products->upsert(
    new UpsertProductsRequest([
        'products' => [
            new UpsertProductsRequestProductsItem([
                'productId' => 'SKU-PROTEIN-1KG',
                'title' => 'Protein Powder',
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$products:** `array` — Products to create or update
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Segments
<details><summary><code>$client-&gt;segments-&gt;create($request) -> ?CreateSegmentsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a saved segment from either flat filters or a nested filter root.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->segments->create(
    [
        'key' => "value",
    ],
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `mixed` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;segments-&gt;delete($segmentId) -> ?DeleteSegmentsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a saved segment. Subscribers matched by the segment are not affected.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->segments->delete(
    'segmentId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$segmentId:** `string` — Segment ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;segments-&gt;getCount($segmentId) -> ?GetCountSegmentsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the current subscriber count for a saved segment.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->segments->getCount(
    'segmentId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$segmentId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;segments-&gt;list() -> ?ListSegmentsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists saved segments and subscriber counts for the authenticated company.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->segments->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;segments-&gt;update($segmentId, $request) -> ?UpdateSegmentsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates a saved segment's name or filter definition.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->segments->update(
    'segmentId',
    new UpdateSegmentsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$segmentId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$filterJoinOperator:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$filters:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$root:** `?FilterGroup` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## SenderProfiles
<details><summary><code>$client-&gt;senderProfiles-&gt;list() -> ?ListSenderProfilesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists sender (From) and reply-to profiles, which are the account defaults, and whether each sender address sits on a verified sending domain. SMTP submission sends into Sequenzy; outbound delivery remains Sequenzy-managed through SES or Sequenzy's MTA, so customer-managed SMTP relays are not supported.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->senderProfiles->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;senderProfiles-&gt;update($id, $request) -> ?UpdateSenderProfilesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Renames one sender (From) profile in place. Only the display name changes - the address, its sending domain, and the account-wide default From selection are left untouched, so a display name can be standardized across the several identities one mailbox may carry. To change which profile is the account default instead, use PATCH /v1/companies/{companyId} with senderProfileId. Requires companies:manage.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->senderProfiles->update(
    'id',
    new UpdateSenderProfilesRequest([
        'name' => 'SnapCount',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Sender profile ID, from GET /v1/sender-profiles.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — New display name. Trimmed before saving.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;senderProfiles-&gt;updateReplyProfile($id, $request) -> ?UpdateReplyProfileResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Renames one reply-to profile in place. Only the display name changes - the address and the account-wide default Reply-To selection are left untouched. Requires companies:manage.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->senderProfiles->updateReplyProfile(
    'id',
    new UpdateReplyProfileRequest([
        'name' => 'SnapCount',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Reply-to profile ID, from GET /v1/sender-profiles.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — New display name. Trimmed before saving.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## SendingStatus
<details><summary><code>$client-&gt;sendingStatus-&gt;get() -> ?SendingStatus</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns whether company-level sending is active, paused, or suspended, the pause reason, the sender-health counts and thresholds behind it, the automated review state, whether sending can be restored without support, and ordered remediation steps. Call this whenever a send or test send fails for a reason that is not a validation error. Enforcement uses all-time totals from a reset watermark rather than a rolling window, so metricsWindow.expiresAt is always null and waiting does not restore sending. Requires the account:read scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sendingStatus->get();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sendingStatus-&gt;resume($request) -> ?ResumeSendingStatusResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Restores company-level sending paused by a high permanent-bounce rate, after the cause has been fixed. This is not a bypass - it enforces the same gates as the dashboard and never removes suppressions. For a paused workspace, sending is restored only when selfResume.canSelfResume is true on GET /sending-status, which requires a high_hard_bounce_rate pause, a cleared automated sender-health review, and no admin block. An already-active workspace succeeds as an idempotent no-op with resumed false. On restoration the bounce watermark moves to now and the service attempts to requeue paused campaigns plus due sequence steps. A partial queue handoff still returns the committed active state with recovery guidance in message. Requires the companies:manage scope plus owner or admin access.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sendingStatus->resume(
    new ResumeSendingStatusRequest([
        'listSanitizationConfirmed' => true,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$listSanitizationConfirmed:** `bool` — Must be true. Confirms the source of the invalid addresses is fixed and permanent bounces remain suppressed. Recorded on the account audit trail.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Sequences
<details><summary><code>$client-&gt;sequences-&gt;archive($sequenceId) -> ?ArchiveSequencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Archives a sequence and stops new enrollments.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->archive(
    'sequenceId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;cancelEnrollments($sequenceId, $request) -> ?SequenceEnrollmentCancelResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancels active or waiting enrollments in one sequence. Target every enrollment with cancelAll, a batch with subscriberIds, one contact with subscriberId, or matching stored entry event property values with fieldValues. Bulk cancellation is capped at 1000 enrollments per request; repeat the request while remainingCount is above zero.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->cancelEnrollments(
    'sequenceId',
    new SequenceEnrollmentCancelRequest([
        'cancelAll' => true,
        'dryRun' => false,
        'reason' => 'Lifecycle cutover',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` — Sequence ID
    
</dd>
</dl>

<dl>
<dd>

**$cancelAll:** `?bool` — Cancel every active or waiting enrollment in the sequence, regardless of how contacts entered it. Use this when segment-triggered enrollments share no entry field value. Defaults to dry run unless dryRun is explicitly false.
    
</dd>
</dl>

<dl>
<dd>

**$dryRun:** `?bool` — When true, returns matching enrollments without cancelling them. cancelAll, subscriberIds, and fieldValues default to dry run unless explicitly false; a single subscriberId cancels immediately.
    
</dd>
</dl>

<dl>
<dd>

**$fieldPath:** `?string` — Dot-path inside the token's stored entry event properties. If omitted, the sequence enrollmentFieldPath is used.
    
</dd>
</dl>

<dl>
<dd>

**$fieldValues:** `?array` — Entry field values to match.
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `?string` — Optional reason stored on cancelled enrollment tokens.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberId:** `?string` — Subscriber ID to cancel in this sequence.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberIds:** `?array` — Up to 500 subscriber IDs to cancel in this sequence. IDs that do not resolve are returned in target.notFoundSubscriberIds. Defaults to dry run unless dryRun is explicitly false.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;configureInboundWebhook($sequenceId, $request) -> ?ConfigureInboundWebhookSequencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates or updates the endpoint attached to an inbound_webhook trigger. On first setup, omitted fields use catalog/custom integration defaults; on later calls, omitted fields keep their saved values. Use null to clear a saved mapping or sample.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->configureInboundWebhook(
    'sequenceId',
    new ConfigureInboundWebhookSequencesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$fieldMapping:** `?SequenceInboundWebhookFieldMapping` 
    
</dd>
</dl>

<dl>
<dd>

**$samplePayload:** `?array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;create($request) -> ?SequenceCreateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a draft automation sequence using AI-generated content, explicit email/action steps, or a blank trigger-to-completion graph when both are omitted. Discount action steps dynamically generate Stripe or Shopify codes that later emails can reference with discount merge tags.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->create(
    new SequenceCreateRequest([
        'name' => 'Cancellation feedback',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$bccEmails:** `?array` — Addresses blind-copied on every sequence email.
    
</dd>
</dl>

<dl>
<dd>

**$customIntegration:** `?array` — Custom inbound-webhook integration metadata.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Optional dashboard description.
    
</dd>
</dl>

<dl>
<dd>

**$durationDays:** `?float` — Total duration in days used to space AI-generated emails. Omit this to use the default sequence delay schedule.
    
</dd>
</dl>

<dl>
<dd>

**$emailCount:** `?float` — Number of emails for AI-generated content. Defaults to 5. Maximum is 10.
    
</dd>
</dl>

<dl>
<dd>

**$emailStyle:** `?string` — Style for the AI-generated emails: visual (designed, with heroes/imagery/rich sections) or plain (personal, text-first notes with a single button). Defaults to the company's saved preference when omitted.
    
</dd>
</dl>

<dl>
<dd>

**$enrollmentFieldPath:** `?string` — Scalar dot-path event property used by matching_field enrollment, such as order.id or product.providerVariantId. Array traversal with [] is not supported; use propertyFilters for array matching. Applies to event_received and inbound_webhook triggers. Leave empty for built-in Shopify product/variant defaults.
    
</dd>
</dl>

<dl>
<dd>

**$enrollmentMode:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$eventName:** `?string` — Event name for event_received, inbound_webhook, inactivity, and frequency triggers.
    
</dd>
</dl>

<dl>
<dd>

**$fromEmail:** `?string` — From address for every email in this sequence. Its domain must be configured and verified.
    
</dd>
</dl>

<dl>
<dd>

**$fromName:** `?string` — Display name recipients see, e.g. 'Brennon at TradeTally'. Selects the sender identity of that name on fromEmail, creating it when the address has no identity by that name; the mailbox's other display names, and everything pinned to them, are untouched. Requires fromEmail; omit it when using senderProfileId, which already carries its own display name.
    
</dd>
</dl>

<dl>
<dd>

**$goal:** `?string` — Goal for AI-generated sequence content. Provide either goal or steps, or omit both for a blank dashboard-compatible draft.
    
</dd>
</dl>

<dl>
<dd>

**$inactiveDays:** `?float` — Days of inactivity before the sequence starts.
    
</dd>
</dl>

<dl>
<dd>

**$inactivityBaseline:** `?string` — For inactivity triggers, controls when to start counting for subscribers who have never performed the event. Defaults to sequence_created_at.
    
</dd>
</dl>

<dl>
<dd>

**$integrationEventKey:** `?string` — Integration event key for inbound_webhook triggers.
    
</dd>
</dl>

<dl>
<dd>

**$integrationSlug:** `?string` — Integration slug for inbound_webhook triggers.
    
</dd>
</dl>

<dl>
<dd>

**$labels:** `?array` — Dashboard label names. Missing labels are created.
    
</dd>
</dl>

<dl>
<dd>

**$listId:** `?string` — List ID for contact_added triggers. Omit it to use listScope instead. Use listIds to trigger on several lists.
    
</dd>
</dl>

<dl>
<dd>

**$listIds:** `?array` — Several list IDs for a contact_added trigger. A contact joining ANY of them enrolls. Takes precedence over listId when both are sent. Cannot be combined with listScope.
    
</dd>
</dl>

<dl>
<dd>

**$listScope:** `?string` — For contact_added triggers with no list at all. `any_contact` (the default) enrolls every contact added, including contacts that join no list - which is what integrations create when list targeting is empty. `any_list` waits until the contact joins a list. Cannot be combined with listId or listIds.
    
</dd>
</dl>

<dl>
<dd>

**$minCount:** `?float` — Minimum event count for frequency triggers.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$propertyFilters:** `?array` — Event property filters for event_received and inbound_webhook triggers. The sequence only starts when the triggering event's properties match all filters. Use [] in the path to match items inside arrays.
    
</dd>
</dl>

<dl>
<dd>

**$replyProfileId:** `?string` — Existing reply profile ID. It already supplies both the Reply-To address and display name, so send it on its own and omit replyTo and replyToName.
    
</dd>
</dl>

<dl>
<dd>

**$replyTo:** `?string` — Reply-To address for every email in this sequence. A profile is created when needed.
    
</dd>
</dl>

<dl>
<dd>

**$replyToName:** `?string` — Display name for the Reply-To address. Requires replyTo; omit it when using replyProfileId, which already carries its own display name. An address carries one Reply-To name company-wide, so if replyTo already has a saved profile under a different name, that saved name is kept and the response `warnings` array says so.
    
</dd>
</dl>

<dl>
<dd>

**$segmentId:** `?string` — Segment ID for segment_entered triggers.
    
</dd>
</dl>

<dl>
<dd>

**$senderProfileId:** `?string` — Existing sender profile ID. It already supplies both the From address and display name, so send it on its own and omit fromEmail and fromName. To keep this profile under a different display name, set fromName on the email steps instead, where it is a per-step override.
    
</dd>
</dl>

<dl>
<dd>

**$sendingWindow:** `?SequenceSendingWindow` 
    
</dd>
</dl>

<dl>
<dd>

**$steps:** `?array` — Explicit email and action steps. Provide either steps or goal, or omit both for a blank dashboard-compatible draft.
    
</dd>
</dl>

<dl>
<dd>

**$stopCondition:** `?SequenceStopCondition` 
    
</dd>
</dl>

<dl>
<dd>

**$stopOnSegmentExit:** `?bool` — For segment_entered triggers, cancel enrollment when the subscriber leaves the segment.
    
</dd>
</dl>

<dl>
<dd>

**$tagName:** `?string` — Tag name for tag_added triggers. Use tagNames to trigger on several tags.
    
</dd>
</dl>

<dl>
<dd>

**$tagNames:** `?array` — Several tag names for a tag_added trigger. Receiving ANY of them enrolls the contact. Takes precedence over tagName when both are sent.
    
</dd>
</dl>

<dl>
<dd>

**$timeWindowDays:** `?float` — Time window in days for frequency triggers.
    
</dd>
</dl>

<dl>
<dd>

**$trigger:** `?string` — Defaults to contact_added when omitted.
    
</dd>
</dl>

<dl>
<dd>

**$userCancellable:** `?bool` — Whether recipients can cancel this sequence from email preferences.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;createGoal($sequenceId, $request) -> ?CreateGoalSequencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a conversion goal for an event, subscriber attribute change, or applied tag.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->createGoal(
    'sequenceId',
    new CreateGoalSequencesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;delete($sequenceId) -> ?SequenceActionResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a sequence and its automation nodes.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->delete(
    'sequenceId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` — Sequence ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;deleteGoal($sequenceId, $goalId) -> ?DeleteGoalSequencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Permanently removes a conversion goal from the sequence.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->deleteGoal(
    'sequenceId',
    'goalId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$goalId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;disable($sequenceId) -> ?SequenceActionResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Pauses a sequence, blocks new enrollments, and holds workflow execution until the sequence is enabled again.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->disable(
    'sequenceId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` — Sequence ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;duplicate($sequenceId, $request) -> ?DuplicateSequencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates an independent draft copy of the sequence graph, email templates, and sequence A/B tests.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->duplicate(
    'sequenceId',
    new DuplicateSequencesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Optional name for the copy.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;enable($sequenceId) -> ?SequenceActionResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Activates a sequence and opens it for new enrollments. Activation enforces the same readiness checks returned by simulateSequence; invalid triggers, incomplete steps, disconnected graphs, and archived sequences are rejected without changing status. If it was paused, held subscribers continue from their current step and due waits are queued gradually.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->enable(
    'sequenceId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` — Sequence ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;enrollSubscribersIn($sequenceId, $request) -> ?EnrollSubscribersInSequencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Manually enrolls active subscribers into a sequence by email or subscriber ID, starting at the first step or a specific node.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->enrollSubscribersIn(
    'sequenceId',
    new EnrollSubscribersInSequencesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` — Sequence ID.
    
</dd>
</dl>

<dl>
<dd>

**$emails:** `?array` — Subscriber emails to enroll. Combined with subscriberIds, up to 500 per request.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberIds:** `?array` — Subscriber IDs to enroll. Combined with emails, up to 500 per request.
    
</dd>
</dl>

<dl>
<dd>

**$targetNodeId:** `?string` — Node to start enrollment at. Defaults to the first step after the trigger. Cannot be a trigger node.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;generate($request) -> ?GenerateSequencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deprecated compatibility alias that creates and persists a disabled contact_added sequence draft from a goal. Use POST /sequences for new integrations.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->generate(
    new GenerateSequencesRequest([
        'goal' => 'Onboard a new workspace admin',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$durationDays:** `?float` — Duration used to space suggested delays. Defaults to 14.
    
</dd>
</dl>

<dl>
<dd>

**$emailCount:** `?float` — Number of emails to generate. Defaults to 5. Maximum is 10.
    
</dd>
</dl>

<dl>
<dd>

**$goal:** `string` — Sequence goal or desired subscriber journey.
    
</dd>
</dl>

<dl>
<dd>

**$listId:** `?string` — Optional list ID that scopes the contact_added trigger.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Optional sequence name. Defaults to the normalized goal.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;get($sequenceId) -> ?GetSequencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns sequence metadata, nodes, and editable email steps.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->get(
    'sequenceId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` — Sequence ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;getEnrollmentRealignment($sequenceId, $jobId) -> ?SequenceEnrollmentRealignJobResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the state of an applied realignment job. When status is completed, result contains the bounded realignment result and any continuation cursor.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->getEnrollmentRealignment(
    'sequenceId',
    'jobId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$jobId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;getInboundWebhook($sequenceId) -> ?GetInboundWebhookSequencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the endpoint configuration attached to an inbound_webhook trigger.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->getInboundWebhook(
    'sequenceId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;getStats($sequenceId, $request) -> ?GetStatsSequencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns aggregated engagement metrics plus a live active/waiting enrollment breakdown by current node for a specific sequence. This is an alias for /metrics/sequences/{sequenceId}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->getStats(
    'sequenceId',
    new GetStatsSequencesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` — Sequence ID
    
</dd>
</dl>

<dl>
<dd>

**$end:** `?DateTime` — End of custom time range (ISO 8601). Must be used with `start`. Max range: 90 days.
    
</dd>
</dl>

<dl>
<dd>

**$includeMachineEngagement:** `?bool` — Include detected scanner, preview, and tracked asset open/click events.
    
</dd>
</dl>

<dl>
<dd>

**$period:** `?string` — Sliding time window. Ignored when `start` and `end` are provided.
    
</dd>
</dl>

<dl>
<dd>

**$start:** `?DateTime` — Start of custom time range (ISO 8601). Must be used with `end`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;list($request) -> ?ListSequencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns filtered, paginated automation sequences for the authenticated company.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->list(
    new ListSequencesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$labels:** `?string` — Comma-separated dashboard label names. The label alias is also accepted.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Page size, up to 100. When limit and offset are both omitted, every sequence is returned.
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Case-insensitive name or description search.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;listEnrollments($sequenceId, $request) -> ?SequenceEnrollmentListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists the individual contacts enrolled in one sequence, with the node each one is currently sitting on. Defaults to active and waiting enrollments. Use this when sequence stats give you enrollmentCounts and you need the actual subscribers behind a number.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->listEnrollments(
    'sequenceId',
    new ListEnrollmentsSequencesRequest([
        'currentNodeId' => 'node_wave_1',
        'email' => 'customer@example.com',
        'status' => 'waiting',
        'subscriberId' => 'sub_abc123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` — Sequence ID
    
</dd>
</dl>

<dl>
<dd>

**$currentNodeId:** `?string` — Comma-separated sequence node IDs. Only enrollments currently sitting on one of these nodes are returned.
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — Exact email address to match, case-insensitive.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Enrollments per page. Values above 500 are capped, and above 100 when stopConditionMatch is true.
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of enrollments to skip. Page until pagination.hasMore is false.
    
</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Result order. Defaults to enrolled_at_desc. Enrollments with no scheduled resume sort last under wait_until ordering.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Comma-separated enrollment statuses: active, waiting, completed, failed, cancelled. Defaults to active,waiting.
    
</dd>
</dl>

<dl>
<dd>

**$stopConditionMatch:** `?bool` — Annotate each returned active or waiting enrollment with whether the sequence stop condition already matches for that contact right now. Stop conditions are re-evaluated when an enrollment next runs a step, not when their event arrives, so a stopped contact keeps reporting waiting until its delay expires. Use this to confirm a stop event registered without waiting the delay out. Caps the page at 100 regardless of limit.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberId:** `?string` — Comma-separated subscriber IDs.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;listGoals($sequenceId) -> ?ListGoalsSequencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists the conversion goals configured for a sequence.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->listGoals(
    'sequenceId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;moveEnrollments($sequenceId, $request) -> ?SequenceEnrollmentMoveResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Releases a bounded batch of contacts off one sequence step and onto another, keeping their existing enrollment, entry event properties, and stop-condition snapshots. Moved contacts become active on the target step immediately. Defaults to a dry run; each call is capped at 500 and is never drained automatically, so repeat the request while remainingCount is above zero. Works while new enrollment is paused, because the contacts are already enrolled.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->moveEnrollments(
    'sequenceId',
    new SequenceEnrollmentMoveRequest([
        'fromNodeId' => 'node_delay_2',
        'limit' => 180,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` — Sequence ID
    
</dd>
</dl>

<dl>
<dd>

**$dailyLimit:** `?float` — Refuses to move more than this many enrollments onto targetNodeId in a rolling 24 hours, counting the moves recorded by earlier calls.
    
</dd>
</dl>

<dl>
<dd>

**$dryRun:** `?bool` — When true (the default), reports which enrollments would move without moving them.
    
</dd>
</dl>

<dl>
<dd>

**$fromNodeId:** `string` — Node ID the contacts are currently sitting on, such as the delay step they are waiting at.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — Maximum enrollments to move in this call. Defaults to 100, maximum 500.
    
</dd>
</dl>

<dl>
<dd>

**$reason:** `?string` — Note stored on every moved enrollment and returned as moveReason when listing enrollments.
    
</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Which enrollments to take first. Defaults to wait_until_asc, the contacts that have been waiting longest for their next step.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberIds:** `?array` — Optional narrowing filter. Only move these subscribers, up to 500.
    
</dd>
</dl>

<dl>
<dd>

**$tags:** `?array` — Existing tag names applied to the moved contacts. Requires the subscribers:tag scope. Applying them never enrolls contacts in tag_added sequences.
    
</dd>
</dl>

<dl>
<dd>

**$targetNodeId:** `?string` — Node ID to move them onto. Defaults to the source step's only next step, and is required when that step branches or is terminal. Cannot be the trigger node.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;pauseEnrollments($sequenceId) -> ?SequenceActionResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Stops new subscribers from entering an active sequence while current recipients continue through the sequence.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->pauseEnrollments(
    'sequenceId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` — Sequence ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;realignEnrollments($sequenceId, $request) -> ?SequenceEnrollmentRealignResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Pulls waiting enrollments forward to the start of the sequence sending window on the day they are already scheduled for. Changing a sending window leaves existing waits alone, so a widened window never reaches contacts already parked on an email-bound delay step and a narrowed one defers them to the next allowed day. Sequence windows never advance SMS, webhooks, branches, or other non-email actions. A wait only ever moves earlier, never onto a different local day, and never before now. Nobody is cancelled or re-enrolled. Defaults to a synchronous dry run; set dryRun false to queue a background apply job, then poll its status endpoint. Each job is capped at 1000 enrollments; when the completed result has hasMore true, pass nextCursor as cursor on the next request.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->realignEnrollments(
    'sequenceId',
    new SequenceEnrollmentRealignRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` — Sequence ID
    
</dd>
</dl>

<dl>
<dd>

**$cursor:** `?string` — Opaque continuation cursor. When a response has hasMore true, pass its nextCursor here to continue after the enrollments already scanned.
    
</dd>
</dl>

<dl>
<dd>

**$dryRun:** `?bool` — When true (the default), returns the new wait times without writing them. Set false to apply.
    
</dd>
</dl>

<dl>
<dd>

**$nodeIds:** `?array` — Step IDs to limit realignment to. Defaults to every step.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberIds:** `?array` — Up to 500 subscriber IDs to limit realignment to. Defaults to every waiting contact.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;renderStep($sequenceId, $nodeId, $request) -> ?RenderEmailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Render one sequence email step to the exact email-safe HTML that would be sent, for embedding a visual preview. Read-only: this never sends or modifies anything, and uses POST only so personalization input can travel in a request body.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->renderStep(
    'sequenceId',
    'nodeId',
    new RenderStepSequencesRequest([
        'body' => new RenderEmailRequest([]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` — Sequence ID
    
</dd>
</dl>

<dl>
<dd>

**$nodeId:** `string` — Email step node ID
    
</dd>
</dl>

<dl>
<dd>

**$request:** `RenderEmailRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;resumeEnrollments($sequenceId) -> ?SequenceActionResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Reopens new enrollments for an active sequence whose enrollment gate was paused. Use enableSequence for a fully disabled sequence.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->resumeEnrollments(
    'sequenceId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` — Sequence ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;rotateInboundWebhookSecret($sequenceId) -> ?RotateInboundWebhookSecretSequencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Immediately invalidates the previous URL and returns the replacement endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->rotateInboundWebhookSecret(
    'sequenceId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;sendTestEmail($sequenceId, $nodeId, $request) -> ?SendTestEmailSequencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Queues a real test email for one saved action_email sequence step to one or more internal reviewers. action_ab_test steps are not supported; inspect their variants on the sequence detail emails[].abTest.variants payload. The sequence is not activated and no subscribers are enrolled. Returns one durable email send ID per recipient for delivery inspection.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->sendTestEmail(
    'sequenceId',
    'nodeId',
    new SendTestEmailSequencesRequest([
        'recipients' => [
            'recipients',
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` — Sequence ID containing the email step.
    
</dd>
</dl>

<dl>
<dd>

**$nodeId:** `string` — action_email step node ID returned by the sequence detail endpoint. Do not pass an action_ab_test node.
    
</dd>
</dl>

<dl>
<dd>

**$recipients:** `array` — Internal reviewer email addresses. Duplicate addresses are sent only once.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;simulate($sequenceId, $request) -> ?SimulateSequencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Dry-runs a sequence without sending mail or enrolling anyone. Activating does not auto-enroll anyone. Without a subscriber this reports who currently matches and activation readiness errors. Pass subscriberId or email to also walk that stored contact's branch path. Always requires both sequences:read and subscribers:read because results include contact samples.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->simulate(
    'sequenceId',
    new SimulateSequencesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` — Sequence ID
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — Optional stored subscriber email to walk through the graph. Do not pass with subscriberId.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — How many currently matching contacts to include in the sample. Defaults to 10, maximum 25.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberId:** `?string` — Optional stored subscriber to walk through the graph. Do not pass with email.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;unarchive($sequenceId) -> ?UnarchiveSequencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Restores an archived sequence as a disabled draft for review.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->unarchive(
    'sequenceId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;update($sequenceId, $request) -> ?UpdateSequencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates sequence settings and content, inserts linear or branching steps, or performs revision-guarded graph edits.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->update(
    'sequenceId',
    new SequenceUpdateRequest([
        'name' => 'Updated Welcome Sequence',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` — Sequence ID
    
</dd>
</dl>

<dl>
<dd>

**$bccEmails:** `?array` — Email addresses that receive a blind copy of every email this sequence sends, such as a customer support inbox (max 10). Set to null to remove them.
    
</dd>
</dl>

<dl>
<dd>

**$branch:** `?SequenceBranchInput` 
    
</dd>
</dl>

<dl>
<dd>

**$confirmLiveChange:** `?bool` — Required for trigger replacement or nodeUpdates on an active sequence. Set true only after confirming that the edits can affect recipients who reach those nodes in the future.
    
</dd>
</dl>

<dl>
<dd>

**$confirmStructuralChange:** `?bool` — Required when inserting steps or branches, or editing the graph of an active sequence. Set true only after confirming the live-flow impact for current and future recipients.
    
</dd>
</dl>

<dl>
<dd>

**$customIntegration:** `?array` — Custom integration descriptor for an inbound_webhook trigger.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Updated dashboard description.
    
</dd>
</dl>

<dl>
<dd>

**$emails:** `?array` — Existing email step updates. Provide either emails or steps. Items without nodeId or emailId are matched by existing step order and do not create new steps.
    
</dd>
</dl>

<dl>
<dd>

**$enrollmentFieldPath:** `?string` — Scalar dot-path event property used by matching_field enrollment on event_received and inbound_webhook sequences. Array traversal with [] is not supported; use propertyFilters for array matching. Set to null to use built-in defaults.
    
</dd>
</dl>

<dl>
<dd>

**$enrollmentMode:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$enrollmentPaused:** `?bool` — Set true to stop new enrollments for an active sequence while current recipients continue. Set false to resume new enrollments.
    
</dd>
</dl>

<dl>
<dd>

**$eventName:** `?string` — Event name for event_received, inbound_webhook, inactivity, or frequency triggers.
    
</dd>
</dl>

<dl>
<dd>

**$fromEmail:** `?string` — From address for every email in this sequence. Its domain must be configured and verified.
    
</dd>
</dl>

<dl>
<dd>

**$fromName:** `?string` — Display name recipients see, e.g. 'Brennon at TradeTally'. Selects the sender identity of that name on fromEmail, creating it when the address has no identity by that name; the mailbox's other display names, and everything pinned to them, are untouched. Requires fromEmail; omit it when using senderProfileId, which already carries its own display name.
    
</dd>
</dl>

<dl>
<dd>

**$graphEdit:** `?SequenceGraphEditInput` 
    
</dd>
</dl>

<dl>
<dd>

**$inactiveDays:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$inactivityBaseline:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$insertSteps:** `?SequenceLinearStepInsertionInput` 
    
</dd>
</dl>

<dl>
<dd>

**$integrationEventKey:** `?string` — Catalog event key for an inbound_webhook trigger.
    
</dd>
</dl>

<dl>
<dd>

**$integrationSlug:** `?string` — Catalog integration slug for an inbound_webhook trigger.
    
</dd>
</dl>

<dl>
<dd>

**$labels:** `?array` — Replacement dashboard label names. Missing labels are created.
    
</dd>
</dl>

<dl>
<dd>

**$listId:** `?string` — List ID for a replacement contact_added trigger.
    
</dd>
</dl>

<dl>
<dd>

**$listIds:** `?array` — Several list IDs for a replacement contact_added trigger. A contact joining ANY of them enrolls. Cannot be combined with listScope.
    
</dd>
</dl>

<dl>
<dd>

**$listScope:** `?string` — For a replacement contact_added trigger with no list. `any_contact` (the default) enrolls every contact added, even one that joins no list; `any_list` waits for a list membership. Cannot be combined with listId or listIds.
    
</dd>
</dl>

<dl>
<dd>

**$minCount:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Updated sequence name.
    
</dd>
</dl>

<dl>
<dd>

**$nodeUpdates:** `?array` — Atomic, type-aware patches for existing sequence nodes. A node may appear only once, and either every patch commits or none do.
    
</dd>
</dl>

<dl>
<dd>

**$propertyFilters:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$replyProfileId:** `?string` — Existing reply profile ID. It already supplies both the Reply-To address and display name, so send it on its own and omit replyTo and replyToName.
    
</dd>
</dl>

<dl>
<dd>

**$replyTo:** `?string` — Reply-To address for every email in this sequence.
    
</dd>
</dl>

<dl>
<dd>

**$replyToName:** `?string` — Display name for the Reply-To address. Requires replyTo; omit it when using replyProfileId, which already carries its own display name. An address carries one Reply-To name company-wide, so if replyTo already has a saved profile under a different name, that saved name is kept and the response `warnings` array says so.
    
</dd>
</dl>

<dl>
<dd>

**$segmentId:** `?string` — Segment ID for a replacement segment_entered trigger.
    
</dd>
</dl>

<dl>
<dd>

**$senderProfileId:** `?string` — Existing sender profile ID. It already supplies both the From address and display name, so send it on its own and omit fromEmail and fromName. To keep this profile under a different display name, set fromName on the email steps instead, where it is a per-step override.
    
</dd>
</dl>

<dl>
<dd>

**$sendingWindow:** `?SequenceSendingWindow` 
    
</dd>
</dl>

<dl>
<dd>

**$smsSteps:** `?array` — Content updates for existing SMS steps, targeted by action_sms nodeId. Content-only edits; use insertSteps to create new SMS steps.
    
</dd>
</dl>

<dl>
<dd>

**$steps:** `?array` — Alias for emails. Use insertSteps to create new steps.
    
</dd>
</dl>

<dl>
<dd>

**$stopCondition:** `?SequenceStopCondition` 
    
</dd>
</dl>

<dl>
<dd>

**$stopOnSegmentExit:** `?bool` — Stop active enrollments when a contact leaves the replacement trigger segment.
    
</dd>
</dl>

<dl>
<dd>

**$subscriberUpdateSteps:** `?array` — Full config replacements for existing action_update_attributes steps, targeted by nodeId.
    
</dd>
</dl>

<dl>
<dd>

**$tagName:** `?string` — Tag name for a replacement tag_added trigger.
    
</dd>
</dl>

<dl>
<dd>

**$tagNames:** `?array` — Several tag names for a replacement tag_added trigger. Receiving ANY of them enrolls the contact.
    
</dd>
</dl>

<dl>
<dd>

**$timeWindowDays:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$trigger:** `?string` — Atomically replaces the current trigger. Include its typed configuration fields in the same request. Active sequences require confirmLiveChange.
    
</dd>
</dl>

<dl>
<dd>

**$userCancellable:** `?bool` — Whether recipients can cancel this sequence from email preferences.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sequences-&gt;updateGoal($sequenceId, $goalId, $request) -> ?UpdateGoalSequencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replaces the editable configuration for an existing sequence goal.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sequences->updateGoal(
    'sequenceId',
    'goalId',
    new UpdateGoalSequencesRequest([
        'body' => new SequenceGoalInput([]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sequenceId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$goalId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$request:** `SequenceGoalInput` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Shopify
<details><summary><code>$client-&gt;shopify-&gt;getAutomationSettings() -> ?GetAutomationSettingsShopifyResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the connected Shopify store's browse-abandonment, cart-abandonment, and price-drop automation settings, with platform defaults applied where the store hasn't overridden them.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->shopify->getAutomationSettings();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;shopify-&gt;updateAutomationSettings($request) -> ?UpdateAutomationSettingsShopifyResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Partial update of the store's browse-abandonment, cart-abandonment, and/or price-drop settings: omitted sections are untouched, omitted fields keep their current value, and null resets a section to the platform defaults.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->shopify->updateAutomationSettings(
    new UpdateAutomationSettingsShopifyRequest([
        'priceDrop' => new ShopifyPriceDropSettings([
            'minPercent' => 10,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$browseAbandonment:** `?ShopifyBrowseAbandonmentSettings` 
    
</dd>
</dl>

<dl>
<dd>

**$cartAbandonment:** `?ShopifyCartAbandonmentSettings` 
    
</dd>
</dl>

<dl>
<dd>

**$priceDrop:** `?ShopifyPriceDropSettings` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Sms
<details><summary><code>$client-&gt;sms-&gt;getSettings() -> ?GetSettingsSmsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the company's SMS add-on status, including credit balance, phone numbers, and whether SMS sequence steps will actually send.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->getSettings();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;sendTest($request) -> ?SendTestSmsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Sends a real test text message. Test sends charge credits, bypass quiet hours, are excluded from step stats, and are limited to 5 per company per hour. Requires the SMS add-on with a verified number.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->sendTest(
    new SendTestSmsRequest([
        'to' => '+15550100123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$blocks:** `?array` — SMS content blocks (text + image subset). Provide text or blocks, not both.
    
</dd>
</dl>

<dl>
<dd>

**$imageUrls:** `?array` — Up to 2 publicly reachable image URLs sent as MMS media (US/CA only).
    
</dd>
</dl>

<dl>
<dd>

**$text:** `?string` — Plain-text message body. Provide text or blocks, not both.
    
</dd>
</dl>

<dl>
<dd>

**$to:** `string` — Destination phone number in international E.164 format.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sms-&gt;updateNumberLabel($numberId, $request) -> ?UpdateNumberLabelSmsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates an SMS number's user-facing label and/or its brand prefix override. Omitted fields keep their value; at least one field is required. Requires companies:manage.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sms->updateNumberLabel(
    'numberId',
    new UpdateNumberLabelSmsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$numberId:** `string` — SMS number ID returned by Get SMS Settings.
    
</dd>
</dl>

<dl>
<dd>

**$brandPrefix:** `?string` — Per-number brand prefix override; messages send as "{prefix}: your message". Send null to clear it back to the account-wide prefix.
    
</dd>
</dl>

<dl>
<dd>

**$label:** `?string` — Label such as Marketing or Support. Send null to clear it.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Subscribers
<details><summary><code>$client-&gt;subscribers-&gt;addTagsBulk($request) -> ?AddTagsBulkResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Adds multiple tags to a subscriber. Creates the subscriber if they don't exist. Creates tag definitions if they don't exist. When the workspace has double opt-in enabled, a brand-new subscriber is created pending confirmation, the confirmation email is queued, and tag automations wait at their trigger until the subscriber confirms.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->addTagsBulk(
    new AddTagsBulkRequest([
        'tags' => [
            'premium',
            'newsletter',
            'vip',
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customAttributes:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — Required when creating a new subscriber. Optional when externalId identifies an existing subscriber.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `?string` — Customer-owned app/customer/user ID
    
</dd>
</dl>

<dl>
<dd>

**$firstName:** `?string` — First name to set if creating the subscriber.
    
</dd>
</dl>

<dl>
<dd>

**$lastName:** `?string` — Last name to set if creating the subscriber.
    
</dd>
</dl>

<dl>
<dd>

**$tags:** `array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;bulkAddTags($request) -> ?BulkSubscriberTagResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Adds one or more tags to up to 500 existing subscribers identified by email, externalId, or subscriberId. Built for reconciling historical or derived tags, so identifiers that do not match an existing subscriber are returned in notFound rather than creating contacts. Tag automations are skipped unless triggerAutomations is true, which requires the automations:trigger scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->bulkAddTags(
    new BulkSubscriberTagRequest([
        'emails' => [
            'one@example.com',
            'two@example.com',
        ],
        'tags' => [
            'derived-churn-risk',
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `BulkSubscriberTagRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;bulkRemoveTags($request) -> ?BulkSubscriberTagResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Removes one or more tags from up to 500 existing subscribers identified by email, externalId, or subscriberId. Identifiers that do not match an existing subscriber are returned in notFound.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->bulkRemoveTags(
    new BulkSubscriberTagRequest([
        'subscriberIds' => [
            'sub_abc123',
            'sub_def456',
        ],
        'tags' => [
            'derived-churn-risk',
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `BulkSubscriberTagRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;create($request) -> ?CreateSubscribersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new subscriber or handles existing ones based on the `duplicateStrategy` parameter.

**Duplicate Strategies:**
- `skip` (default): Don't update existing subscribers
- `merge`: Only fill in missing fields, never overwrite existing values
- `overwrite`: Replace all fields (but never reactivate unsubscribed users)
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->create(
    new CreateSubscribersRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$createdAt:** `?DateTime` — Original signup date, for importing history from another platform. Preserves the real date so date-relative segments are correct immediately. An existing contact's date only ever moves earlier, regardless of duplicateStrategy. Supplying this defaults enrollInSequences to false, and updatedAt is never backdated.
    
</dd>
</dl>

<dl>
<dd>

**$customAttributes:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$duplicateStrategy:** `?string` 

How to handle existing subscribers:
- `skip`: Don't update existing subscribers (default)
- `merge`: Only fill in missing fields, never overwrite existing values
- `overwrite`: Replace all fields (but never reactivate unsubscribed users)
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — Required when creating a new subscriber unless a phone is provided (which creates a phone-only SMS contact). Optional when externalId identifies an existing subscriber.
    
</dd>
</dl>

<dl>
<dd>

**$enrollInSequences:** `?bool` — Whether to enroll the subscriber in matching sequences. Defaults to true for API calls, or to false when createdAt is supplied. Explicitly passing true requires the automations:trigger scope and returns 403 when that scope is missing.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `?string` — Customer-owned app/customer/user ID. Unique per company when provided.
    
</dd>
</dl>

<dl>
<dd>

**$firstName:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$lastName:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$lists:** `?array` — List IDs to add subscriber to. If not provided, a subscriber this call creates follows the workspace default lists setting and an existing subscriber keeps the memberships they already have, so an attribute-only upsert never changes list membership. If empty array, subscriber is added to NO lists.
    
</dd>
</dl>

<dl>
<dd>

**$optInMode:** `?string` 

Consent handling for this request:
- `default`: obey the company double opt-in setting for new active subscribers; existing unsubscribed contacts are not sent confirmation email
- `confirmed`: create or keep active immediately when you have verified consent
- `double_opt_in`: send a confirmation email and keep the contact unsubscribed until they confirm
    
</dd>
</dl>

<dl>
<dd>

**$phone:** `?string` — Phone number in E.164 format or national format. Stored normalized to E.164. Invalid values fail with a 400 validation error. Does not affect SMS consent. With no email or externalId, creates or matches a phone-only (SMS) contact.
    
</dd>
</dl>

<dl>
<dd>

**$phoneCountry:** `?string` — ISO 3166-1 alpha-2 country used to read a national-format phone, defaulting to US. A parsing hint only - the stored phoneCountry always comes from the parsed number. Sending it without phone fails with a 400 validation error.
    
</dd>
</dl>

<dl>
<dd>

**$smsConsent:** `?bool` — SMS marketing consent. true sets smsStatus to subscribed with consent source api, false sets unsubscribed, omitted leaves SMS status unchanged. Never inferred from phone presence.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Initial subscriber status.
    
</dd>
</dl>

<dl>
<dd>

**$tags:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$timezone:** `?string` — IANA timezone identifier (e.g. America/New_York) used for recipient-local campaign delivery. Invalid values fail with a 400 validation error; null clears the stored value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;createImport($request) -> ?CreateImportSubscribersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Queues an asynchronous full-record subscriber import of up to 5,000 contacts.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->createImport(
    new CreateImportSubscribersRequest([
        'subscribers' => [
            new SubscriberImportRecord([]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$defaultPhoneCountry:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$duplicateStrategy:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$enrollInSequences:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$fileName:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$idempotencyKey:** `?string` — Caller-owned key (1-255 characters, not blank) that makes retrying this request safe. The key is scoped to the request content - resending the same request returns the already-queued import with deduplicated true, while different content under the same key queues a new import. A blank key is rejected with 400.
    
</dd>
</dl>

<dl>
<dd>

**$listIds:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$optInMode:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$smsConsent:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$subscribers:** `array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;createNote($email, $request) -> ?CreateNoteSubscribersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates an internal note for a subscriber identified by email address.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->createNote(
    'email',
    new CreateNoteSubscribersRequest([
        'body' => 'body',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$email:** `string` — URL-encoded email address
    
</dd>
</dl>

<dl>
<dd>

**$body:** `string` — Internal note body.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;createNoteByExternalId($request) -> ?CreateNoteByExternalIdSubscribersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates an internal note for a subscriber identified by customer-owned external ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->createNoteByExternalId(
    new CreateNoteByExternalIdSubscribersRequest([
        'externalId' => 'externalId',
        'body' => 'body',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$externalId:** `string` — External ID. Query form supports IDs containing slashes.
    
</dd>
</dl>

<dl>
<dd>

**$body:** `string` — Internal note body.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;delete($email) -> ?DeleteSubscribersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a subscriber by their email address.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->delete(
    'email',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$email:** `string` — URL-encoded email address
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;deleteByExternalId($request) -> ?DeleteByExternalIdSubscribersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a subscriber by their customer-owned external ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->deleteByExternalId(
    new DeleteByExternalIdSubscribersRequest([
        'externalId' => 'externalId',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$externalId:** `string` — External ID. Query form supports IDs containing slashes.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;deleteByExternalIdPath($externalId) -> ?DeleteByExternalIdPathSubscribersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Compatibility route for external IDs that do not contain path separators. Use `/subscribers/external?externalId=...` for IDs containing slashes.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->deleteByExternalIdPath(
    'externalId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$externalId:** `string` — URL-encoded external ID without path separators
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;deleteNote($noteId) -> ?DeleteNoteSubscribersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes one internal subscriber note by note ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->deleteNote(
    'noteId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$noteId:** `string` — Subscriber note ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;get($email, $request) -> ?GetSubscribersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a subscriber by their email address, including notes, list memberships, sequence enrollments, email stats, and recent activity.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->get(
    'email',
    new GetSubscribersRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$email:** `string` — URL-encoded email address
    
</dd>
</dl>

<dl>
<dd>

**$includeMachineEngagement:** `?bool` — Include detected scanner, preview, and tracked asset open/click events in subscriber email stats and recent activity.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;getAccountInfo() -> ?GetAccountInfoResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns account information for the authenticated API key. Useful for connection labels in integrations.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->getAccountInfo();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;getByExternalId($request) -> ?GetByExternalIdSubscribersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a subscriber by their customer-owned external ID, including notes, list memberships, sequence enrollments, email stats, and recent activity.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->getByExternalId(
    new GetByExternalIdSubscribersRequest([
        'externalId' => 'externalId',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$externalId:** `string` — External ID. Query form supports IDs containing slashes.
    
</dd>
</dl>

<dl>
<dd>

**$includeMachineEngagement:** `?bool` — Include detected scanner, preview, and tracked asset open/click events in subscriber email stats and recent activity.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;getByExternalIdPath($externalId, $request) -> ?GetByExternalIdPathSubscribersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Compatibility route for external IDs that do not contain path separators. Use `/subscribers/external?externalId=...` for IDs containing slashes.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->getByExternalIdPath(
    'externalId',
    new GetByExternalIdPathSubscribersRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$externalId:** `string` — URL-encoded external ID without path separators
    
</dd>
</dl>

<dl>
<dd>

**$includeMachineEngagement:** `?bool` — Include detected scanner, preview, and tracked asset open/click events in subscriber email stats and recent activity.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;getImport($importId) -> ?GetImportSubscribersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns progress, counts, and failure summaries by import ID or batch ID. Every excluded row is explained - skippedReasons sums to skippedCount and failedReasons sums to failedCount.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->getImport(
    'importId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$importId:** `string` — Import ID or batch ID returned by the create endpoint.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;importEvents($request) -> ?ImportEventsSubscribersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Records a bounded batch of up to 25 events for many subscribers. Email is required to create a contact; externalId-only rows must resolve to an existing contact. Events are grouped per contact - a contact whose rows are all more than an hour old is imported silently as history, including no double-opt-in email, while any recent row makes that contact's whole group live. Stable eventIds keep one receipt and let retries re-attempt downstream recovery idempotently.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->importEvents(
    new ImportEventsSubscribersRequest([
        'events' => [
            new ImportEventsSubscribersRequestEventsItem([
                'eventId' => 'order_12345',
                'name' => 'purchase_completed',
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$events:** `array` — Events to record. Each event identifies its own subscriber.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;list($request) -> ?ListSubscribersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists subscribers with stable pagination and optional filtering by status, free-text query, tags, list, segment, attribute, or email. Non-attribute results are ordered by createdAt descending with subscriber ID as a deterministic tie-breaker. Attribute-filtered results use ClickHouse-first cursor pagination ordered by subscriber ID ascending and do not include a total count.

**Pulling a full audience:** every response includes `pagination.nextCursor` and `pagination.hasMore`. Follow `nextCursor` rather than incrementing `page`. Cursor pagination keeps results stable while subscribers are being created or deleted mid-pull (page numbers can skip or repeat rows as the underlying set shifts) and skips the total-count query, so `pagination.total` and `pagination.totalPages` are `null` on cursor requests. Combined with `limit=1000`, a 10,000-subscriber export takes ten requests instead of a hundred.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->list(
    new ListSubscribersRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$attribute:** `?string` — Custom attribute filter using attributeName:value syntax, such as plan:pro or mrr:50.
    
</dd>
</dl>

<dl>
<dd>

**$attributeOperator:** `?string` — Attribute filter operator for direct cursor pagination. Use saved segments for exclusion operators such as is_not, not_contains, or is_empty.
    
</dd>
</dl>

<dl>
<dd>

**$cursor:** `?string` — Opaque cursor returned as pagination.nextCursor. Cannot be combined with `page`. Attribute-filtered requests return their own cursor, which is not interchangeable with the default-ordering cursor.
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — Legacy alias for a partial email search
    
</dd>
</dl>

<dl>
<dd>

**$includeTotal:** `?string` — Pass `false` to skip the total-count query on page-numbered requests. Cursor requests always skip it.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Number of items per page (max 1000)
    
</dd>
</dl>

<dl>
<dd>

**$list_:** `?string` — Subscriber list ID or exact list name. The API tries ID first, then exact name.
    
</dd>
</dl>

<dl>
<dd>

**$listId:** `?string` — Filter by subscriber list ID.
    
</dd>
</dl>

<dl>
<dd>

**$listName:** `?string` — Filter by exact subscriber list name when the list ID is not known.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — Page number. Cannot be combined with `cursor`.
    
</dd>
</dl>

<dl>
<dd>

**$query:** `?string` — Free-text search across email, first name, last name, and tags
    
</dd>
</dl>

<dl>
<dd>

**$segmentId:** `?string` — Filter by an existing segment ID
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by subscriber status. Use all to disable status filtering.
    
</dd>
</dl>

<dl>
<dd>

**$tags:** `?string` — Comma-separated tag names. Subscribers must have all provided tags.
    
</dd>
</dl>

<dl>
<dd>

**$unsubscribedAfter:** `?string` — Only return contacts whose `unsubscribedAt` is on or after this ISO 8601 date or datetime. Bare dates use UTC midnight; datetimes must include `Z` or an explicit offset. Contacts with no recorded opt-out date are excluded.
    
</dd>
</dl>

<dl>
<dd>

**$unsubscribedBefore:** `?string` — Only return contacts whose `unsubscribedAt` is on or before this ISO 8601 date or datetime. Bare dates use UTC midnight; datetimes must include `Z` or an explicit offset. Combine with `unsubscribedAfter` to audit a window of opt-outs.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;listNotes($email) -> ?ListNotesSubscribersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists internal notes for a subscriber identified by email address.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->listNotes(
    'email',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$email:** `string` — URL-encoded email address
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;listNotesByExternalId($request) -> ?ListNotesByExternalIdSubscribersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists internal notes for a subscriber identified by customer-owned external ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->listNotesByExternalId(
    new ListNotesByExternalIdSubscribersRequest([
        'externalId' => 'externalId',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$externalId:** `string` — External ID. Query form supports IDs containing slashes.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;update($emailPathParam, $request) -> ?UpdateSubscribersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates a subscriber's first name, last name, status, tags, or custom attributes. Setting `status` to `unsubscribed` performs the full unsubscribe workflow, including list unsubscription and sequence cancellation.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->update(
    'email',
    new UpdateSubscribersRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$emailPathParam:** `string` — URL-encoded email address
    
</dd>
</dl>

<dl>
<dd>

**$customAttributes:** `?array` — Custom attributes to update. Defaults to replacing the existing public custom-attribute map.
    
</dd>
</dl>

<dl>
<dd>

**$customAttributesStrategy:** `?string` — How to apply customAttributes. replace replaces the existing public custom-attribute map. merge overwrites only provided keys and retains unspecified existing keys.
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — New delivery email. Fails with 409 if another subscriber owns it.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `?string` — New customer-owned external ID. Fails with 409 if another subscriber owns it.
    
</dd>
</dl>

<dl>
<dd>

**$firstName:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$lastName:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$phone:** `?string` — Phone number in E.164 format or national format. Stored normalized to E.164. Invalid values fail with a 400 validation error. Does not affect SMS consent. Changing it resets SMS consent unless smsConsent is sent in the same request. null or "" clears the phone, except on a phone-only (SMS) contact, where clearing its only identity fails with a 400 validation error.
    
</dd>
</dl>

<dl>
<dd>

**$phoneCountry:** `?string` — ISO 3166-1 alpha-2 country used to read a national-format phone, defaulting to US. A parsing hint only - the stored phoneCountry always comes from the parsed number. Sending it without phone fails with a 400 validation error.
    
</dd>
</dl>

<dl>
<dd>

**$smsConsent:** `?bool` — SMS marketing consent. true sets smsStatus to subscribed with consent source api, false sets unsubscribed, omitted leaves SMS status unchanged. Never inferred from phone presence.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Setting `unsubscribed` performs a full global unsubscribe.
    
</dd>
</dl>

<dl>
<dd>

**$tags:** `?array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;updateByExternalId($request) -> ?UpdateByExternalIdSubscribersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates a subscriber's email, external ID, first name, last name, status, tags, or custom attributes.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->updateByExternalId(
    new UpdateByExternalIdSubscribersRequest([
        'externalId' => 'externalId',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$externalId:** `string` — External ID. Query form supports IDs containing slashes.
    
</dd>
</dl>

<dl>
<dd>

**$customAttributes:** `?array` — Custom attributes to update. Defaults to replacing the existing public custom-attribute map.
    
</dd>
</dl>

<dl>
<dd>

**$customAttributesStrategy:** `?string` — How to apply customAttributes. replace replaces the existing public custom-attribute map. merge overwrites only provided keys and retains unspecified existing keys.
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — New delivery email. Fails with 409 if another subscriber owns it.
    
</dd>
</dl>

<dl>
<dd>

**$newExternalId:** `?string` — New external ID. Fails with 409 if another subscriber owns it.
    
</dd>
</dl>

<dl>
<dd>

**$firstName:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$lastName:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$phone:** `?string` — Phone number in E.164 format or national format. Stored normalized to E.164. Invalid values fail with a 400 validation error. Does not affect SMS consent. Changing it resets SMS consent unless smsConsent is sent in the same request. null or "" clears the phone, except on a phone-only (SMS) contact, where clearing its only identity fails with a 400 validation error.
    
</dd>
</dl>

<dl>
<dd>

**$phoneCountry:** `?string` — ISO 3166-1 alpha-2 country used to read a national-format phone, defaulting to US. A parsing hint only - the stored phoneCountry always comes from the parsed number. Sending it without phone fails with a 400 validation error.
    
</dd>
</dl>

<dl>
<dd>

**$smsConsent:** `?bool` — SMS marketing consent. true sets smsStatus to subscribed with consent source api, false sets unsubscribed, omitted leaves SMS status unchanged. Never inferred from phone presence.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Setting `unsubscribed` performs the unsubscribe workflow.
    
</dd>
</dl>

<dl>
<dd>

**$tags:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$timezone:** `?string` — IANA timezone identifier (e.g. America/New_York) used for recipient-local campaign delivery. Invalid values fail with a 400 validation error; null clears the stored value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;updateByExternalIdPath($externalIdPathParam, $request) -> ?UpdateByExternalIdPathSubscribersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Compatibility route for external IDs that do not contain path separators. Use `/subscribers/external?externalId=...` for IDs containing slashes.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->updateByExternalIdPath(
    'externalId',
    new UpdateByExternalIdPathSubscribersRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$externalIdPathParam:** `string` — URL-encoded external ID without path separators
    
</dd>
</dl>

<dl>
<dd>

**$customAttributes:** `?array` — Custom attributes to update. Defaults to replacing the existing public custom-attribute map.
    
</dd>
</dl>

<dl>
<dd>

**$customAttributesStrategy:** `?string` — How to apply customAttributes. replace replaces the existing public custom-attribute map. merge overwrites only provided keys and retains unspecified existing keys.
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — New delivery email. Fails with 409 if another subscriber owns it.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `?string` — New external ID. Fails with 409 if another subscriber owns it.
    
</dd>
</dl>

<dl>
<dd>

**$firstName:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$lastName:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$phone:** `?string` — Phone number in E.164 format or national format. Stored normalized to E.164. Invalid values fail with a 400 validation error. Does not affect SMS consent. Changing it resets SMS consent unless smsConsent is sent in the same request. null or "" clears the phone, except on a phone-only (SMS) contact, where clearing its only identity fails with a 400 validation error.
    
</dd>
</dl>

<dl>
<dd>

**$phoneCountry:** `?string` — ISO 3166-1 alpha-2 country used to read a national-format phone, defaulting to US. A parsing hint only - the stored phoneCountry always comes from the parsed number. Sending it without phone fails with a 400 validation error.
    
</dd>
</dl>

<dl>
<dd>

**$smsConsent:** `?bool` — SMS marketing consent. true sets smsStatus to subscribed with consent source api, false sets unsubscribed, omitted leaves SMS status unchanged. Never inferred from phone presence.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Setting `unsubscribed` performs the unsubscribe workflow.
    
</dd>
</dl>

<dl>
<dd>

**$tags:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$timezone:** `?string` — IANA timezone identifier (e.g. America/New_York) used for recipient-local campaign delivery. Invalid values fail with a 400 validation error; null clears the stored value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Subscribers Events
<details><summary><code>$client-&gt;subscribers-&gt;events-&gt;trigger($request) -> ?TriggerEventsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Triggers an event for a subscriber. Creates the subscriber if they don't exist and applies the workspace default lists setting. Creates the event definition if it doesn't exist. When the workspace has double opt-in enabled, a brand-new subscriber is created pending confirmation, the confirmation email is queued, and matching sequences wait at their trigger until the subscriber confirms.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->events->trigger(
    new TriggerEventsRequest([
        'event' => 'purchase.completed',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customAttributes:** `?array` — Optional attributes to set on the subscriber if created
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — Required when creating a new subscriber. Optional when externalId identifies an existing subscriber.
    
</dd>
</dl>

<dl>
<dd>

**$event:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$eventId:** `?string` — Caller-owned event ID used as an idempotency key on both paths. A repeated live event returns the existing event with duplicate=true. A repeated historical event remains a historical response and increments duplicates instead. Best-effort for live events sent within about a second of each other, so a producer needing a strict guarantee should keep its own ledger.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `?string` — Customer-owned app/customer/user ID
    
</dd>
</dl>

<dl>
<dd>

**$firstName:** `?string` — First name to set if creating the subscriber.
    
</dd>
</dl>

<dl>
<dd>

**$lastName:** `?string` — Last name to set if creating the subscriber.
    
</dd>
</dl>

<dl>
<dd>

**$occurredAt:** `?DateTime` — When the event actually happened. Defaults to now. More than an hour in the past records it as history - stored with the real timestamp and counted by segments, but running no sequences, sync rules, waiting steps, goal conversions or webhooks, and the response carries historical=true. Older than the 5-year event retention window is rejected with 400.
    
</dd>
</dl>

<dl>
<dd>

**$properties:** `?array` — Event properties/metadata
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;events-&gt;triggerBulk($request) -> ?TriggerBulkEventsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Triggers multiple events for a subscriber. Creates the subscriber if they don't exist and applies the workspace default lists setting. Creates event definitions if they don't exist. Events are processed independently, so an error response may still include events that were already triggered. When the workspace has double opt-in enabled, a brand-new subscriber is created pending confirmation, a single confirmation email is queued for the request, and matching sequences wait at their trigger until the subscriber confirms.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->events->triggerBulk(
    new TriggerBulkEventsRequest([
        'events' => [
            new TriggerBulkEventsRequestEventsItem([
                'name' => 'page.viewed',
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customAttributes:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — Required when creating a new subscriber. Optional when externalId identifies an existing subscriber.
    
</dd>
</dl>

<dl>
<dd>

**$events:** `array` 
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `?string` — Customer-owned app/customer/user ID
    
</dd>
</dl>

<dl>
<dd>

**$firstName:** `?string` — First name to set if creating the subscriber.
    
</dd>
</dl>

<dl>
<dd>

**$lastName:** `?string` — Last name to set if creating the subscriber.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Subscribers Tags
<details><summary><code>$client-&gt;subscribers-&gt;tags-&gt;add($request) -> ?AddTagsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Adds a tag to a subscriber. Creates the subscriber if they don't exist. Creates the tag definition if it doesn't exist. When the workspace has double opt-in enabled, a brand-new subscriber is created pending confirmation, the confirmation email is queued, and tag automations wait at their trigger until the subscriber confirms.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->tags->add(
    new AddTagsRequest([
        'tag' => 'premium',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customAttributes:** `?array` — Optional attributes to set on the subscriber if created
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — Required when creating a new subscriber. Optional when externalId identifies an existing subscriber.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `?string` — Customer-owned app/customer/user ID
    
</dd>
</dl>

<dl>
<dd>

**$firstName:** `?string` — First name to set if creating the subscriber.
    
</dd>
</dl>

<dl>
<dd>

**$lastName:** `?string` — Last name to set if creating the subscriber.
    
</dd>
</dl>

<dl>
<dd>

**$tag:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;subscribers-&gt;tags-&gt;remove($request) -> ?RemoveTagsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Removes a tag from a subscriber. Creates the subscriber if they don't exist (without the tag).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscribers->tags->remove(
    new RemoveTagsRequest([
        'tag' => 'premium',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$email:** `?string` — Required when creating a new subscriber. Optional when externalId identifies an existing subscriber.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `?string` — Customer-owned app/customer/user ID
    
</dd>
</dl>

<dl>
<dd>

**$firstName:** `?string` — First name (used if creating new subscriber)
    
</dd>
</dl>

<dl>
<dd>

**$lastName:** `?string` — Last name (used if creating new subscriber)
    
</dd>
</dl>

<dl>
<dd>

**$tag:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Suppressions
<details><summary><code>$client-&gt;suppressions-&gt;get($email, $request) -> ?GetSuppressionsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Checks one exact recipient against Sequenzy's local bounce and complaint safeguards and the regional Amazon SES account-level suppression list. The lookup does not expose unrelated recipients from the shared SES account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->suppressions->get(
    'email',
    new GetSuppressionsRequest([
        'region' => 'us-east-1',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$email:** `string` — Exact recipient email address
    
</dd>
</dl>

<dl>
<dd>

**$region:** `?string` — Optional AWS SES region. Omit to check the default region and regions used by the company's sending domains.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;suppressions-&gt;list($request) -> ?ListSuppressionsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists the recipients this company cannot reach, newest suppression first by default.

Four product-level suppression types appear:

- `suppressionType: invalid_recipient` - SMTP evidence conclusively identifies an invalid destination. It is global, visible to companies associated with the address, and protected.
- `suppressionType: unknown_hard_bounce` - a permanent/undetermined failure without enough evidence to declare the inbox invalid. It is company-scoped and protected.
- `suppressionType: soft_bounce_escalation` - repeated delivery failures from this company. It is company-scoped and removable.
- `suppressionType: complaint` - the recipient reported this company's email as spam. It is company-scoped and protected.

The platform-wide list is never exposed: a global row is returned only when the address is already associated with the authenticated company.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->suppressions->list(
    new ListSuppressionsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` — Entries per page (max 100).
    
</dd>
</dl>

<dl>
<dd>

**$order:** `?string` — Sort direction. Defaults to `desc` for `suppressedAt` and `status`, `asc` for `email`.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — 1-based page number.
    
</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Case-insensitive substring filter on the recipient email address.
    
</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` 

Field to order by. `status` lists removable workspace escalations before protected
suppressions. An unrecognized value falls back to `suppressedAt` rather than failing the
request - read `sortBy` in the response to confirm what was applied.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;suppressions-&gt;remove($email, $request) -> ?RemoveSuppressionsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Removes one company-associated recipient's workspace-scoped soft-bounce escalation and reactivates a bounced company subscriber. Global invalid-recipient and Amazon SES account-level suppressions, other companies' scoped rows, complaints, and unsubscribes are protected.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->suppressions->remove(
    'email',
    new RemoveSuppressionsRequest([
        'region' => 'us-east-1',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$email:** `string` — Exact company-associated recipient email address
    
</dd>
</dl>

<dl>
<dd>

**$region:** `?string` — Optional AWS SES region used to limit the remaining-suppression inspection. It never authorizes removal of an SES account-level entry.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## SyncRules
<details><summary><code>$client-&gt;syncRules-&gt;get() -> ?GetSyncRulesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the company's effective sync rules - the automatic tag changes applied when events fire. New companies start with an empty rule set; legacy companies may inherit the optional SaaS/ecommerce platform preset. isDefault reports whether that preset is active.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->syncRules->get();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;syncRules-&gt;update($request) -> ?UpdateSyncRulesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replaces the company's full sync rule set. Send an empty array to disable rules, or null to opt into the inherited SaaS/ecommerce platform preset. This is not a partial update - fetch the current rules, edit them, and send the whole set back.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->syncRules->update(
    new UpdateSyncRulesRequest([
        'syncRules' => [
            new SyncRule([
                'actions' => new SyncRuleActions([
                    'addTags' => [
                        'vinyl-collector',
                    ],
                    'removeTags' => [
                        'removeTags',
                    ],
                ]),
                'conditions' => new SyncRuleConditions([
                    'purchasedProduct' => new SyncRuleConditionsPurchasedProduct([
                        'tags' => [
                            'Vinyl',
                        ],
                    ]),
                ]),
                'triggerEvent' => 'ecommerce.order_placed',
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$syncRules:** `?array` — Full replacement rule set. An empty array disables rules; null opts into the inherited SaaS/ecommerce platform preset.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Tags
<details><summary><code>$client-&gt;tags-&gt;create($request) -> ?CreateTagsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a tag definition. Tag names are normalized to lowercase with spaces replaced by hyphens.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->create(
    new CreateTagsRequest([
        'name' => 'premium',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$color:** `?string` — Tag color. One of: gray, red, orange, amber, yellow, lime, green, emerald, teal, cyan, sky, blue, indigo, violet, purple, fuchsia, pink, rose. Defaults to gray.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Tag name. Normalized to lowercase with spaces replaced by hyphens.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;tags-&gt;delete($tagId) -> ?DeleteTagsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a tag definition and removes the tag from all subscribers. Fails when the tag is referenced by sequences or is a system tag.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->delete(
    'tagId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$tagId:** `string` — Tag definition ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;tags-&gt;list() -> ?ListTagsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists tag definitions for the authenticated company.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;tags-&gt;update($tagId, $request) -> ?UpdateTagsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates a tag definition's color. System tags cannot be updated.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->update(
    'tagId',
    new UpdateTagsRequest([
        'color' => 'green',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$tagId:** `string` — Tag definition ID.
    
</dd>
</dl>

<dl>
<dd>

**$color:** `string` — Tag color. One of: gray, red, orange, amber, yellow, lime, green, emerald, teal, cyan, sky, blue, indigo, violet, purple, fuchsia, pink, rose.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Team
<details><summary><code>$client-&gt;team-&gt;cancelInvitation($invitationId) -> ?CancelInvitationTeamResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancels a pending or expired team invitation. Requires owner or admin access.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->team->cancelInvitation(
    'invitationId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$invitationId:** `string` — Invitation ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;team-&gt;invite($request) -> ?InviteTeamResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Adds an existing Sequenzy user to the team directly, or emails an invitation to a new user. Requires owner or admin access.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->team->invite(
    new InviteTeamRequest([
        'email' => 'email',
        'role' => InviteTeamRequestRole::Admin->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$canManageBilling:** `?bool` — Whether the member can manage billing. Only the company owner can grant this.
    
</dd>
</dl>

<dl>
<dd>

**$email:** `string` — Email address to invite.
    
</dd>
</dl>

<dl>
<dd>

**$role:** `string` — Role for the new member. Restricted members can open direct campaign links only.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;team-&gt;list() -> ?ListTeamResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists the company owner, team members, and pending or expired invitations.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->team->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Templates
<details><summary><code>$client-&gt;templates-&gt;create($request) -> ?CreateTemplatesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a reusable email template from exactly one of prompt, HTML, or Sequenzy blocks.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templates->create(
    new CreateTemplatesRequest([
        'name' => 'name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$blocks:** `?array` — Sequenzy email blocks. Mutually exclusive with html. Put visual styling under styles; top-level style keys such as backgroundColor, backgroundOpacity, borderColor, borderWidth, and borderRadius are normalized into styles.
    
</dd>
</dl>

<dl>
<dd>

**$html:** `?string` — Raw HTML body. Mutually exclusive with blocks.
    
</dd>
</dl>

<dl>
<dd>

**$label:** `?array` — Compatibility alias for labels.
    
</dd>
</dl>

<dl>
<dd>

**$labels:** `?array` — Label names to assign. Missing labels are created automatically.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$previewText:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$prompt:** `?string` — Natural-language request for branded native template blocks.
    
</dd>
</dl>

<dl>
<dd>

**$style:** `?string` — Generation style; valid only with prompt.
    
</dd>
</dl>

<dl>
<dd>

**$subject:** `?string` — Required with HTML or blocks; optional with prompt, where it overrides the generated subject.
    
</dd>
</dl>

<dl>
<dd>

**$tone:** `?string` — Generation tone; valid only with prompt.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;templates-&gt;createShareLink($templateId) -> ?CreateShareLinkTemplatesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates (or fetches) the public view-in-browser link for an individual email - a transactional email, a sequence email, or a standalone template. Accepts a template ID or a transactional email's ID or slug; for a sequence email, pass the step's emailId. The hosted page renders an anonymized copy - sample contact, inert unsubscribe link, no open/click tracking - so the URL is safe to forward to anyone. Idempotent - an already-active link is returned with created=false instead of being rotated. Campaigns use their own campaign-level share link, which follows the A/B winning variant.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templates->createShareLink(
    'templateId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$templateId:** `string` — Template ID, transactional email ID, or transactional slug.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;templates-&gt;delete($templateId) -> ?DeleteTemplatesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes an unused email template. Templates used by campaigns, sequences, or transactional emails cannot be deleted.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templates->delete(
    'templateId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$templateId:** `string` — Template ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;templates-&gt;get($templateId) -> ?GetTemplatesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns one email template. Transactional email IDs and slugs are also resolved for compatibility, as is the `emailId` returned by campaign endpoints, so this can read the blocks of an email designed in the dashboard.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templates->get(
    'templateId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$templateId:** `string` — Template ID, transactional email ID, or transactional slug.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;templates-&gt;list($request) -> ?ListTemplatesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists saved email templates for the authenticated company, optionally filtered by label. Templates are the company's saved email bodies: standalone templates plus the bodies behind campaigns and transactional emails, so dashboard-designed emails appear here too. A campaign's `emailId` points at its entry in this list, and any template ID can be passed as `templateId` when creating a campaign. Bodies are kept when their campaign or transactional email is deleted. Results are newest first and paginated: 50 per page by default, up to 100. Page with `offset` while `pagination.hasMore` is true.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templates->list(
    new ListTemplatesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$label:** `?string` — Optional label name filter. Only templates assigned this label are returned.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Templates per page. Values above 100 are clamped to 100.
    
</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Templates to skip before returning results.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;templates-&gt;render($templateId, $request) -> ?RenderEmailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Render a template to the exact email-safe HTML that would be sent, for embedding a visual preview. Read-only: this never sends or modifies anything, and uses POST only so personalization input can travel in a request body.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templates->render(
    'templateId',
    new RenderTemplatesRequest([
        'body' => new RenderEmailRequest([]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$templateId:** `string` — Template ID, transactional email ID, or transactional slug.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `RenderEmailRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;templates-&gt;revokeShareLink($templateId) -> ?RevokeShareLinkTemplatesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Revokes the email's public view-in-browser link. The shared URL returns 404 immediately; sharing again later mints a different URL. Returns revoked=false when no link was active.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templates->revokeShareLink(
    'templateId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$templateId:** `string` — Template ID, transactional email ID, or transactional slug.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;templates-&gt;setLocalization($templateId, $locale, $request) -> ?SetLocalizationTemplatesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates or replaces a caller-supplied localized template variant. The locale must be enabled for the company and cannot be its primary locale.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templates->setLocalization(
    'templateId',
    'locale',
    new SetLocalizationTemplatesRequest([
        'subject' => 'subject',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$templateId:** `string` — Template ID, transactional email ID, or transactional slug.
    
</dd>
</dl>

<dl>
<dd>

**$locale:** `string` — Enabled non-primary locale code such as es or pt-BR.
    
</dd>
</dl>

<dl>
<dd>

**$blocks:** `?array` — Localized Sequenzy email blocks. Provide exactly one of blocks or html.
    
</dd>
</dl>

<dl>
<dd>

**$html:** `?string` — Localized raw HTML. Provide exactly one of html or blocks.
    
</dd>
</dl>

<dl>
<dd>

**$previewText:** `?string` — Optional localized inbox preview text.
    
</dd>
</dl>

<dl>
<dd>

**$subject:** `string` — Localized email subject line.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;templates-&gt;syncLocalizations($templateId, $request) -> ?SyncLocalizationsTemplatesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Queues AI translation for selected enabled template locales. Omit locales to sync every enabled non-primary locale, even when automatic on-save sync is disabled.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templates->syncLocalizations(
    'templateId',
    new SyncLocalizationsTemplatesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$templateId:** `string` — Template ID, transactional email ID, or transactional slug.
    
</dd>
</dl>

<dl>
<dd>

**$locales:** `?array` — Enabled non-primary locale codes to sync. Omit to sync all of them.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;templates-&gt;update($templateId, $request) -> ?UpdateTemplatesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates template metadata, labels, or content. Transactional email IDs and slugs are also resolved for compatibility.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->templates->update(
    'templateId',
    new UpdateTemplatesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$templateId:** `string` — Template ID, transactional email ID, or transactional slug.
    
</dd>
</dl>

<dl>
<dd>

**$blocks:** `?array` — Replacement Sequenzy email blocks. Mutually exclusive with html. Put visual styling under styles; top-level style keys such as backgroundColor, backgroundOpacity, borderColor, borderWidth, and borderRadius are normalized into styles.
    
</dd>
</dl>

<dl>
<dd>

**$html:** `?string` — Replacement HTML body. Mutually exclusive with blocks.
    
</dd>
</dl>

<dl>
<dd>

**$label:** `?array` — Compatibility alias for labels.
    
</dd>
</dl>

<dl>
<dd>

**$labels:** `?array` — Replacement label names. Send an empty array to clear labels. Missing labels are created automatically.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$previewText:** `?string` — Inbox preview text. Send null to clear it.
    
</dd>
</dl>

<dl>
<dd>

**$subject:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$updates:** `mixed` — Unsupported nested update object. Requests using it return a validation error.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## TrackingSettings
<details><summary><code>$client-&gt;trackingSettings-&gt;get() -> ?TrackingSettings</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns open, click, and unsubscribe tracking flags, the default attribution window, automatic UTM tagging, the dedicated click-tracking domain, inbound reply tracking settings, and whether double opt-in is required for new contacts.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->trackingSettings->get();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;trackingSettings-&gt;update($request) -> ?UpdateTrackingSettingsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the account-wide tracking defaults - open, click, and unsubscribe tracking, strict bot filtering, the default attribution window, and automatic UTM tagging - plus the double opt-in requirement for new contacts. Applies to emails sent afterwards; already-sent emails keep the links they were rendered with. Reply tracking is updated through the company endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->trackingSettings->update(
    new UpdateTrackingSettingsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$autoUtmEnabled:** `?bool` — Whether UTM parameters are appended to outbound links automatically. Enabling this with no stored parameters seeds the platform defaults.
    
</dd>
</dl>

<dl>
<dd>

**$autoUtmSettings:** `?UpdateTrackingSettingsRequestAutoUtmSettings` — UTM templates merged over the stored ones. Null resets every parameter to the platform defaults; a null field stops that parameter being emitted.
    
</dd>
</dl>

<dl>
<dd>

**$clickTrackingEnabled:** `?bool` — Whether to rewrite links through the click-tracking redirect.
    
</dd>
</dl>

<dl>
<dd>

**$defaultAttributionWindowHours:** `?int` — Default revenue attribution window in hours.
    
</dd>
</dl>

<dl>
<dd>

**$doubleOptInEnabled:** `?bool` — Whether new contacts must confirm by email before they become subscribed. This is the account-wide default that the per-request optInMode on subscriber creation overrides. Enabling it requires a sender profile and provisions the confirmation email automatically; it does not change contacts that are already active.
    
</dd>
</dl>

<dl>
<dd>

**$doubleOptInRedirectUrl:** `?string` — Where the hosted confirmation page sends subscribers after they confirm. Must be an http(s) URL of at most 500 characters after normalization; a bare domain is normalized to https. Null (or an empty string) clears it, keeping subscribers on the confirmation page branded with the company's name, logo, and colors.
    
</dd>
</dl>

<dl>
<dd>

**$openTrackingEnabled:** `?bool` — Whether to embed the open-tracking pixel.
    
</dd>
</dl>

<dl>
<dd>

**$strictBotFilteringEnabled:** `?bool` — Opt-in aggressive bot detection (strict user-agent patterns, datacenter IPs, cross-send IP sweeps). Off by default; enabling it can lower reported open and click rates.
    
</dd>
</dl>

<dl>
<dd>

**$unsubscribeTrackingEnabled:** `?bool` — Whether unsubscribe links are attributed to the email that produced them.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Transactional
<details><summary><code>$client-&gt;transactional-&gt;create($request) -> ?CreateTransactionalResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a saved transactional email template from exactly one of prompt, HTML, or Sequenzy blocks. Prompt-created templates default to disabled.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->transactional->create(
    new CreateTransactionalRequest([
        'name' => 'Password Reset',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$enabled:** `?bool` — Defaults to false with prompt and true with explicit HTML or blocks.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$previewText:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$prompt:** `?string` — Natural-language request for branded transactional blocks.
    
</dd>
</dl>

<dl>
<dd>

**$slug:** `?string` — Optional API slug used when sending by slug. If omitted, one is generated from the name.
    
</dd>
</dl>

<dl>
<dd>

**$style:** `?string` — Generation style; valid only with prompt.
    
</dd>
</dl>

<dl>
<dd>

**$subject:** `?string` — Required with HTML or blocks; optional with prompt, where it overrides the generated subject.
    
</dd>
</dl>

<dl>
<dd>

**$tone:** `?string` — Generation tone; valid only with prompt.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;transactional-&gt;delete($idOrSlug) -> ?DeleteTransactionalResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Permanently deletes a saved transactional email template by ID or slug, so its slug stops sending and becomes free to reuse.

Already-sent deliveries are untouched: send history, stats, and stored HTML live on the deliveries themselves.

The email content is kept as a reusable template and returned as `deleted.emailId`; pass that to `DELETE /api/v1/templates/{templateId}` to remove the content too. To stop sends without losing the template, update it with `enabled: false` instead.

Requires an API key with the `transactional:delete` scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->transactional->delete(
    'welcome-email',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$idOrSlug:** `string` — Transactional email ID or slug
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;transactional-&gt;get($idOrSlug) -> ?GetTransactionalResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Gets details of a transactional email template by ID or slug, including linked body content and available template variables.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->transactional->get(
    'welcome-email',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$idOrSlug:** `string` — Transactional email ID or slug
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;transactional-&gt;list($request) -> ?ListTransactionalResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists transactional email templates with their linked subjects and all-time delivery metrics. Search name, slug, or subject; filter active state; and sort by engagement. Human engagement is used by default.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->transactional->list(
    new ListTransactionalRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$includeMachineEngagement:** `?bool` — Include detected bot, scanner, preview, and privacy-proxy engagement in open and click metrics.
    
</dd>
</dl>

<dl>
<dd>

**$order:** `?string` — Sort direction.
    
</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Case-insensitive search across template name, API slug, and linked email subject/title.
    
</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Sort by creation date or all-time engagement metrics.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by template active state.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;transactional-&gt;send($request) -> SendTransactionalResponseTransactional|SendTransactionalResponseOne|null</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Queues an email for sending. The default `emailType` is `transactional`. Set it to `marketing` for a consented single-recipient lifecycle or promotional message. Marketing mode creates or links a minimal subscriber, honors unsubscribe suppression, adds the standard marketing footer, and emits RFC 8058 one-click-unsubscribe headers. The caller remains responsible for having consent or another lawful basis.

For callers that may retry, send a stable `Idempotency-Key` header. The same key and request returns the original `emailSendId` for 14 days without another delivery. Reusing a key with different request content returns 409.

You can either:
- Provide a canonical `slug` (or compatibility alias `templateId`) to use a saved template
- Provide `subject` and canonical `body` (or compatibility alias `html`) to send custom content directly

If both a canonical field and its alias are provided, `slug` must match `templateId` and `body` must match `html`.

**Recipients:**
- `to` can be a single email or an array of up to 50 emails
- Duplicate emails are automatically deduplicated
- Marketing mode requires exactly one `to` recipient and does not support `cc` or `bcc`

**Attachments:**
- Attachments can be provided as Base64-encoded content or URLs
- Maximum 10 attachments and 7MB total per email
- Any file type supported (PDFs, images, documents, etc.)
- Set `contentId` on an attachment to embed it as an inline image referenced from the HTML as `<img src="cid:VALUE">`

A successful response means the email was accepted for background processing. Transactional emails are not blocked by subscriber unsubscribe or double opt-in status. If a recipient is suppressed because of a hard bounce or spam complaint, the worker records the send as `suppressed` instead of delivering it.

Optionally set `from` (domain must be verified) and `replyTo` addresses. When reply tracking is enabled, Sequenzy uses a unique trackable `Reply-To` header and treats the resolved reply destination as the forwarding destination for captured replies.
When `replyTo` is omitted, direct-content sends inherit the company's default reply profile and saved-template sends prefer the template reply profile before the company default. Both fall back to the first company reply profile. The resolved destination is retained whether or not reply tracking is enabled; it is sent as the Reply-To header only when reply tracking is disabled.
Variables can be passed to customize the email content. Nested objects and arrays are supported for repeat blocks, such as `items`. `{{viewInBrowserUrl}}` is generated automatically for a hosted copy link. For a single recipient, Sequenzy matches an existing subscriber by `subscriberExternalId` or email and backfills stored first and last names when the corresponding request variables are omitted; explicit variables take precedence. Returns immediately with a durable `emailSendId` and the accepted `emailType`. If Sequenzy detects likely missing or unused variables before queueing, the successful response includes a non-blocking `diagnostics` warning object. Missing values do not block queueing or sending; a required variable that is not provided and has no default renders as an empty string.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->transactional->send(
    new SendTransactionalRequest([
        'slug' => 'welcome-email',
        'to' => 'recipient@example.com',
        'variables' => [
            'NAME' => "John",
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$idempotencyKey:** `?string` — Caller-owned key for one logical email. Reuse the same key and request on retries to receive the original send for 14 days. Reusing the key with different content returns 409.
    
</dd>
</dl>

<dl>
<dd>

**$attachments:** `?array` 

File attachments for the email. Each attachment must have a filename and either:
- `content`: Base64-encoded file content
- `path`: URL to fetch the file from

Set `contentId` to embed the file as an inline image the HTML references with `<img src="cid:VALUE">` instead of attaching it.

Maximum 10 attachments and 7MB total per email.
    
</dd>
</dl>

<dl>
<dd>

**$bcc:** `string|array|null` — Blind-carbon-copy recipient email address(es). Duplicates already present in `to` or `cc` are removed.
    
</dd>
</dl>

<dl>
<dd>

**$body:** `?string` — Canonical email body HTML content (required if not using a template slug).
    
</dd>
</dl>

<dl>
<dd>

**$cc:** `string|array|null` — Visible carbon-copy recipient email address(es). Duplicates already present in `to` are removed.
    
</dd>
</dl>

<dl>
<dd>

**$emailType:** `?string` — Delivery policy. Marketing mode requires one recipient, creates or links a minimal subscriber, honors unsubscribe suppression, adds the standard footer, and emits RFC 8058 List-Unsubscribe and List-Unsubscribe-Post headers.
    
</dd>
</dl>

<dl>
<dd>

**$from:** `?string` 

Custom from address. Format: "Name <email>" or just "email".
The domain must be verified for your account. If not verified, this field is silently ignored.
When the address exactly matches an existing sender identity (the display name disambiguates if
several identities share the address), that identity - including its sending route - is used for
the send; otherwise the template or company-default identity is kept and this field only changes
the visible From.
    
</dd>
</dl>

<dl>
<dd>

**$html:** `?string` — Compatibility alias for `body`. Accepted with `subject` for direct sends and must match `body` when both are provided.
    
</dd>
</dl>

<dl>
<dd>

**$preview:** `?string` — Preview text for the email (only used with direct content)
    
</dd>
</dl>

<dl>
<dd>

**$replyTo:** `?string` 

Reply-to address. Format: "Name <email>" or just "email".
Can be any valid email address. When reply tracking is disabled, this value is sent as the email's `Reply-To` header. When reply tracking is enabled, Sequenzy sends a unique trackable `Reply-To` header and stores this value as the forwarding destination for replies.
When omitted, direct-content sends inherit the company default and saved-template sends prefer the template reply profile before the company default. Both fall back to the first company reply profile. The resolved destination is retained whether or not reply tracking is enabled; it is sent directly only when reply tracking is disabled.
    
</dd>
</dl>

<dl>
<dd>

**$slug:** `?string` — Canonical slug of the transactional email template to use (mutually exclusive with direct content).
    
</dd>
</dl>

<dl>
<dd>

**$subject:** `?string` — Email subject (required if not using slug)
    
</dd>
</dl>

<dl>
<dd>

**$subscriberExternalId:** `?string` — Customer-owned subscriber ID for single-recipient sends. If it matches an existing subscriber, analytics and localization use that subscriber; the value is also stored on the send and emitted as external_id in outbound email webhooks even when no subscriber exists. Maximum length is 255 characters.
    
</dd>
</dl>

<dl>
<dd>

**$templateId:** `?string` — Compatibility alias for `slug`. Despite the field name, pass the saved transactional email API slug, not its database ID. Must match `slug` when both are provided.
    
</dd>
</dl>

<dl>
<dd>

**$to:** `string|array` — Recipient email address(es). Can be a single email string or an array of up to 50 emails.
    
</dd>
</dl>

<dl>
<dd>

**$trackingSettings:** `?SendTransactionalRequestTrackingSettings` — Per-send tracking opt-outs. Each field defaults to `true`, meaning your account's tracking settings apply; set a field to `false` to disable that tracking for this send only. These fields can only opt out; they cannot enable tracking that is disabled for your account.
    
</dd>
</dl>

<dl>
<dd>

**$variables:** `?array` — Variables for template replacement (works with both modes). Values can be scalars, nested objects, or arrays used by repeat blocks. For a single recipient, stored subscriber first and last names fill missing name variables; explicit request variables take precedence. Raw HTML templates can use simple subscriber/custom-attribute conditionals such as `{{#if subscriber.plan}}...{{else}}...{{/if}}` and `{{#unless subscriber.plan}}...{{/unless}}`. Variables are always HTML-escaped; a template can prefix a tag with `html.` (`{{html.prerenderedHtml}}`) to insert a trusted HTML value unescaped. Injected HTML is sanitized (scripts, event handlers, and dangerous URLs are stripped), only applies in HTML text position, and must not contain end-user input. Likely variable issues are returned as non-blocking diagnostics when possible; missing required variables without defaults render as empty strings and do not block sending.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;transactional-&gt;update($idOrSlug, $request) -> ?UpdateTransactionalResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates transactional email metadata or replaces the linked email body using raw HTML or Sequenzy blocks.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->transactional->update(
    'welcome-email',
    new UpdateTransactionalRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$idOrSlug:** `string` — Transactional email ID or slug
    
</dd>
</dl>

<dl>
<dd>

**$enabled:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$previewText:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$subject:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Webhooks
<details><summary><code>$client-&gt;webhooks-&gt;addSigningSecret($id) -> ?AddSigningSecretWebhooksResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Adds another active signing secret. Requests are signed once per active secret in the same signature header.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->addSigningSecret(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;create($request) -> ?CreateWebhooksResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates an outbound webhook endpoint. The signing secret is returned only in this response.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->create(
    new CreateWebhooksRequest([
        'name' => 'Production webhook',
        'url' => 'https://example.com/sequenzy/webhooks',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$events:** `?array` — Omit to subscribe to default email and SMS lifecycle events plus subscriber.invalid, subscriber.created, and subscriber.unsubscribed. Add campaign.sent, email.opened, email.clicked, email.replied, subscriber.updated, subscriber.list_subscribed, subscriber.list_unsubscribed, sequence.finished, and sequence.failed explicitly for aggregate campaign completion, engagement, inbound reply, profile sync, per-list consent sync, or sequence lifecycle events. SMS events (sms.sent, sms.delivered, sms.failed, sms.opted_out) are included in the defaults.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$url:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;delete($id) -> ?DeleteWebhooksResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Permanently deletes an outbound webhook endpoint along with its delivery history. To keep the endpoint but stop deliveries, use PATCH with status "disabled" instead.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->delete(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;list() -> ?ListWebhooksResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists customer-configured outbound webhook endpoints for the authenticated company.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;listDeliveries($id, $request) -> ?ListDeliveriesWebhooksResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists recent delivery attempts for an outbound webhook endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->listDeliveries(
    'id',
    new ListDeliveriesWebhooksRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;listDeliveryAttempts($id, $deliveryId) -> ?ListDeliveryAttemptsWebhooksResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists the latest HTTP attempt summary for a webhook delivery.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->listDeliveryAttempts(
    'id',
    'deliveryId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$deliveryId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;removeSigningSecret($id, $secretId) -> ?RemoveSigningSecretWebhooksResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Removes an active signing secret. A webhook must keep at least one signing secret.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->removeSigningSecret(
    'id',
    'secretId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$secretId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;replayDelivery($id, $deliveryId) -> ?ReplayDeliveryWebhooksResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Queues a webhook delivery for another signed POST attempt and resets stored endpoint failure state.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->replayDelivery(
    'id',
    'deliveryId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$deliveryId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;test($id) -> ?TestWebhooksResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Queues a test delivery for a webhook endpoint and resets stored endpoint failure state. The test is delivered to this endpoint even when the endpoint subscribes to no event types, and the queued delivery is returned so you can poll its status without waiting for it to appear in the delivery list.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->test(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;update($id, $request) -> ?UpdateWebhooksResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates an outbound webhook endpoint URL, name, status, or subscribed events. Changing the URL or enabling the endpoint resets stored endpoint failure state.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->update(
    'id',
    new UpdateWebhooksRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$events:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$url:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Websites
<details><summary><code>$client-&gt;websites-&gt;add($request) -> ?AddWebsitesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Adds a sending domain to the authenticated company and returns the SPF, DKIM, MAIL FROM, and inbound DNS records required for setup.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->websites->add(
    new AddWebsitesRequest([
        'domain' => 'domain',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$domain:** `string` — Domain to add.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;websites-&gt;get($domain) -> ?GetWebsitesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns verification status and DNS records for a sending domain.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->websites->get(
    'domain',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$domain:** `string` — Sending domain
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;websites-&gt;list() -> ?ListWebsitesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists sending domains configured for the authenticated company.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->websites->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;websites-&gt;verifySendingDomain($domain) -> ?VerifySendingDomainResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Runs a fresh DNS and provider verification and returns normalized aggregate, SPF, DKIM, and MAIL FROM status and diagnostics.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->websites->verifySendingDomain(
    'domain',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$domain:** `string` — Configured sending domain
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Web Tracking Keys
<details><summary><code>$client-&gt;webTrackingKeys-&gt;create($request) -> ?CreateWebTrackingKeysResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a publishable key for the browser tracking SDK and returns the script tag to install. The key ships in page source by design and authorizes storefront events only, never the rest of the API. Events start flowing once the snippet is deployed and nothing is backfilled for the period before that. Always pass allowedOrigins - an empty allowlist accepts events from any site. Requires the integrations:manage scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webTrackingKeys->create(
    new CreateWebTrackingKeysRequest([
        'name' => 'name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$allowedOrigins:** `?array` — Origins allowed to use this key. A bare domain is read as https. A leading *. matches subdomains at any depth but not the apex. Omitting this leaves the key unrestricted.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Human-readable label, e.g. Storefront.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webTrackingKeys-&gt;delete($id) -> ?DeleteWebTrackingKeysResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Permanently deletes a web tracking key. Cached authorization expires within one minute, after which requests from a remaining snippet are rejected. Remove the snippet as well. Prefer revoking with isActive false when the key may be needed again. Requires the integrations:manage scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webTrackingKeys->delete(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Web tracking key ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webTrackingKeys-&gt;get($id) -> ?GetWebTrackingKeysResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns one web tracking key with its install snippet and ingest endpoint. The snippet embeds both the publishable key and the workspace id, so use it as returned rather than rebuilding it. Requires the integrations:manage scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webTrackingKeys->get(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Web tracking key ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webTrackingKeys-&gt;list() -> ?ListWebTrackingKeysResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists the publishable keys that let a website send on-site events (product views, cart activity, collection views, search) into this workspace. Each key includes a paste-ready install snippet and its origin allowlist. A key whose lastUsedAt is null has not successfully authenticated an event yet; it may be undeployed, have no instrumented traffic, or be sending requests rejected by its origin allowlist. Shopify stores use the storefront pixel instead. Requires the integrations:manage scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webTrackingKeys->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webTrackingKeys-&gt;mintIdentity($request) -> ?MintIdentityWebTrackingKeysResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Mints a short-lived HMAC proof bound to one active web tracking key, workspace, and normalized email. Identify the key by keyId or by its publishable publicKey value. If the email is not yet a contact, one is created (active, no lists, no automations triggered) so identified events are attributed instead of being silently dropped. Call this only from an authenticated backend; never expose the secret API key in browser code. Identified browser events without this proof are rejected before queueing. Requires commerce:write, automations:trigger, and subscribers:write (minting can create the contact).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webTrackingKeys->mintIdentity(
    new MintIdentityWebTrackingKeysRequest([
        'email' => 'email',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$email:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$keyId:** `?string` — Internal web tracking key ID. Provide this or publicKey.
    
</dd>
</dl>

<dl>
<dd>

**$publicKey:** `?string` — Publishable key value (seq_pk_...). Provide this or keyId.
    
</dd>
</dl>

<dl>
<dd>

**$ttlHours:** `?float` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webTrackingKeys-&gt;update($id, $request) -> ?UpdateWebTrackingKeysResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Renames a key, replaces its allowed origins, or revokes it. allowedOrigins replaces the whole list rather than appending. Revoking stops events within about a minute while preserving the key value, so the matching snippet can still be found and removed from the site. Requires the integrations:manage scope.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webTrackingKeys->update(
    'id',
    new UpdateWebTrackingKeysRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Web tracking key ID.
    
</dd>
</dl>

<dl>
<dd>

**$allowedOrigins:** `?array` — Replacement allowlist. Pass an empty array to make the key unrestricted.
    
</dd>
</dl>

<dl>
<dd>

**$isActive:** `?bool` — Set false to revoke the key, true to re-enable a revoked one.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Widgets
<details><summary><code>$client-&gt;widgets-&gt;createSavedForm($request) -> ?CreateSavedFormResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates and publishes a saved signup form. Its opaque form ID becomes a client-safe public capability while audience and success settings remain server-side.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->widgets->createSavedForm(
    new CreateSavedFormRequest([
        'listIds' => [
            'listIds',
        ],
        'name' => 'name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$buttonText:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$duplicateStrategy:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$headline:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$listIds:** `array` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$redirectUrl:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$showFirstName:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$showLastName:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$successMessage:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$tagIds:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$theme:** `?array` — Optional visual theme overrides (accentColor, backgroundColor, textColor, mutedTextColor, cardColor, borderColor as "#rrggbb", borderRadius 0-32, headingFontFamily, bodyFontFamily, density).
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;widgets-&gt;createSavedPopup($request) -> ?CreateSavedPopupResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a saved on-site signup popup and returns the one-line script tag that deploys it. The popup is published by default, so the script is live as soon as it is added to the site. Trigger, targeting, audience, and duplicate handling stay server-side, so the deployed script carries no API key.

Omit `listIds` to capture into every list, matching the dashboard default.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->widgets->createSavedPopup(
    new CreateSavedPopupRequest([
        'name' => 'name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$blocks:** `?array` — Complete replacement for the popup's content blocks. The popup must keep exactly one required email field and one submit button.
    
</dd>
</dl>

<dl>
<dd>

**$buttonText:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$duplicateStrategy:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$frequency:** `?SavedPopupFrequency` 
    
</dd>
</dl>

<dl>
<dd>

**$headline:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$listIds:** `?array` — Lists every signup is added to. Omit or pass an empty array to capture into every list.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$placement:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$presentation:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$redirectUrl:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$schedule:** `?SavedPopupSchedule` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$successMessage:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$tagIds:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$targeting:** `?SavedPopupTargeting` 
    
</dd>
</dl>

<dl>
<dd>

**$template:** `?string` — Starting design for the popup's blocks and theme.
    
</dd>
</dl>

<dl>
<dd>

**$theme:** `?array` — Optional visual theme overrides (accentColor, backgroundColor, textColor, mutedTextColor, cardColor, borderColor as "#rrggbb", borderRadius 0-32, headingFontFamily, bodyFontFamily, density).
    
</dd>
</dl>

<dl>
<dd>

**$trigger:** `?SavedPopupTrigger` 
    
</dd>
</dl>

<dl>
<dd>

**$visual:** `?SavedPopupVisual` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;widgets-&gt;deleteSavedPopup($popupId) -> ?DeleteSavedPopupResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Permanently deletes a saved popup along with its view and conversion counts. Subscribers it already captured are not affected. To stop a popup from showing while keeping its stats, set its status to draft instead.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->widgets->deleteSavedPopup(
    'popupId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$popupId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;widgets-&gt;duplicateSavedPopup($popupId, $request) -> ?DuplicateSavedPopupResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Copies a saved popup into a new draft with its own view and conversion counts. The original keeps its status and stats, so a live popup carries on showing while the copy is edited.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->widgets->duplicateSavedPopup(
    'popupId',
    new DuplicateSavedPopupRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$popupId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Name for the copy. Defaults to the original name with " (copy)" appended.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;widgets-&gt;getCompanyScopedSavedSignupFormEmbedScript($companyIdOrFormId, $formId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Compatibility path for saved signup form embed scripts. New embeds should use `/forms/{formId}/embed.js`.

The script renders the current saved form settings when the page loads, so dashboard edits apply to deployed JavaScript embeds without copying new HTML.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->widgets->getCompanyScopedSavedSignupFormEmbedScript(
    'companyIdOrFormId',
    'formId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$companyIdOrFormId:** `string` — The company ID the form belongs to
    
</dd>
</dl>

<dl>
<dd>

**$formId:** `string` — The saved form ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;widgets-&gt;getPopupWidgetRuntime()</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Load the hosted JavaScript runtime for popup signup widgets. No API key is required.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->widgets->getPopupWidgetRuntime();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;widgets-&gt;getSavedFormEmbed($formId) -> ?GetSavedFormEmbedResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a published saved form's public action URL, hosted JavaScript, minimal native form, fetch enhancement, and supported static-site platforms.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->widgets->getSavedFormEmbed(
    'formId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$formId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;widgets-&gt;getSavedPopup($popupId) -> ?GetSavedPopupResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns one saved popup with its complete content blocks, trigger, targeting, schedule, frequency, and theme. Read this before replacing blocks so the replacement array stays complete.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->widgets->getSavedPopup(
    'popupId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$popupId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;widgets-&gt;getSavedPopupEmbed($popupId) -> ?GetSavedPopupEmbedResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a published popup's script URL plus ready-to-paste snippets for plain HTML, React and Next.js, WordPress, and Shopify. The snippets carry no API key.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->widgets->getSavedPopupEmbed(
    'popupId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$popupId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;widgets-&gt;getSavedSignupFormEmbedScript($companyIdOrFormId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Load a saved signup form with one line of JavaScript. No API key is required.

The script renders the current saved form settings when the page loads, so dashboard edits apply to deployed JavaScript embeds without copying new HTML.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->widgets->getSavedSignupFormEmbedScript(
    'companyIdOrFormId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$companyIdOrFormId:** `string` — The saved form ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;widgets-&gt;listSavedForms() -> ?ListSavedFormsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists saved signup forms for the authenticated workspace, including their server-managed audience settings and public action URLs.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->widgets->listSavedForms();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;widgets-&gt;listSavedPopups($request) -> ?ListSavedPopupsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists saved on-site signup popups for the authenticated workspace, including their trigger, targeting, audience settings, and view and conversion counts.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->widgets->listSavedPopups(
    new ListSavedPopupsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$includeContent:** `?string` — Set to `true` to include every popup's full content blocks. Omitted by default because each popup adds roughly 1.8k characters; read one popup with `GET /popups/{popupId}` instead.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;widgets-&gt;submitCompanyScopedSavedSignupForm($companyIdOrFormId, $formId, $request) -> ?SubmitCompanyScopedSavedSignupFormResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Compatibility path for saved signup form submissions. New embeds should use `/forms/{formId}`.

The form's stored settings are the source of truth for audience targeting (lists, tags) and success behavior (success message or redirect URL), so dashboard edits apply to deployed embeds without re-embedding. List, tag, and redirect values in the request are ignored.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->widgets->submitCompanyScopedSavedSignupForm(
    'companyIdOrFormId',
    'formId',
    new SubmitCompanyScopedSavedSignupFormRequest([
        'email' => 'user@example.com',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$companyIdOrFormId:** `string` — The company ID the form belongs to
    
</dd>
</dl>

<dl>
<dd>

**$formId:** `string` — The saved form ID
    
</dd>
</dl>

<dl>
<dd>

**$customAttributes:** `?array` — Subscriber custom attributes for custom fields configured on the saved form
    
</dd>
</dl>

<dl>
<dd>

**$duplicateStrategy:** `?string` — Ignored for saved forms. Stored form settings are used.
    
</dd>
</dl>

<dl>
<dd>

**$duplicateStrategyToken:** `?string` — Ignored for saved forms. Stored form settings are used.
    
</dd>
</dl>

<dl>
<dd>

**$email:** `string` — Subscriber email address
    
</dd>
</dl>

<dl>
<dd>

**$firstName:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$lastName:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$listIds:** `?array` — Ignored for saved forms. Stored form settings are used.
    
</dd>
</dl>

<dl>
<dd>

**$listIdsBracketed:** `?array` — Ignored for saved forms. Stored form settings are used.
    
</dd>
</dl>

<dl>
<dd>

**$phone:** `?string` — Subscriber phone number in E.164 or US national format, when configured on the saved form. Stored on the base subscriber profile and does not grant SMS consent.
    
</dd>
</dl>

<dl>
<dd>

**$redirectUrl:** `?string` — Ignored for saved forms. Stored form settings are used.
    
</dd>
</dl>

<dl>
<dd>

**$tagIds:** `?array` — Ignored for saved forms. Stored form settings are used.
    
</dd>
</dl>

<dl>
<dd>

**$tagIdsBracketed:** `?array` — Ignored for saved forms. Stored form settings are used.
    
</dd>
</dl>

<dl>
<dd>

**$website:** `?string` — Honeypot field. Leave empty.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;widgets-&gt;submitSavedPopup($popupId, $request) -> ?SubmitSavedPopupResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Submit a saved popup without an API key. The popup's stored content is the source of truth for audience targeting, duplicate handling, custom fields, and success behavior.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->widgets->submitSavedPopup(
    'popupId',
    new SubmitSavedPopupRequest([
        'email' => 'user@example.com',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$popupId:** `string` — The saved popup ID
    
</dd>
</dl>

<dl>
<dd>

**$customAttributes:** `?array` — Subscriber custom attributes for custom fields configured on the popup
    
</dd>
</dl>

<dl>
<dd>

**$email:** `string` — Subscriber email address
    
</dd>
</dl>

<dl>
<dd>

**$firstName:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$lastName:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$phone:** `?string` — Subscriber phone number in E.164 or US national format, when configured on the popup. Stored on the base subscriber profile and does not grant SMS consent.
    
</dd>
</dl>

<dl>
<dd>

**$website:** `?string` — Honeypot field. Leave empty.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;widgets-&gt;submitSignupForm($companyIdOrFormId, $request) -> ?SubmitSignupFormResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Submit a public signup form. No API key is required.

When the path value is a saved form ID, the form's stored settings are used for audience targeting and success behavior. When the path value is a company ID, this endpoint uses the legacy company-level form behavior.

Omit `lists` to use the workspace default lists setting, provide `lists=` to add the subscriber to no lists, or provide comma-separated list IDs for specific lists. Provide stable `tags` IDs to apply existing tags to the subscriber.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->widgets->submitSignupForm(
    'companyIdOrFormId',
    new SubmitSignupFormRequest([
        'lists' => 'list_abc123,list_def456',
        'tags' => 'tag_abc123,tag_def456',
        'email' => 'user@example.com',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$companyIdOrFormId:** `string` — A saved form ID, or a company ID for legacy generated forms
    
</dd>
</dl>

<dl>
<dd>

**$duplicateStrategy:** `?string` — How to handle an existing contact with the submitted email. Use skip to preserve fields, merge to fill missing fields, or overwrite to replace submitted fields. Merge and overwrite require duplicateStrategyToken from the form builder.
    
</dd>
</dl>

<dl>
<dd>

**$duplicateStrategyToken:** `?string` — Signed token generated by the form builder for the selected duplicateStrategy. Required for merge or overwrite.
    
</dd>
</dl>

<dl>
<dd>

**$lists:** `?string` — Comma-separated list IDs. Omit for workspace default lists, or provide an empty value for no lists.
    
</dd>
</dl>

<dl>
<dd>

**$tags:** `?string` — Comma-separated tag IDs to apply to the subscriber.
    
</dd>
</dl>

<dl>
<dd>

**$customAttributes:** `?array` — Subscriber custom attributes
    
</dd>
</dl>

<dl>
<dd>

**$bodyDuplicateStrategy:** `?string` — Body alternative to the duplicateStrategy query parameter. Query parameter takes precedence. Merge and overwrite require duplicateStrategyToken.
    
</dd>
</dl>

<dl>
<dd>

**$bodyDuplicateStrategyToken:** `?string` — Body alternative to the duplicateStrategyToken query parameter.
    
</dd>
</dl>

<dl>
<dd>

**$email:** `string` — Subscriber email address
    
</dd>
</dl>

<dl>
<dd>

**$firstName:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$lastName:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$listIds:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$phone:** `?string` — Subscriber phone number in E.164 or US national format. Stored on the base subscriber profile and does not grant SMS consent.
    
</dd>
</dl>

<dl>
<dd>

**$redirectUrl:** `?string` — Http(s) URL or bare domain to redirect to after successful submission
    
</dd>
</dl>

<dl>
<dd>

**$tagIds:** `?array` — Existing tag IDs to apply to the subscriber
    
</dd>
</dl>

<dl>
<dd>

**$website:** `?string` — Honeypot field. Leave empty.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;widgets-&gt;updateSavedForm($companyIdOrFormId, $request) -> ?UpdateSavedFormResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a saved form's name, audience targeting, copy, visual theme, or content blocks. Every field is optional - send only what should change.

The `headline`, `description`, `buttonText`, and `successMessage` fields edit the matching content block and fail with 400 when the form has no such block; replace `blocks` for structural changes. The `blocks` array fully replaces the form's content blocks and must keep exactly one required email field and one submit button. An empty `redirectUrl` switches the form back to its confirmation message.

Blocks render in array order and each needs a unique `id` and a `kind`. Input blocks use `kind: "form-field"` with `fieldType` (text, email, phone, number, textarea, select, radio, checkbox, consent, hidden), `name` (the custom attribute key), `label`, `placeholder`, `required`, `defaultValue`, `showLabel`, `width` (full or half), `mapsTo` (email, firstName, lastName, phone, customAttribute; defaults to customAttribute), and `options` for choice fields (`[{ value, label, id }]`, where label and id default to value). A hidden field with a `defaultValue` stores that server-owned value and ignores submitted values; a hidden field without one stores the value the page submits. Validation errors name the offending property, for example `blocks[3].options[0].value`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->widgets->updateSavedForm(
    'companyIdOrFormId',
    new UpdateSavedFormRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$companyIdOrFormId:** `string` — The saved form ID to update
    
</dd>
</dl>

<dl>
<dd>

**$blocks:** `?array` — Full replacement for the form's content blocks.
    
</dd>
</dl>

<dl>
<dd>

**$buttonText:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$duplicateStrategy:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$headline:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$listIds:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$redirectUrl:** `?string` — HTTP or HTTPS success redirect. An empty string switches back to the confirmation message.
    
</dd>
</dl>

<dl>
<dd>

**$successMessage:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$tagIds:** `?array` — Replacement tag IDs. An empty array clears tags.
    
</dd>
</dl>

<dl>
<dd>

**$theme:** `?array` — Visual theme overrides merged into the current theme (accentColor, backgroundColor, textColor, mutedTextColor, cardColor, borderColor as "#rrggbb", borderRadius 0-32, headingFontFamily, bodyFontFamily, density).
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;widgets-&gt;updateSavedPopup($popupId, $request) -> ?UpdateSavedPopupResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates a saved popup. Only the fields you send change.

Set `status` to `published` to make the popup live, or `draft` to stop it showing while keeping the popup, its stats, and its embed script. `trigger`, `targeting`, `schedule`, `frequency`, and `visual` are merged key by key, so patching one key keeps the rest.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->widgets->updateSavedPopup(
    'popupId',
    new UpdateSavedPopupRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$popupId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$blocks:** `?array` — Complete replacement for the popup's content blocks. The popup must keep exactly one required email field and one submit button.
    
</dd>
</dl>

<dl>
<dd>

**$buttonText:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — New text for the popup's first paragraph block. Fails when the popup has no paragraph block.
    
</dd>
</dl>

<dl>
<dd>

**$duplicateStrategy:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$frequency:** `?SavedPopupFrequency` 
    
</dd>
</dl>

<dl>
<dd>

**$headline:** `?string` — New text for the popup's first heading block. Fails when the popup has no heading block.
    
</dd>
</dl>

<dl>
<dd>

**$listIds:** `?array` — Replacement list targeting. Pass an empty array to capture into every list.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$placement:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$presentation:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$redirectUrl:** `?string` — HTTP or HTTPS URL for successful signups. Pass an empty string to switch back to the confirmation message.
    
</dd>
</dl>

<dl>
<dd>

**$schedule:** `?SavedPopupSchedule` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$successMessage:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$tagIds:** `?array` — Replacement tag IDs. Pass an empty array to clear tags.
    
</dd>
</dl>

<dl>
<dd>

**$targeting:** `?SavedPopupTargeting` 
    
</dd>
</dl>

<dl>
<dd>

**$theme:** `?array` — Visual theme overrides merged into the current theme.
    
</dd>
</dl>

<dl>
<dd>

**$trigger:** `?SavedPopupTrigger` 
    
</dd>
</dl>

<dl>
<dd>

**$visual:** `?SavedPopupVisual` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Widgets Preferences
<details><summary><code>$client-&gt;widgets-&gt;preferences-&gt;generateToken($request) -> ?GenerateTokenPreferencesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Generate a signed token to embed the subscription preferences widget for a subscriber.
This token allows users to manage their email subscription preferences directly from your website.

**Important:** Call this endpoint from your backend only. Never expose your API key to the frontend.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->widgets->preferences->generateToken(
    new GenerateTokenPreferencesRequest([
        'email' => 'user@example.com',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$email:** `string` — The subscriber's email address
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

