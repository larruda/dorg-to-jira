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
If you want it globally available in your system follow the [Installation](#installation) instructions.

## Release History

* 0.2.1
    * CHANGE: Update docs (module code remains unchanged)
* 0.0.1
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/9437dbe6c765ceeb08f7b2092994d1c4740b0695">view &bull;</a> Initial commit</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/6b28364964ef440526860dd6dcfd60bf09267ab7">view &bull;</a> Initial commit.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/72b369ff4445ab1cb094a0917456682a15df67a8">view &bull;</a> Added compiled binary.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/94780f574e47f51ee4592e6dbaa853531925082e">view &bull;</a> Changed into a single command only application.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/02e2e3ad99eb797478688248a49458d1ce4bd00a">view &bull;</a> Replaced contents of the file to an example for reference.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/79221c5ea10bb4a2aabd4cf9b938dd9fa69a4dbe">view &bull;</a> Extend Console’s Application class in order to provide a default command.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/e95761d4b82f22a3654bb6c89b3adfade809160d">view &bull;</a> Added support for placeholders. Added argument validation. Added support for remote links.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/e74040a1b0cae6c7c90e0de8a123e9dd8bb6077d">view &bull;</a> Pointed “drupal-org-api” to my own fork.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/3f20f9765d4bc0e63934559f58b689752d923b25">view &bull;</a> Publishing new PHAR package.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/125af6c23602bc349178a1fb3cc67920ab423598">view &bull;</a> Changed to new array notation.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/7638aa5513e88b8a8861c9755440f820ae91ea3e">view &bull;</a> Changes dependencies to stable versions.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/ddc41c4fbf16c193d32ef56a552d9e3183743a43">view &bull;</a> Changed composer minimum stability from stable to prefer-stable.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/4a597138eb82e39c2e2582e9efbe0da5a2837a83">view &bull;</a> Changed composer minimum stability from stable to prefer-stable.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/500d7ee2f22ab909926cec3f3d8cf714ee19479e">view &bull;</a> Removed composer.lock.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/af34758be41f340c32b02fdc56616212e250103c">view &bull;</a> Trying a weird approach…</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/4dc8efc6e00a7a4e5db35d0b3074ee1f373e9afd">view &bull;</a> Adding composer.lock back again.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/a2065519b14926916ab93ee6fcc0d58a2e307562">view &bull;</a> Adding initial Travis build descriptor file.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/5ca37cb0082630ca75b2ee1a9158ad8e77ad9de0">view &bull;</a> Adding initial Travis build descriptor file.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/fae31cfbd94a242ca213950125972897aec15a3a">view &bull;</a> Trying to make this PHAR work…</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/1d76dd3eca03789a579ec5d5ed508d02b51a10cb">view &bull;</a> Added fork as a package dependency and generated PHAR package.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/e4a1e62ecc599b0b056c4b2847a505cff66a57fb">view &bull;</a> Updated README instructions.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/0c5fd911f9c8d138fb45d18dc5812f3dd59e1242">view &bull;</a> Removed PHAR archive from version control.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/c00f200f301cc1e83a78751d3575e3c66539d863">view &bull;</a> Updated Travis build script.</li>
    * <li> <a href="http://github.com/larruda/dorg-to-jira/commit/7d00a501be6a674723e188b9a3f03012fd6dee80">view &bull;</a> Updated README instructions.</li>

## Meta

Your Name – [@YourTwitter](https://twitter.com/dbader_org) – YourEmail@example.com

Distributed under the XYZ license. See ``LICENSE`` for more information.

[https://github.com/yourname/github-link](https://github.com/dbader/)

[npm-image]: https://img.shields.io/npm/v/datadog-metrics.svg?style=flat-square
[npm-url]: https://npmjs.org/package/datadog-metrics
[npm-downloads]: https://img.shields.io/npm/dm/datadog-metrics.svg?style=flat-square
[travis-image]: https://img.shields.io/travis/dbader/node-datadog-metrics/master.svg?style=flat-square
[travis-url]: https://travis-ci.org/dbader/node-datadog-metrics