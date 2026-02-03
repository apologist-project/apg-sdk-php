# Changelog

## 0.2.0 (2026-02-03)

Full Changelog: [v0.1.0...v0.2.0](https://github.com/apologist-project/apg-sdk-php/compare/v0.1.0...v0.2.0)

### ⚠ BREAKING CHANGES

* replace special flag type `omittable` with just `null`

### Features

* replace special flag type `omittable` with just `null` ([1c7ddda](https://github.com/apologist-project/apg-sdk-php/commit/1c7ddda2a90898981f5af02d6a7c21c898206d2a))
* simplify and make the phpstan types more consistent ([014f7ae](https://github.com/apologist-project/apg-sdk-php/commit/014f7aefecd5ce412401b0fc8cbfe602f11aa65b))
* use `$_ENV` aware getenv helper ([7678cda](https://github.com/apologist-project/apg-sdk-php/commit/7678cda80af046f2293f6f03a0ae45af597b769c))


### Bug Fixes

* typos in README.md ([891d143](https://github.com/apologist-project/apg-sdk-php/commit/891d14395966e0fe452b0eec6f4348042af3504a))
* used redirect count instead of retry count in base client ([9fb5058](https://github.com/apologist-project/apg-sdk-php/commit/9fb50586d9a79b6db220ea7d93ef70f83a95ae02))


### Chores

* add git attributes and composer lock file ([0372924](https://github.com/apologist-project/apg-sdk-php/commit/03729241a0c1d3bdc49e3ffe723f401eefacb6ea))
* fix typo in descriptions ([d8945b6](https://github.com/apologist-project/apg-sdk-php/commit/d8945b6e1799659dfc675caefb1c9e6e4656f9e8))
* **internal:** add a basic client test ([44dcfc7](https://github.com/apologist-project/apg-sdk-php/commit/44dcfc73eaa22d6b6fe07c818e295d222b319637))
* **internal:** codegen related update ([11fcc00](https://github.com/apologist-project/apg-sdk-php/commit/11fcc00b0806e07a97ebd54e16dd501dfda227ea))
* **internal:** codegen related update ([80e65d3](https://github.com/apologist-project/apg-sdk-php/commit/80e65d315793484f162bd235b5805b69bac8f53e))
* **internal:** codegen related update ([a84664c](https://github.com/apologist-project/apg-sdk-php/commit/a84664ca0556b7648b72b3d9b74915feea9ad816))
* **internal:** codegen related update ([fee52ae](https://github.com/apologist-project/apg-sdk-php/commit/fee52aee57cad1df32f38a44d90cecc35b23390a))
* **internal:** codegen related update ([ccc48a6](https://github.com/apologist-project/apg-sdk-php/commit/ccc48a664ffb80e3caafb1805b6a68c6f8e0edc9))
* **internal:** codegen related update ([2f53512](https://github.com/apologist-project/apg-sdk-php/commit/2f535128c38d86754acd3f16a21afd6fc4a9a592))
* **internal:** codegen related update ([884f941](https://github.com/apologist-project/apg-sdk-php/commit/884f941f4bcacead0d0d41a63a8fc80ef49182f2))
* **internal:** ignore stainless-internal artifacts ([51c897e](https://github.com/apologist-project/apg-sdk-php/commit/51c897ef2c87adb3ee7d951aa271b5cbd42fc1bb))
* **internal:** minor test script reformatting ([f899062](https://github.com/apologist-project/apg-sdk-php/commit/f8990620ec7a49013787cc230cfc038e41b83aee))
* **internal:** php cs fixer should not be memory limited ([d00aae5](https://github.com/apologist-project/apg-sdk-php/commit/d00aae58a00c277ab157378175631c581e45d5c2))
* **internal:** refactor auth by moving concern from base client into client ([cf05c13](https://github.com/apologist-project/apg-sdk-php/commit/cf05c1301121ede21aaa608e44d8d65290f1cce6))
* **internal:** update `actions/checkout` version ([ecaacdd](https://github.com/apologist-project/apg-sdk-php/commit/ecaacdd0b5c1ed4c3ee8178e49ee972676a9195e))
* **internal:** update phpstan comments ([65e94e1](https://github.com/apologist-project/apg-sdk-php/commit/65e94e19c0211ae43a2c6c106ecd6881ef2ac081))
* **readme:** remove beta warning now that we're in ga ([327bc46](https://github.com/apologist-project/apg-sdk-php/commit/327bc462fd0a3a75f305c74dc2e31d9d1952fcd2))

## 0.1.0 (2025-12-18)

Full Changelog: [v0.0.1...v0.1.0](https://github.com/apologist-project/apg-sdk-php/compare/v0.0.1...v0.1.0)

### ⚠ BREAKING CHANGES

* use aliases for phpstan types

### Features

* add idempotency header support ([22c2ad1](https://github.com/apologist-project/apg-sdk-php/commit/22c2ad1fae019891d61b8b372376b528089d68d4))
* improved phpstan type annotations ([8523d11](https://github.com/apologist-project/apg-sdk-php/commit/8523d11f6ca44bf494fb006a535b215c20067545))
* use aliases for phpstan types ([baad8f2](https://github.com/apologist-project/apg-sdk-php/commit/baad8f2715efcc53f5dd602e75fadcfe9d322675))


### Bug Fixes

* a number of serialization errors ([b239716](https://github.com/apologist-project/apg-sdk-php/commit/b239716a67bb2d0f22260c5654ff789a76e33a73))
* correctly serialize dates ([8a0e4c3](https://github.com/apologist-project/apg-sdk-php/commit/8a0e4c3d9400ddaf3b73217086e107fda2953cfa))
* support arrays in query param construction ([7cc21b5](https://github.com/apologist-project/apg-sdk-php/commit/7cc21b58a090cc6218551c4bedcf49571f7c7f9d))


### Chores

* **internal:** codegen related update ([005346c](https://github.com/apologist-project/apg-sdk-php/commit/005346c6f7a8c5f2e828aa58964d9811bb8e832b))
* **internal:** codegen related update ([bbc665d](https://github.com/apologist-project/apg-sdk-php/commit/bbc665d2558e64f0190d8235987a8425a930e12b))
* **internal:** codegen related update ([c570a63](https://github.com/apologist-project/apg-sdk-php/commit/c570a63cd9c3efaf58d5d4710ec9d86fac8660f5))
* **internal:** codegen related update ([8259109](https://github.com/apologist-project/apg-sdk-php/commit/82591098255effa5c8358e4804a4b54b47b73a65))
* support jsonl streaming ([97f9748](https://github.com/apologist-project/apg-sdk-php/commit/97f97481307eaafc78371eade617ef1a8697d46d))
* sync repo ([5af2b65](https://github.com/apologist-project/apg-sdk-php/commit/5af2b65f84338351be341e38e1bb041081d9cad7))
* update SDK settings ([6725bf0](https://github.com/apologist-project/apg-sdk-php/commit/6725bf0fa49f9b313c9214577de8ff8f022e7fc8))
