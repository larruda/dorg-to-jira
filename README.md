# dorg-to-jira
> A simple tool/script to import issues from Drupal.org into a JIRA instance.

[![Build Status][travis-image]][travis-url]

## Features

* Imports title by default in the format '#1234567 This is the issue title'
* Supports JIRA custom fields and a few available tokens for value replacement
* Adds the project's name (module/theme) as a Label to the issue in JIRA
* Adds an external link to the issue in JIRA referring to the issue at Drupal.org.

## Installation

Download the PHAR somewhere in your filesystem and make it executable.
If you want it globally available move it to a directory listed in your system's *$PATH* environment variable.
You can optionally rename the file and remove the .phar extension, so it's more like a "real bin".

Below is an example using *OSX* or *Linux*:

```sh
curl -O https://github.com/larruda/dorg-to-jira/releases/download/1.0.0/dorg-to-jira.phar
chmod +x dorg-to-jira.phar
mv dorg-to-jira.phar /usr/local/bin/dorg-to-jira
```

## Usage 

Simply run **dorg-to-jira** passing along the ID (nid) of the issue at *Drupal.org*.
You can optionally set the path of the configuration file with the `-c` argument. By default it looks for a `config.yml` in the current directory.

```sh
./dorg-to-jira.phar 1234567 [-c|--config path/to/config.yml]
```

It will prompt you for your JIRA password on every usage. 
For security purposes we don't hold passwords or accept as argument/configuration.

## Configuration

This tools needs a set of configuration values in order to work. 
Mandatory ones are *jira*, *user* and *key* which are the URL to the JIRA instance, the username and project key respectively.
Custom fields are optional.

```yaml
jira: https://jira.company.com/
user: user@company.com
key: PROJ
fields:
  customfield_12510:
    value: DEV
  customfield_12711:
    value: %ISSUE_TYPE%
```

### Available Tokens

You can use the following tokens as values for custom fields in the configuration file. 
They will be replaced by the value according to the issue being imported.

| Token name | description |
| ---------- | ----------- |
|%ISSUE_URL% | The absolute URL to the issue at Drupal.org. |
|%ISSUE_NID% | The Node ID of the issue. |
|%ISSUE_TYPE% | The issue type (e.g: bug, feature request, etc |
|%ISSUE_BODY% | The issue body text (can contain HTML) |
        

## Building from source

I'm assuming you have *Composer *installed and globally available on your OS.
If that's not the case, follow the instructions at [https://getcomposer.org](https://getcomposer.org).
With *Composer* properly installed and functional, clone this repository, cd into it and download all dependencies.

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
If you want it globally available in your system follow the [Installation](#installation) instructions.

## Release History

* 1.0.0
    * [Initial commit](http://github.com/larruda/dorg-to-jira/commit/9437dbe6c765ceeb08f7b2092994d1c4740b0695)
    * [Initial commit.](http://github.com/larruda/dorg-to-jira/commit/6b28364964ef440526860dd6dcfd60bf09267ab7)
    * [Added compiled binary.](http://github.com/larruda/dorg-to-jira/commit/72b369ff4445ab1cb094a0917456682a15df67a8)
    * [Changed into a single command only application.](http://github.com/larruda/dorg-to-jira/commit/94780f574e47f51ee4592e6dbaa853531925082e)
    * [Replaced contents of the file to an example for reference.](http://github.com/larruda/dorg-to-jira/commit/02e2e3ad99eb797478688248a49458d1ce4bd00a)
    * [Extend Console’s Application class in order to provide a default command.](http://github.com/larruda/dorg-to-jira/commit/79221c5ea10bb4a2aabd4cf9b938dd9fa69a4dbe)
    * [Added support for placeholders. Added argument validation. Added support for remote links.](http://github.com/larruda/dorg-to-jira/commit/e95761d4b82f22a3654bb6c89b3adfade809160d)
    * [Pointed “drupal-org-api” to my own fork.](http://github.com/larruda/dorg-to-jira/commit/e74040a1b0cae6c7c90e0de8a123e9dd8bb6077d)
    * [Publishing new PHAR package.](http://github.com/larruda/dorg-to-jira/commit/3f20f9765d4bc0e63934559f58b689752d923b25)
    * [Changed to new array notation.](http://github.com/larruda/dorg-to-jira/commit/125af6c23602bc349178a1fb3cc67920ab423598)
    * [Changes dependencies to stable versions.](http://github.com/larruda/dorg-to-jira/commit/7638aa5513e88b8a8861c9755440f820ae91ea3e)
    * [Changed composer minimum stability from stable to prefer-stable.](http://github.com/larruda/dorg-to-jira/commit/ddc41c4fbf16c193d32ef56a552d9e3183743a43)
    * [Changed composer minimum stability from stable to prefer-stable.](http://github.com/larruda/dorg-to-jira/commit/4a597138eb82e39c2e2582e9efbe0da5a2837a83)
    * [Removed composer.lock.](http://github.com/larruda/dorg-to-jira/commit/500d7ee2f22ab909926cec3f3d8cf714ee19479e)
    * [Trying a weird approach…](http://github.com/larruda/dorg-to-jira/commit/af34758be41f340c32b02fdc56616212e250103c)
    * [Adding composer.lock back again.](http://github.com/larruda/dorg-to-jira/commit/4dc8efc6e00a7a4e5db35d0b3074ee1f373e9afd)
    * [Adding initial Travis build descriptor file.](http://github.com/larruda/dorg-to-jira/commit/a2065519b14926916ab93ee6fcc0d58a2e307562)
    * [Adding initial Travis build descriptor file.](http://github.com/larruda/dorg-to-jira/commit/5ca37cb0082630ca75b2ee1a9158ad8e77ad9de0)
    * [Trying to make this PHAR work…](http://github.com/larruda/dorg-to-jira/commit/fae31cfbd94a242ca213950125972897aec15a3a)
    * [Added fork as a package dependency and generated PHAR package.](http://github.com/larruda/dorg-to-jira/commit/1d76dd3eca03789a579ec5d5ed508d02b51a10cb)
    * [Updated README instructions.](http://github.com/larruda/dorg-to-jira/commit/e4a1e62ecc599b0b056c4b2847a505cff66a57fb)
    * [Removed PHAR archive from version control.](http://github.com/larruda/dorg-to-jira/commit/0c5fd911f9c8d138fb45d18dc5812f3dd59e1242)
    * [Updated Travis build script.](http://github.com/larruda/dorg-to-jira/commit/c00f200f301cc1e83a78751d3575e3c66539d863)
    * [Updated README instructions.](http://github.com/larruda/dorg-to-jira/commit/7d00a501be6a674723e188b9a3f03012fd6dee80)
    * [Testing markdown formatting.](http://github.com/larruda/dorg-to-jira/commit/5394884fd7f3f6df6db2389c761cb334fc64a7e5)

## License

Distributed under the MIT license. See ``LICENSE`` for more information.

[travis-image]: https://img.shields.io/travis/larruda/dorg-to-jira/master.svg?style=flat-square
[travis-url]: https://travis-ci.org/larruda/dorg-to-jira