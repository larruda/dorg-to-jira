# dorg-to-jira
> A simple tool/script to import issues from Drupal.org into a JIRA instance.

[![NPM Version][npm-image]][npm-url]
[![Build Status][travis-image]][travis-url]
[![Downloads Stats][npm-downloads]][npm-url]

## Installation

Download the PHAR somewhere in your filesystem. 
If you want it globally available move it to a directory listed in your system's *$PATH* environment variable.
You can optionally rename the file and remove the .phar extension, so it's more like a "real bin".

Below is an example using *OSX* or *Linux*:

```sh
curl -O https://github.com/larruda/dorg-to-jira/releases/download/0.0.1/dorg-to-jira.phar
mv dorg-to-jira.phar /usr/local/bin/dorg-to-jira
```

## Usage 

A few motivating and useful examples of how your product can be used. Spice this up with code blocks and potentially more screenshots.

## Build from source

I'm assuming you have Composer installed and globally available on your OS.
If that's not the case, follow the instructions at [https://getcomposer.org](https://getcomposer.org).
With Composer properly installed and functional, clone this repository, cd into it and download all dependencies.

```sh
git clone git@github.com:larruda/dorg-to-jira.git
cd dorg-to-jira/
composer install
```

After that and considering no errors have been thrown, go ahead and build the PHAR archive.
If you are curious about what this executes underneath or need to debug step-by-step, read the project's [composer.json](composer.json).

```sh
composer run-script build-phar
```

You should have a **dorg-to-jira.phar** inside a *bin/* directory in the project root. 
If you want it globally available in your system follow the [Installation](Installation) instructions.

## Release History

* 0.2.1
    * CHANGE: Update docs (module code remains unchanged)
* 0.2.0
    * CHANGE: Remove `setDefaultXYZ()`
    * ADD: Add `init()`
* 0.1.1
    * FIX: Crash when calling `baz()` (Thanks @GenerousContributorName!)
* 0.1.0
    * The first proper release
    * CHANGE: Rename `foo()` to `bar()`
* 0.0.1
    * Work in progress

## Meta

Your Name – [@YourTwitter](https://twitter.com/dbader_org) – YourEmail@example.com

Distributed under the XYZ license. See ``LICENSE`` for more information.

[https://github.com/yourname/github-link](https://github.com/dbader/)

[npm-image]: https://img.shields.io/npm/v/datadog-metrics.svg?style=flat-square
[npm-url]: https://npmjs.org/package/datadog-metrics
[npm-downloads]: https://img.shields.io/npm/dm/datadog-metrics.svg?style=flat-square
[travis-image]: https://img.shields.io/travis/dbader/node-datadog-metrics/master.svg?style=flat-square
[travis-url]: https://travis-ci.org/dbader/node-datadog-metrics