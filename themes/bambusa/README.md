# SilverStripe Bambusa theme

![Screenshot](docs/images/screenshot.png)

A theme based on Bootstrap 4, using a modified [Watea theme](https://github.com/silverstripe/cwp-watea-theme) as a starting point. It supports a few content blocks, and comes with a language switcher and search box. 

In order to see this theme in action, check the [silverstripe/bambusa-installer](https://github.com/silverstripe/bambusa-installer) project, or create a demo on [silverstripe.com/demo](https://silverstripe.com/demo).

## Installation

Install this theme module with Composer:

```
composer require silverstripeltd/bambusa-theme
```

### Development requirements

* [Node and NPM](https://docs.npmjs.com/getting-started/installing-node)
* [Laravel-Mix](https://github.com/JeffreyWay/laravel-mix) and [Webpack](https://webpack.github.io) (via NPM)

## Versioning

This library follows [Semver](http://semver.org). According to Semver, you will be able to upgrade to any minor or patch version of this library without any breaking changes to the public API. Semver also requires that we clearly define the public API for this library.

All methods, with `public` visibility, are part of the public API. All other methods are not part of the public API. Where possible, we'll try to keep `protected` methods backwards-compatible in minor/patch versions, but if you're overriding methods then please test your work before upgrading.
