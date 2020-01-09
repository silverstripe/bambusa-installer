# CWP Starter Theme

[![Build Status](https://travis-ci.org/silverstripe/cwp-starter-theme.svg?branch=master)](https://travis-ci.org/silverstripe/cwp-starter-theme)
[![Packagist](https://img.shields.io/packagist/v/cwp/starter-theme.svg)](https://packagist.org/packages/cwp/starter-theme)
[![SilverStripe supported module](https://img.shields.io/badge/silverstripe-supported-0071C4.svg)](https://www.silverstripe.org/software/addons/silverstripe-commercially-supported-module-list/)

This is the repository for the CWP "starter" theme. This theme is a highly accessible Bootstrap 4 theme which you can use as a starter for your CWP project.

The [Wātea theme](https://github.com/silverstripe/cwp-watea-theme) can be installed on top of the [Starter theme](https://github.com/silverstripe/cwp-starter-theme) (see [cascading themes](https://docs.silverstripe.org/en/4/developer_guides/templates/themes)) to provide a more visually appealing start to a CWP website.

![Screenshot](docs/images/screenshot.png)

## Installation

You can install this theme with Composer:

```
composer require cwp/starter-theme
```

## Documentation

You can find documentation on how to use this theme in the CWP Developer Documentation: [Customising the starter theme](https://www.cwp.govt.nz/developer-docs/en/2/working_with_projects/customising_the_starter_theme/).

## Requirements

* [Composer](https://getcomposer.org)
* `cwp/cwp`: \^2.0

### Development requirements

* [Node and NPM](https://docs.npmjs.com/getting-started/installing-node)
* [Laravel-Mix](https://github.com/JeffreyWay/laravel-mix) and [Webpack](https://webpack.github.io) (via NPM)

## Versioning

This library follows [Semver](http://semver.org). According to Semver, you will be able to upgrade to any minor or patch version of this library without any breaking changes to the public API. Semver also requires that we clearly define the public API for this library.

All methods, with `public` visibility, are part of the public API. All other methods are not part of the public API. Where possible, we'll try to keep `protected` methods backwards-compatible in minor/patch versions, but if you're overriding methods then please test your work before upgrading.
