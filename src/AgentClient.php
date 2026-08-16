<?php

namespace Apologist;

use Apologist\Chat\ChatClient;
use Apologist\Corpus\CorpusClient;
use Apologist\Evaluators\EvaluatorsClient;
use Apologist\CtAs\CtAsClient;
use Apologist\Users\UsersClient;
use Apologist\Benchmarks\BenchmarksClient;
use Apologist\Channels\ChannelsClient;
use Apologist\Shares\SharesClient;
use Psr\Http\Client\ClientInterface;
use Apologist\Core\Client\RawClient;

class AgentClient
{
    /**
     * @var ChatClient $chat
     */
    public ChatClient $chat;

    /**
     * @var CorpusClient $corpus
     */
    public CorpusClient $corpus;

    /**
     * @var EvaluatorsClient $evaluators
     */
    public EvaluatorsClient $evaluators;

    /**
     * @var CtAsClient $ctAs
     */
    public CtAsClient $ctAs;

    /**
     * @var UsersClient $users
     */
    public UsersClient $users;

    /**
     * @var BenchmarksClient $benchmarks
     */
    public BenchmarksClient $benchmarks;

    /**
     * @var ChannelsClient $channels
     */
    public ChannelsClient $channels;

    /**
     * @var SharesClient $shares
     */
    public SharesClient $shares;

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
     * @param ?string $apiKey The apiKey to use for authentication.
     * @param ?string $domain The domain to substitute into the base URL. Defaults to "your-agent-domain.com".
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        ?string $apiKey = null,
        ?string $domain = null,
        ?array $options = null,
    ) {
        $defaultHeaders = [
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'Apologist',
            'X-Fern-SDK-Version' => '0.0.9',
            'User-Agent' => 'apologist/apologist/0.0.9',
        ];
        if ($apiKey != null) {
            $defaultHeaders['x-api-key'] = $apiKey;
        }

        $this->options = $options ?? [];
        if ($domain != null) {
            $baseUrl = $this->options['baseUrl'] ?? null;
            if ($baseUrl == null || $baseUrl === Environments::Default_->value) {
                $this->options['baseUrl'] = 'https://' . $domain . '/api/v1';
            }
        }


        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );

        $this->chat = new ChatClient($this->client, $this->options);
        $this->corpus = new CorpusClient($this->client, $this->options);
        $this->evaluators = new EvaluatorsClient($this->client, $this->options);
        $this->ctAs = new CtAsClient($this->client, $this->options);
        $this->users = new UsersClient($this->client, $this->options);
        $this->benchmarks = new BenchmarksClient($this->client, $this->options);
        $this->channels = new ChannelsClient($this->client, $this->options);
        $this->shares = new SharesClient($this->client, $this->options);
    }
}
