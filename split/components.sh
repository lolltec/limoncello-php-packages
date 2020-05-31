#!/usr/bin/env bash

BRANCHES='master develop'

COMPONENTS=(
    'components/AzureAd/:git@github.com:lolltec/limoncello-php-package-azure-ad.git'
    'components/Contracts/:git@github.com:lolltec/limoncello-php-package-contracts.git'
    'components/Data/:git@github.com:lolltec/limoncello-php-package-data.git'
    'components/Flute/:git@github.com:lolltec/limoncello-php-package-flute.git'
    'components/Spreadsheet/:git@github.com:lolltec/limoncello-php-package-spreadsheet.git'
    'components/Templates/:git@github.com:lolltec/limoncello-php-package-templates.git'
)
