# Mollie Payment Bundle For Symfony 3.4 and above

This bundle provides an easy implementation of Mollie Payment Service Provider.

## Getting Started

This installation requires the package with Composer

**The bundle is still under heavy development. Do not use this bundle until a stable version is ready**

```
php composer require developerlab/mollie-payment-bundle
```

### Register the bundle

After you have installed the package, you just need to add the bundle to your _AppKernel.php_ file:

```
// app/AppKernel.php
$bundles = array(
    // ...
    new Developerlab\MolliePaymentBundle\MolliePaymentBundle(),
    // ...
);
```

### Configuration

MolliePaymentBundle requires initial configurations to get you started

These parameter names are required

```
// app/config/config.yml
mollie_payment:
    testmode: false
    api_key: 
    api_key_test: 
```

These parameters are not required unless you want to change them

```
// app/config/config.yml
mollie_payment:
    redirect_url: //default /mollie/redirect_url
    webhooks: //default /mollie/webhooks
```



## Running the test

This bundle comes with a command named ```mollie:testrun```

_run this command to test your installation_

```
php bin/console mollie:testrun
```

## Commands

Export all existing customers from Mollie into ```mollie_customer``` table
```
php bin/console mollie:customers
```

## Built With

* [Symfony](https://symfony.com/) - The web framework used
* [PHPStorm](https://www.jetbrains.com/phpstorm/) - PHP IDE

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Authors

* **Puya Sarmidani** - *Initial work* - [Developerlab](https://www.developerlab.nl)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

