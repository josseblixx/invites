# BLIXX 🤘 Invites

## Don't use this package
As you can see this package is unfinished work, so don't use this in production




## Installation

To install this package run the following commands on your code base: 

### Install package
Install the composer package on your code base
```sh 
composer require blixx/invites
```

### Add Service Provider
Open config/app.php from your code base and add the following service provider:
```php
[
    // ..
    \Blixx\Invite\BlixxInviteProvider::class,
] 
```

### Run the migrations

To install the table scaffolding run the following command:

``` 
php artisan migrate 
```

### Up and running! 

You are now up and running! To invite Sponge Bob to your party run the following command:
``` 
php artisan blixx:invite sponge@bob.com "Sponge Bob"
```




## Updates

### Warning!!!

This package is not actively maintained, please don't use it in production! Also: we're currently not taking pull requests, so don't bother. Tnx ;)

