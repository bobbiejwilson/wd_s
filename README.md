wd_s
====

A project boilerplate for WebDevStudios.

### Includes the following Submodules

* [WDS Underscores](https://github.com/WebDevStudios/_s)
* [Bourbon](https://github.com/thoughtbot/bourbon)
* [Neat](https://github.com/thoughtbot/neat)
* [CMB2](https://github.com/WebDevStudios/CMB2)
* [CPT Core](https://github.com/WebDevStudios/CPT_Core)
* [Taxonomy Core](https://github.com/WebDevStudios/Taxonomy_Core)
* [WDS TLC Transients](https://github.com/WebDevStudios/WDS-TLC-Transients)
* [WDS Required Plugins](https://github.com/WebDevStudios/WDS-Required-Plugins)
* [WDS Plugin Boilerplate](https://github.com/WebDevStudios/WDS-Plugin-Boilerplate)
* [WDS Widget Boilerplate](https://github.com/WebDevStudios/WDS-Widget-Boilerplate)
* [Debug Bar](https://github.com/brandwaffle/wp-debug-bar.git)
* [Jetpack](https://github.com/Automattic/jetpack)
* [Regenerate Thumbnails](https://github.com/Viper007Bond/regenerate-thumbnails)

# Installation

### Prerequisites
You will need the following programs to use wd_s:

- Node ([http://nodejs.org/](http://nodejs.org/))
- Grunt CLI ([http://gruntjs.com/](http://gruntjs.com/)) - `npm install -g grunt-cli`
- Bower ([http://bower.io/](http://bower.io/)) - `npm install -g bower`

## Automatic Installation

The easiest way to get started is by using [Yeoman](http://yeoman.io/). It will ask you a series of questions and then pull everything down for you.

##### 1) Run Yeoman

- `npm install -g yo generator-wd-s` - Will install Yeoman and the wd_s generator

-  In the wp-content folder of a new project, type `yo wd-s` and follow the prompts.

##### 2) Install Grunt and Dependencies
* Run `npm install && bower install ` from the command line to install Grunt and dependencies.

## Manual Installation

Setting up by hand is a bit harder, but if you're comfortable with Git and doing a find & replace, you can get up and running a minutes.

##### 1) Clone

**You'll need to clone recursive this repo, not download the zip!** (It includes submodules and they won't be included in the zip)

* Via command line / Terminal:

  `git clone --recursive git@github.com:WebDevStudios/wd_s.git`

* Via SourceTree/Tower:

  Clone normally, but select "Recurse submodules"

##### 2) Find & Replace

You'll need to change all instances of the names: `_s`.

* Search for: `'_s'` and replace with: `'project-name'`
  * (inside single quotations) to capture the text domain
* Search for: `_s_` and replace with: `project-name_`
  * to capture all the function names
* Search for: `Text Domain: _s` and replace with: `Text Domain: project-name` in style.css.
* Search for (and include the leading space): <code>&nbsp;_s</code> and replace with: <code>&nbsp;Project Name</code>
   * (with a space before it) to capture DocBlocks.
* Search for: `_s-` and replace with: `project-name-`
  * to capture prefixed handles

##### 3) Install Grunt and Dependencies
* Run `npm install && bower install ` from the command line to install Grunt and pull down any dependencies via Bower.

## Using Grunt

Grunt is included and there are a few default tasks available:

`grunt watch` - Automatically handle changes to CSS, javascript, and image sprites.

`grunt javascript` - Concatenate and minify javascript files.

`grunt styles` - Comb, compile, prefix, combine media queries, and minify CSS files.

`grunt imageminnewer` - Minify images.

`grunt` - Do it all once!