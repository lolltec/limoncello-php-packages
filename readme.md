[![Project Management](https://img.shields.io/badge/project-management-blue.svg)](https://waffle.io/niftycorner/limoncello-php-packages)
[![License](https://img.shields.io/github/license/niftycorner/limoncello-php-packages.svg)](https://packagist.org/packages/niftycorner/limoncello-php-packages)

## Testing

```
composer test
```

The command above will run

- Code coverage tests for all components (`phpunit`) except `Contracts`.
- Code style checks for for all components (`phpcs`).
- Code checks for all components (`phpmd`).

Requirements

- 100% test coverage.
- zero issues from both `phpcs` and `phpmd`.

### Component Status

| Component          | Build Status  | Test Coverage  |
| -------------------|:-------------:| :-------------:|
| Application        | [![Build Status](https://travis-ci.org/niftycorner/limoncello-php-application.svg?branch=master)](https://travis-ci.org/niftycorner/limoncello-php-application) | [![Code Coverage](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-application/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-application/?branch=master) |
| Auth               | [![Build Status](https://travis-ci.org/niftycorner/limoncello-php-auth.svg?branch=master)](https://travis-ci.org/niftycorner/limoncello-php-auth) | [![Code Coverage](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-auth/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-auth/?branch=master) |
| Commands           | [![Build Status](https://travis-ci.org/niftycorner/limoncello-php-commands.svg?branch=master)](https://travis-ci.org/niftycorner/limoncello-php-commands) | [![Code Coverage](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-commands/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-commands/?branch=master) |
| Container          | [![Build Status](https://travis-ci.org/niftycorner/limoncello-php-container.svg?branch=master)](https://travis-ci.org/niftycorner/limoncello-php-container) | [![Code Coverage](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-container/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-container/?branch=master) |
| Core               | [![Build Status](https://travis-ci.org/niftycorner/limoncello-php-core.svg?branch=master)](https://travis-ci.org/niftycorner/limoncello-php-core) | [![Code Coverage](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-core/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-core/?branch=master) |
| Crypt              | [![Build Status](https://travis-ci.org/niftycorner/limoncello-php-crypt.svg?branch=master)](https://travis-ci.org/niftycorner/limoncello-php-crypt) | [![Code Coverage](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-crypt/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-crypt/?branch=master) |
| Data               | [![Build Status](https://travis-ci.org/niftycorner/limoncello-php-data.svg?branch=master)](https://travis-ci.org/niftycorner/limoncello-php-data) | [![Code Coverage](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-data/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-data/?branch=master) |
| Events             | [![Build Status](https://travis-ci.org/niftycorner/limoncello-php-events.svg?branch=master)](https://travis-ci.org/niftycorner/limoncello-php-events) | [![Code Coverage](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-events/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-events/?branch=master) |
| Flute              | [![Build Status](https://travis-ci.org/niftycorner/limoncello-php-flute.svg?branch=master)](https://travis-ci.org/niftycorner/limoncello-php-flute) | [![Code Coverage](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-flute/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-flute/?branch=master) |
| L10n               | [![Build Status](https://travis-ci.org/niftycorner/limoncello-php-l10n.svg?branch=master)](https://travis-ci.org/niftycorner/limoncello-php-l10n) | [![Code Coverage](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-l10n/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-l10n/?branch=master) |
| OAuthServer        | [![Build Status](https://travis-ci.org/niftycorner/limoncello-php-oauth-server.svg?branch=master)](https://travis-ci.org/niftycorner/limoncello-php-oauth-server) | [![Code Coverage](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-oauth-server/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-oauth-server/?branch=master) |
| Passport           | [![Build Status](https://travis-ci.org/niftycorner/limoncello-php-passport.svg?branch=master)](https://travis-ci.org/niftycorner/limoncello-php-passport) | [![Code Coverage](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-passport/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-passport/?branch=master) |
| Redis Tagged Cache | [![Build Status](https://travis-ci.org/niftycorner/limoncello-php-redis-tagged-cache.svg?branch=master)](https://travis-ci.org/niftycorner/limoncello-php-redis-tagged-cache) | [![Code Coverage](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-redis-tagged-cache/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-redis-tagged-cache/?branch=master) |
| Templates          | [![Build Status](https://travis-ci.org/niftycorner/limoncello-php-templates.svg?branch=master)](https://travis-ci.org/niftycorner/limoncello-php-templates) | [![Code Coverage](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-templates/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-templates/?branch=master) |
| Testing            | [![Build Status](https://travis-ci.org/niftycorner/limoncello-php-testing.svg?branch=master)](https://travis-ci.org/niftycorner/limoncello-php-testing) | [![Code Coverage](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-testing/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-testing/?branch=master) |
| Validation         | [![Build Status](https://travis-ci.org/niftycorner/limoncello-php-validation.svg?branch=master)](https://travis-ci.org/niftycorner/limoncello-php-validation) | [![Code Coverage](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-validation/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/niftycorner/limoncello-php-validation/?branch=master) |
