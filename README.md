# Laravel Perfect Money

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require adisaf/laravel-perfectmoney
```
##Configuration

Publish Configuration file
```
php artisan vendor:publish --provider="Adisaf\LaravelPerfectMoney\ServiceProvider" --tag="config"
```

Edit .env

Add these lines at .env file, follow config/perfectmoney.php for configuration descriptions.
``` php
PM_ACCOUNTID=100000
PM_PASSPHRASE=your_pm_password
PM_MARCHANTID=U123456
PM_MARCHANT_NAME="My Company"
PM_UNITS=USD
PM_ALT_PASSPHRASE=your_alt_passphrase
PM_PAYMENT_URL=http://example.com/success
PM_PAYMENT_URL_METHOD=null
PM_NOPAYMENT_URL=http://example.com/fail
PM_NOPAYMENT_URL_METHOD=null
PM_STATUS_URL=null
PM_SUGGESTED_MEMO=null
```

##Customizing views (Optional)

If you want to customize form, follow these steps.

### 1.Publish view
```
php artisan vendor:publish --provider="Adisaf\LaravelPerfectMoney\ServiceProvider" --tag="views"
```
### 2.Edit your view at /resources/views/vendor/perfectmoney/perfectmoney.php

## Usage

###Render Shopping Cart Form

``` php
PerfectMoney::render();
```

Sometimes you will need to customize the payment form. Just pass the parameters to render method .

``` php
PerfectMoney::render(['PAYMENT_UNITS' => 'EUR'], 'custom_view');
```

## API MODULES
### Get Balance
``` php
$pm = new PerfectMoney;
$balance = $pm->getBalance();

if($balance['status'] == 'success')
{
	return $balance['USD'];
}
```

### Send Money
``` php
// Required Fields
$amount = 10.00;
$sendTo = 'U1234567';

// Optional Fields
$description = 'Optional Description for send money';
$payment_id = 'Optional_payment_id';

$pm = new PerfectMoney;

// Send Funds with all fields
$sendMoney = $pm->getBalance($amount, $sendTo, $description, $payment_id);
if($sendMoney['status'] == 'success')
{
	// Some code here
}

// Send Funds with required fields
$sendMoney = $pm->getBalance($amount, $sendTo);
if($sendMoney['status'] == 'error')
{
	// Payment Failed
	return $sendMoney['message'];
}
```

## Security

If you discover any security related issues, please email adisa.fawaz@gmail.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

[ico-version]: https://img.shields.io/packagist/v/adisaf/laravel-perfectmoney.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/adisaf/laravel-perfectmoney.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/adisaf/laravel-perfectmoney
[link-downloads]: https://packagist.org/packages/adisaf/laravel-perfectmoney
[link-author]: https://github.com/Adisaf
[link-contributors]: ../../contributors
