DunglasTodoMVCBundle
====================

This a [Symfony](http://symfony.com) implementation of [TodoMVC](http://todomvc.com/).

> TodoMVC is a project which offers the same Todo application implemented using MV* concepts in most of the popular JavaScript MV\* frameworks of today.

Server-side, it uses [FOSRestBundle](https://github.com/FriendsOfSymfony/FOSRestBundle) as REST API generator, [JMSSerializerBundle](http://jmsyst.com/bundles/JMSSerializerBundle) as JSON serializer and [DunglasAngularCsrfBundle](http://dunglas.fr/2014/01/dunglasangularcsrfbundle-protect-your-symfony-angularjs-apps-of-csrf-attacks/) to protect the app against CSRF attacks.
Client-side, [Backbone.js](http://backbonejs.org/) and [Chaplin.js](http://chaplinjs.org/) are used and the code is wrote in [CoffeeScript](http://coffeescript.org/).

[![Build Status](https://travis-ci.org/dunglas/DunglasTodoMVCBundle.png)](https://travis-ci.org/dunglas/DunglasTodoMVCBundle)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/5e9a994d-bcdd-40cf-8e90-68c77f121b18/mini.png)](https://insight.sensiolabs.com/projects/5e9a994d-bcdd-40cf-8e90-68c77f121b18)

Demo
----

Try it online: http://symfony-todomvc.dunglas.fr/

Screenshot
----------

![screenshot](http://dunglas.fr/wp-content/uploads/2013/02/screenshot-symfony-todomvc.png)

Yes, this is TodoMVC.

Install
-------

First, [install Symfony using Composer](http://symfony.com/doc/current/book/installation.html).
Go to your application directory and use composer to install the bundle and its dependencies:

    composer require dunglas/todomvc-bundle

Next, enable these bundles in `AppKernel.php`:

```php
// app/AppKernel.php
public function registerBundles()
{
    return array(
        // ...
        new JMS\SerializerBundle\JMSSerializerBundle(),
        new FOS\RestBundle\FOSRestBundle(),
        new Dunglas\AngularCsrfBundle\DunglasAngularCsrfBundle(),
        new Dunglas\TodoMVCBundle\DunglasTodoMVCBundle(),
        // ...
    );
}
```

And the routes to `app/config/routing.yml`:

```yaml
dunglas_todomvc:
    resource: "@DunglasTodoMVCBundle/Resources/config/routing.yml"
    prefix:   /
```

Install assets:

    php app/console assets:install web

Dump assets if you want to use the app in prod mode:

    php app/console assetic:dump --env=prod --no-debug

Create database schema:

    php app/console doctrine:schema:create

Done! Open *http://localhost/app_dev.php/* (don't forget the trailing slash) in your browser and try this Symfony implementation of TodoMVC.

Compile the client side-code
----------------------------

If you want to rebuild the client-side CoffeScript code go to the `Resources/` directory and run:

    coffee --bare --output public/js/ coffee/

Add the `--watch` option to recompile at each change.
Of course you need the CoffeeScript compiler.

Security
--------

TodoMVC is unsecure by design. Everyone can do everything.
If you create a real world Symfony + Backbone.js app be sure to add an authentification system.

Go further
----------

In french: [Utiliser Chaplin.js et Backbone.js avec Symfony 2 : installation et configuration](http://dunglas.fr/2012/12/utiliser-chaplin-js-et-backbone-js-avec-symfony-2-installation-et-configuration/)

Credits
-------

This bundle has been created by [Kévin Dunglas](http://dunglas.fr).
The CoffeeScript code is largely inspired of an old implementation of [Brunch + Chaplin TodoMVC implementation](https://github.com/addyosmani/todomvc/tree/gh-pages/labs/dependency-examples/chaplin-brunch) by [Paul Millr](http://paulmillr.com/).

![TodoMVC](https://raw.github.com/addyosmani/todomvc/gh-pages/media/logo.png)