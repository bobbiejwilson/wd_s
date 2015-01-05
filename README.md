wd_s
====

A project boilerplate for WebDevStudios.

### Includes the following Submodules

* [WDS Underscores](https://github.com/WebDevStudios/_s)
* [CMB2](https://github.com/WebDevStudios/CMB2)
* [CPT Core](https://github.com/WebDevStudios/CPT_Core)
* [Taxonomy Core](https://github.com/WebDevStudios/Taxonomy_Core)
* [WDS Required Plugins](https://github.com/WebDevStudios/WDS-Required-Plugins)
* [Debug Bar](https://github.com/brandwaffle/wp-debug-bar.git)
* [Jetpack](https://github.com/Automattic/jetpack)
* [Regenerate Thumbnails](https://github.com/Viper007Bond/regenerate-thumbnails)
* [WDS TLC Transients](https://github.com/WebDevStudios/WDS-TLC-Transients)
* [Bourbon](https://github.com/thoughtbot/bourbon)
* [Neat](https://github.com/thoughtbot/neat)

### Automagic Installation

The easiest way to get started is by using Yeoman. Otherwise, you can manually clone this repo and set this up by hand.

#### Use Yeoman

`npm install -g yo generator-wd-s` - Install [Yeoman](http://yeoman.io/) and use the wd_s generator

`yo wd-s` - In the wp-content folder of a new project, follow the prompts and a new magically created wd_s install with your project name in it's place!

#### Install Grunt and Dependencies
* Run `npm install && bower install ` from the command line to install Grunt and dependencies.

## Manual Installation

#### Clone

**You'll need to clone recursive this repo, not download the zip!** (It includes submodules and they won't be included in the zip)

* Via command line / Terminal:

  `git clone --recursive git@github.com:WebDevStudios/wd_s.git`

* Via SourceTree/Tower:

  Clone normally, but select "Recurse submodules"

#### Find & Replace

You'll need to change all instances of the names: `_s`.

* Search for: `'_s'` and replace with: `'project-name'`
  * (inside single quotations) to capture the text domain
* Search for: `_s_` and replace with: `project-name_`
  * to capture all the function names
* Search for: `Text Domain: _s` and replace with: `Text Domain: project-name` in style.css.
* Search for: <code>&nbsp;_s</code> and replace with: <code>&nbsp;Project Name</code>
   * (with a space before it) to capture DocBlocks.
* Search for: `_s-` and replace with: `project-name-`
  * to capture prefixed handles

#### Install Grunt and Dependencies
* Run `npm install && bower install ` from the command line to install Grunt and dependencies.

## Grunt Tasks

`grunt javascript` - Concatenate and minify javascript files.

`grunt styles` - Comb, compile, prefix, combine media queries, and minify scss files.

`grunt watch` - Automatically handle changes to javascript and css files.

`grunt imageminnewer` - Minify images.

`grunt` - Do it all once!
