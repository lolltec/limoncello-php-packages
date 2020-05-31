[![Project Management](https://img.shields.io/badge/project-management-blue.svg)](https://waffle.io/lolltec/limoncello-php-packages)
[![License](https://img.shields.io/github/license/lolltec/limoncello-php-packages.svg)](https://packagist.org/packages/lolltec/limoncello-php-packages)

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

| Component                     | Build Status  | Test Coverage  |
| ------------------------------|:-------------:| :-------------:|
| Azure Active Directory        | [![Build Status](https://travis-ci.org/lolltec/limoncello-php-azure-ad.svg?branch=master)](https://travis-ci.org/lolltec/limoncello-php-azure-ad) | [![Code Coverage](https://scrutinizer-ci.com/g/lolltec/limoncello-php-azure-ad/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/lolltec/limoncello-php-azure-ad/?branch=master) |
| Data                          | [![Build Status](https://travis-ci.org/lolltec/limoncello-php-package-data.svg?branch=master)](https://travis-ci.org/lolltec/limoncello-php-package-data) | [![Code Coverage](https://scrutinizer-ci.com/g/lolltec/limoncello-php-package-data/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/lolltec/limoncello-php-package-data/?branch=master) |
| Flute                         | [![Build Status](https://travis-ci.org/lolltec/limoncello-php-flute.svg?branch=master)](https://travis-ci.org/lolltec/limoncello-php-flute) | [![Code Coverage](https://scrutinizer-ci.com/g/lolltec/limoncello-php-flute/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/lolltec/limoncello-php-flute/?branch=master) |
| Spreadsheet                   | [![Build Status](https://travis-ci.org/lolltec/limoncello-php-spreadsheet.svg?branch=master)](https://travis-ci.org/lolltec/limoncello-php-spreadsheet) | [![Code Coverage](https://scrutinizer-ci.com/g/lolltec/limoncello-php-spreadsheet/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/lolltec/limoncello-php-spreadsheet/?branch=master) |
| Templates                     | [![Build Status](https://travis-ci.org/lolltec/limoncello-php-templates.svg?branch=master)](https://travis-ci.org/lolltec/limoncello-php-templates) | [![Code Coverage](https://scrutinizer-ci.com/g/lolltec/limoncello-php-templates/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/lolltec/limoncello-php-templates/?branch=master) |
