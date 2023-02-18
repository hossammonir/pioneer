# Pioneer ERP Integration

This package is a wrapper for the Pioneer ERP API.

## Installation

You can install the package via composer:

```bash
composer require hossammonir/pioneer
```

## Publish repository configurations

```bash
php artisan vendor:publish --provider="HossamMonir\Pioneer\PioneerServiceProvider"
```

This will publish msegat.php configurations to config/pioneer.php


## Usage

### Get Superior Information

``` php
use Hossammonir\Pioneer\Pioneer;

Pioneer::setNationalityNumber('xxxxxxxxxx')
->superior();
```

### Get Superior Students

``` php
use Hossammonir\Pioneer\Pioneer;

Pioneer::setNationalityNumber('xxxxxxxxxx')
->students();
```


### Get Superior Students Statements for each Student 

``` php
use Hossammonir\Pioneer\Pioneer;

Pioneer::setNationalityNumber('xxxxxxxxxx')
->studentsStatement();
```
#### Optional Parameters
setEducationalYear($id) : set the educational year to get the statement for it


### Get Superior Summarized Statement 

``` php
use Hossammonir\Pioneer\Pioneer;

Pioneer::setNationalityNumber('xxxxxxxxxx')
->summarizedStatement();
```


### Get Superior Payments 

``` php
use Hossammonir\Pioneer\Pioneer;

Pioneer::setNationalityNumber('xxxxxxxxxx')
->payments();
```
#### Optional Parameters
setReceiptType($id) : set the receipt type to get the payments for it ( 0  for refunds Receipts , 1 for payments Receipts)




### Get Nationalities List

``` php
use Hossammonir\Pioneer\Pioneer;

Pioneer::nationalities();
```

### Get Educational Years List

``` php
use Hossammonir\Pioneer\Pioneer;

Pioneer::educationalYears();
```

### Get branches List

``` php
use Hossammonir\Pioneer\Pioneer;

Pioneer::branches();
```

