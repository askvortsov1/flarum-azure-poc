# Flarum Azure Storage

![License](https://img.shields.io/badge/license-MIT-blue.svg) [![Latest Stable Version](https://img.shields.io/packagist/v/askvortsov/flarum-azure.svg)](https://packagist.org/packages/askvortsov/flarum-azure) [![Total Downloads](https://img.shields.io/packagist/dt/askvortsov/flarum-azure.svg)](https://packagist.org/packages/askvortsov/flarum-azure)

A [Flarum](http://flarum.org) extension. Azure Filesystem Extender for Flarum.

This is a proof of concept extension for https://github.com/flarum/core/pull/2732. It does not contain proper features needed for a driver like this, such as caching.
It should NOT be used in production!!!!

### Installation

Install with composer:

```sh
composer require askvortsov/flarum-azure:"*"
```

### Configuration

Set up a blob storage container via the azure portal.

Add the following to your `config.php`:

```
'azure-config' => 
  array (
    'DISK_NAME' =>
    array (
      'accountName' => '...',
      'accountKey' => '...',
      'containerName' => '...'
    )
  )
```

Flarum's default disk names are `flarum-assets` and `flarum-avatars`.

### Updating

```sh
composer update askvortsov/flarum-azure:"*"
php flarum migrate
php flarum cache:clear
```

### Links

- [Packagist](https://packagist.org/packages/askvortsov/flarum-azure)
- [GitHub](https://github.com/askvortsov/flarum-azure)
- [Discuss](https://discuss.flarum.org/d/PUT_DISCUSS_SLUG_HERE)
