# Reference
## Chat
<details><summary><code>$client-&gt;chat-&gt;listChatCompletions($request) -> ?ListChatCompletionsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a paginated list of chat completions (prompts) for the agent, with applied tags expanded as { id, name } and share metadata.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->chat->listChatCompletions(
    new ListChatCompletionsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — Results per page (clamped to 100).
    
</dd>
</dl>

<dl>
<dd>

**$agentId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$channelId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$bibleId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$cached:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$client:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$configId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$conversationId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$deviceId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$flagged:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$favorited:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$language:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$liked:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$sessionId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$userId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$minTimestamp:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$maxTimestamp:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;chat-&gt;createChatCompletion($request) -> ?ChatCompletionResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a chat completion using the agent's configured model. Supports both streaming and non-streaming responses.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->chat->createChatCompletion(
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

<details><summary><code>$client-&gt;chat-&gt;likeCompletion($id, $request) -> ?SuccessResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the like status of a specific chat completion
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->chat->likeCompletion(
    'id',
    new LikeRequest([
        'liked' => true,
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

**$id:** `string` — The ID of the chat completion
    
</dd>
</dl>

<dl>
<dd>

**$liked:** `bool` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;chat-&gt;flagCompletion($id, $request) -> ?SuccessResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the flagged status of a specific chat completion
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->chat->flagCompletion(
    'id',
    new FlagRequest([
        'flagged' => true,
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

**$id:** `string` — The ID of the chat completion
    
</dd>
</dl>

<dl>
<dd>

**$flagged:** `bool` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;chat-&gt;feedbackCompletion($id, $request) -> ?SuccessResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Adds user feedback to a specific chat completion
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->chat->feedbackCompletion(
    'id',
    new FeedbackRequest([
        'feedback' => 'feedback',
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

**$id:** `string` — The ID of the chat completion
    
</dd>
</dl>

<dl>
<dd>

**$feedback:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;chat-&gt;shareCompletion($id, $request) -> ?SuccessResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a share record for a specific chat completion
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->chat->shareCompletion(
    'id',
    new ShareRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The ID of the chat completion
    
</dd>
</dl>

<dl>
<dd>

**$conversationId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$sessionId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$userId:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;chat-&gt;getChatCompletion($id) -> ?GetChatCompletionResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a single chat completion (prompt) by numeric id or UUID, including applied tags, guardrail/cta metadata, share metadata, and automation results.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->chat->getChatCompletion(
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

**$id:** `string` — The numeric id or UUID of the chat completion
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Corpus
<details><summary><code>$client-&gt;corpus-&gt;searchCorpus($request) -> ?SearchCorpusResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Performs a semantic search across the agent's corpus of knowledge
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->corpus->searchCorpus(
    new CorpusSearchRequest([
        'query' => 'query',
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

**$query:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$promptId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$filters:** `?CorpusSearchRequestFilters` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;corpus-&gt;logCorpusView($model, $id, $request) -> ?SuccessResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Records that a user viewed a specific corpus item
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->corpus->logCorpusView(
    'model',
    'id',
    new ViewRequest([
        'promptId' => 'prompt_id',
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

**$model:** `string` — The model type (e.g., 'source')
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — The ID of the corpus item
    
</dd>
</dl>

<dl>
<dd>

**$promptId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$userId:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;corpus-&gt;logCorpusImpression($model, $id, $request) -> ?SuccessResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Records that a corpus item was shown to a user
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->corpus->logCorpusImpression(
    'model',
    'id',
    new ImpressionRequest([
        'promptId' => 'prompt_id',
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

**$model:** `string` — The model type (e.g., 'source')
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — The ID of the corpus item
    
</dd>
</dl>

<dl>
<dd>

**$promptId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$userId:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;corpus-&gt;logCorpusReferralRedirect($model, $id, $request) -> ?SuccessResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Records a referral for a corpus item and, when a `url` is supplied, issues a 302 redirect to it. Without a `url`, responds with a success message. Requires either the search API entitlement or a signed `browser_key` cookie.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->corpus->logCorpusReferralRedirect(
    'model',
    'id',
    new LogCorpusReferralRedirectRequest([
        'promptId' => 'prompt_id',
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

**$model:** `string` — The model type (e.g., 'source')
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — The numeric ID of the corpus item
    
</dd>
</dl>

<dl>
<dd>

**$promptId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$userId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$url:** `?string` — URL-encoded destination to redirect to after logging the referral.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;corpus-&gt;logCorpusReferral($model, $id, $request) -> ?SuccessResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Records that a user was referred to a corpus item
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->corpus->logCorpusReferral(
    'model',
    'id',
    new ReferralRequest([
        'promptId' => 'prompt_id',
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

**$model:** `string` — The model type (e.g., 'source')
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — The ID of the corpus item
    
</dd>
</dl>

<dl>
<dd>

**$promptId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$userId:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Evaluators
<details><summary><code>$client-&gt;evaluators-&gt;listEvaluations($id, $request) -> ?ListEvaluationsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a paginated list of evaluations for the evaluator, scoped to the requesting agent.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->evaluators->listEvaluations(
    'id',
    new ListEvaluationsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The ID or key of the evaluator
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — Results per page (clamped to 100).
    
</dd>
</dl>

<dl>
<dd>

**$minTimestamp:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$maxTimestamp:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$minDuration:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$maxDuration:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$minScore:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$maxScore:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$passed:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$benchmark:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$benchmarkRunId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$benchmarkQuestionId:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;evaluators-&gt;evaluateContent($id, $request) -> ?EvaluateContentResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Runs an evaluation on the provided content using the specified evaluator
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->evaluators->evaluateContent(
    'id',
    new EvaluatorRequest([
        'content' => 'content',
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

**$id:** `string` — The ID or key of the evaluator
    
</dd>
</dl>

<dl>
<dd>

**$frequencyPenalty:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$confidenceThreshold:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$content:** `string|array` 
    
</dd>
</dl>

<dl>
<dd>

**$model:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$presencePenalty:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$reasoningEffort:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$verbosity:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$temperature:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$topP:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$variables:** `?array` — Flat string key/value pairs substituted into `{key}` placeholders in the evaluator prompt. Reserved keys (`options`, `option_descriptions`, `criteria`) cannot be overridden. Not persisted; omitted from the response.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;evaluators-&gt;getEvaluation($id, $evaluationId) -> ?GetEvaluationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a single evaluation for the evaluator, scoped to the requesting agent.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->evaluators->getEvaluation(
    'id',
    'evaluationId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The id or key of the evaluator
    
</dd>
</dl>

<dl>
<dd>

**$evaluationId:** `string` — The id or UUID of the evaluation
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## CTAs
<details><summary><code>$client-&gt;ctAs-&gt;matchCtas($request) -> ?MatchCtasResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Finds matching CTAs based on conversation context, user, session, device, or messages
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ctAs->matchCtas(
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

<details><summary><code>$client-&gt;ctAs-&gt;logCtaClick($id, $request) -> ?SuccessResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Records that a user clicked on a specific CTA
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ctAs->logCtaClick(
    'id',
    new CtaClickRequest([
        'promptId' => 'prompt_id',
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

**$id:** `string` — The ID of the CTA
    
</dd>
</dl>

<dl>
<dd>

**$promptId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Users
<details><summary><code>$client-&gt;users-&gt;listUsers($request) -> ?ListUsersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a paginated list of users for the agent's team, with applied tags expanded as { id, name } and the persisted responder id.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->users->listUsers(
    new ListUsersRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — Results per page (clamped to 100).
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$tags:** `?string` — Comma-separated tag ids.
    
</dd>
</dl>

<dl>
<dd>

**$responderId:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$minTimestamp:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$maxTimestamp:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;users-&gt;listUserFlags($request) -> ?ListUserFlagsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a paginated list of user flag definitions for the agent's team (all columns from user_flags), ordered by id ascending.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->users->listUserFlags(
    new ListUserFlagsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — Results per page (clamped to 100).
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;users-&gt;getUser($userId) -> ?GetUserResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a single user by external id or internal id, with expanded tags and the persisted responder for the agent.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->users->getUser(
    'user_id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$userId:** `string` — The user's external id or internal id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;users-&gt;updateUser($userId, $request) -> ?UpdateUserResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates a user's external_id and/or tags and upserts the persisted responder for the agent. Only provided fields are changed.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->users->updateUser(
    'user_id',
    new UserUpdateRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$userId:** `string` — The user's external id or internal id
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `?string` — Your external identifier for the user.
    
</dd>
</dl>

<dl>
<dd>

**$tags:** `?array` — Applied tags as a mix of existing tag ids and/or default-language tag names. Unknown ids or names are rejected. Tags are mirror-owned and never created here.
    
</dd>
</dl>

<dl>
<dd>

**$responderId:** `?int` — Responder to persist for this user on the requesting agent. Must be active on the agent.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Benchmarks
<details><summary><code>$client-&gt;benchmarks-&gt;listBenchmarkRuns($id, $request) -> ?ListBenchmarkRunsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a paginated list of runs for a benchmark, scoped to the requesting agent. Each run carries nested evaluators, questions, and a flat evaluations array.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->benchmarks->listBenchmarkRuns(
    'id',
    new ListBenchmarkRunsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The id or key of the benchmark
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — Results per page (clamped to 100).
    
</dd>
</dl>

<dl>
<dd>

**$minTimestamp:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$maxTimestamp:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$minDuration:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$maxDuration:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$minScore:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$maxScore:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$passed:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$minResponses:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$maxResponses:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;benchmarks-&gt;runBenchmark($id, $request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Executes a benchmark run and returns the aggregated result with nested evaluators, questions, and a flat evaluations array.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->benchmarks->runBenchmark(
    'id',
    new BenchmarkRunRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The id or key of the benchmark
    
</dd>
</dl>

<dl>
<dd>

**$content:** `string|array|null` — Content to evaluate. Required when `source_id` is supplied.
    
</dd>
</dl>

<dl>
<dd>

**$completionId:** `?string` — Completion UUID whose stored response should be evaluated.
    
</dd>
</dl>

<dl>
<dd>

**$sourceId:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$model:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$numResponses:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$useQuestionVariants:** `?bool` 
    
</dd>
</dl>

<dl>
<dd>

**$reasoningEffort:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$verbosity:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$scoreThreshold:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$valueThreshold:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$temperature:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$topP:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$frequencyPenalty:** `?float` 
    
</dd>
</dl>

<dl>
<dd>

**$presencePenalty:** `?float` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;benchmarks-&gt;getBenchmarkRun($id, $runId) -> ?GetBenchmarkRunResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a single benchmark run by id or UUID, scoped to the requesting agent, including nested evaluators, questions, and evaluations.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->benchmarks->getBenchmarkRun(
    'id',
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

**$id:** `string` — The id or key of the benchmark
    
</dd>
</dl>

<dl>
<dd>

**$runId:** `string` — The id or UUID of the run
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Channels
<details><summary><code>$client-&gt;channels-&gt;getDiscordChannelStatus($id) -> ?GetDiscordChannelStatusResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the status of the Discord channel. Used as a lightweight health/verification endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->channels->getDiscordChannelStatus(
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

**$id:** `string` — The channel id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;channels-&gt;receiveDiscordInteraction($id, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Receives Discord interaction callbacks for the channel. Requests are verified via Ed25519 signature headers; unsigned or invalid requests are rejected. Payload shape is defined by Discord.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->channels->receiveDiscordInteraction(
    'id',
    new ReceiveDiscordInteractionRequest([
        'signatureEd25519' => 'x-signature-ed25519',
        'signatureTimestamp' => 'x-signature-timestamp',
        'body' => [
            'key' => "value",
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

**$id:** `string` — The channel id
    
</dd>
</dl>

<dl>
<dd>

**$signatureEd25519:** `string` — Discord request signature (hex).
    
</dd>
</dl>

<dl>
<dd>

**$signatureTimestamp:** `string` — Discord request timestamp.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `array` — Discord interaction payload.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;channels-&gt;getLineChannelStatus($id) -> ?GetLineChannelStatusResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the status of the LINE channel. Used as a lightweight health/verification endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->channels->getLineChannelStatus(
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

**$id:** `string` — The channel id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;channels-&gt;receiveLineWebhook($id, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Receives LINE Messaging API webhook events for the channel. Requests are verified via the `x-line-signature` HMAC-SHA256 (Base64) header using the channel secret unless an `api_key` is present. Payload shape is defined by LINE. The route acknowledges quickly and processes text `message` and `follow` events asynchronously.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->channels->receiveLineWebhook(
    'id',
    new ReceiveLineWebhookRequest([
        'body' => [
            'key' => "value",
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

**$id:** `string` — The channel id
    
</dd>
</dl>

<dl>
<dd>

**$lineSignature:** `?string` — Base64-encoded HMAC-SHA256 of the raw body keyed with the LINE channel secret. Required when the webhook URL does not include an api_key.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `array` — LINE webhook payload (`destination` + `events`).
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;channels-&gt;verifyFacebookWebhook($id, $request) -> string</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Handles the Meta webhook verification handshake, echoing `hub.challenge` when `hub.verify_token` matches the channel's configured token.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->channels->verifyFacebookWebhook(
    'id',
    new VerifyFacebookWebhookRequest([
        'hubMode' => VerifyFacebookWebhookRequestHubMode::Subscribe->value,
        'hubVerifyToken' => 'hub.verify_token',
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

**$id:** `string` — The channel id
    
</dd>
</dl>

<dl>
<dd>

**$hubMode:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$hubVerifyToken:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$hubChallenge:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;channels-&gt;receiveFacebookMessage($id, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Receives Facebook/Messenger (and Instagram-style) message events for the channel. Payload shape is defined by Meta.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->channels->receiveFacebookMessage(
    'id',
    new ReceiveFacebookMessageRequest([
        'body' => [
            'key' => "value",
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

**$id:** `string` — The channel id
    
</dd>
</dl>

<dl>
<dd>

**$request:** `array` — Meta webhook payload.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;channels-&gt;getInstagramPrivacyPolicy($id) -> string</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a static HTML privacy policy page for the Instagram integration.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->channels->getInstagramPrivacyPolicy(
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

**$id:** `string` — The channel id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;channels-&gt;receiveTelegramUpdate($id, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Receives Telegram bot update events for the channel. Non-message updates are acknowledged and ignored. Payload shape is defined by Telegram.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->channels->receiveTelegramUpdate(
    'id',
    new ReceiveTelegramUpdateRequest([
        'body' => [
            'key' => "value",
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

**$id:** `string` — The channel id
    
</dd>
</dl>

<dl>
<dd>

**$request:** `array` — Telegram update payload.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;channels-&gt;receiveTwilioMessage($id, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Receives inbound Twilio messages for the channel as form-encoded data. Payload fields are defined by Twilio.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->channels->receiveTwilioMessage(
    'id',
    new ReceiveTwilioMessageRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The channel id
    
</dd>
</dl>

<dl>
<dd>

**$from:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$body:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Shares
<details><summary><code>$client-&gt;shares-&gt;getSharedMessages($token) -> ?GetSharedMessagesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Public, unauthenticated read of the messages behind a share token. The token is the bearer capability and enforces tenant isolation against the host agent. An empty or invalid token yields an empty messages array.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->shares->getSharedMessages(
    'token',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$token:** `string` — The share token
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

