# ApologistAi PHP Library

[![fern shield](https://img.shields.io/badge/%F0%9F%8C%BF-Built%20with%20Fern-brightgreen)](https://buildwithfern.com?utm_source=github&utm_medium=github&utm_campaign=readme&utm_source=https%3A%2F%2Fgithub.com%2Fapologist-project%2Fapg-sdk-php)
[![php shield](https://img.shields.io/badge/php-packagist-pink)](https://packagist.org/packages/apologist/apologist)

The ApologistAi PHP library provides convenient access to the ApologistAi APIs from PHP.

## Table of Contents

- [Documentation](#documentation)
- [Installation](#installation)
- [Usage](#usage)
- [Advanced Concepts](#advanced-concepts)
- [Versioning](#versioning)
- [Requirements](#requirements)
- [Environments](#environments)
- [Exception Handling](#exception-handling)
- [Advanced](#advanced)
  - [Custom Client](#custom-client)
  - [Retries](#retries)
  - [Timeouts](#timeouts)
- [Contributing](#contributing)

## Documentation

## Installation

```sh
composer require apologist/apologist
```

## Usage

Instantiate and use the client with the following:

```php
<?php

namespace Example;

use Apologist\ApologistAgent;

$client = new ApologistAgent(
    apiKey: '<value>',
);
$client->chat->createChatCompletion(
    [
        'key' => "value",
    ],
);

```

## Advanced concepts

### Making custom or undocumented requests

#### Undocumented properties

You can send undocumented parameters to any endpoint, and read undocumented response properties, like so:

Note: the `extra*` parameters of the same name overrides the documented parameters.

```php
<?php

use Apologist\RequestOptions;

$pet = $client->pet->update(
  name: 'doggie',
  photoURLs: ['string'],
  requestOptions: RequestOptions::with(
    extraQueryParams: ['my_query_parameter' => 'value'],
    extraBodyParams: ['my_body_parameter' => 'value'],
    extraHeaders: ['my-header' => 'value'],
  ),
);
```

#### Undocumented request params

If you want to explicitly send an extra param, you can do so with the `extra_query`, `extra_body`, and `extra_headers` under the `request_options:` parameter when making a request, as seen in the examples above.

#### Undocumented endpoints

To make requests to undocumented endpoints while retaining the benefit of auth, retries, and so on, you can make requests using `client.request`, like so:

```php
<?php

$response = $client->request(
  method: "post",
  path: '/undocumented/endpoint',
  query: ['dog' => 'woof'],
  headers: ['useful-header' => 'interesting-value'],
  body: ['hello' => 'world']
);
```

## Versioning

This package follows [SemVer](https://semver.org/spec/v2.0.0.html) conventions. As the library is in initial development and has a major version of `0`, APIs may change at any time.

This package considers improvements to the (non-runtime) PHPDoc type definitions to be non-breaking changes.

## Requirements

This SDK requires PHP ^8.1.

## Environments

This SDK allows you to configure different environments for API requests.

```php
The SDK defaults to the `Default_` environment. To use a different environment, pass it to the client constructor:

```php
use Apologist\ApologistAgent;
use Apologist\Environments;

$client = new ApologistAgent(
    token: '<YOUR_TOKEN>',
    options: [
        'baseUrl' => Environments::Staging->value
    ]
);
```

Available environments:
- `Environments::Default_`
```

## Exception Handling

When the API returns a non-success status code (4xx or 5xx response), an exception will be thrown.

```php
use Apologist\Exceptions\ApologistAiApiException;
use Apologist\Exceptions\ApologistAiException;

try {
    $response = $client->chat->createChatCompletion(...);
} catch (ApologistAiApiException $e) {
    echo 'API Exception occurred: ' . $e->getMessage() . "\n";
    echo 'Status Code: ' . $e->getCode() . "\n";
    echo 'Response Body: ' . $e->getBody() . "\n";
    // Optionally, rethrow the exception or handle accordingly.
}
```

## Advanced

### Custom Client

This SDK is built to work with any HTTP client that implements the [PSR-18](https://www.php-fig.org/psr/psr-18/) `ClientInterface`.
By default, if no client is provided, the SDK will use `php-http/discovery` to find an installed HTTP client.
However, you can pass your own client that adheres to `ClientInterface`:

```php
use Apologist\ApologistAgent;

// Pass any PSR-18 compatible HTTP client implementation.
// For example, using Guzzle:
$customClient = new \GuzzleHttp\Client([
    'timeout' => 5.0,
]);

$client = new ApologistAgent(options: [
    'client' => $customClient
]);

// Or using Symfony HttpClient:
// $customClient = (new \Symfony\Component\HttpClient\Psr18Client())
//     ->withOptions(['timeout' => 5.0]);
//
// $client = new ApologistAgent(options: [
//     'client' => $customClient
// ]);
```

### Retries

The SDK is instrumented with automatic retries with exponential backoff. A request will be retried as long
as the request is deemed retryable and the number of retry attempts has not grown larger than the configured
retry limit (default: 2).

A request is deemed retryable when any of the following HTTP status codes is returned:

- [408](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/408) (Timeout)
- [429](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/429) (Too Many Requests)
- [5XX](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status#server_error_responses) (Internal Server Error)

The `retryStatusCodes` configuration controls which [5XX](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status#server_error_responses) status codes are retried:

- `legacy` (default): Retries `408`, `429`, and all `>= 500`
- `recommended`: Retries `408`, `429`, `502`, `503`, `504` only (excludes `500 Internal Server Error` to avoid retrying non-idempotent failures)

Use the `maxRetries` request option to configure this behavior.

```php
$response = $client->chat->createChatCompletion(
    ...,
    options: [
        'maxRetries' => 0 // Override maxRetries at the request level
    ]
);
```

### Timeouts

The SDK defaults to a 30 second timeout. Use the `timeout` option to configure this behavior.

```php
$response = $client->chat->createChatCompletion(
    ...,
    options: [
        'timeout' => 3.0 // Override timeout at the request level
    ]
);
```

## Contributing

While we value open-source contributions to this SDK, this library is generated programmatically.
Additions made directly to this library would have to be moved over to our generation code,
otherwise they would be overwritten upon the next generated release. Feel free to open a PR as
a proof of concept, but know that we will not be able to merge it as-is. We suggest opening
an issue first to discuss with us!

On the other hand, contributions to the README are always very welcome!
