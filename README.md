wd_s
====

WebDevStudios new project boilerplate.

### Includes the following Submodules

* WDS Underscores ([webdevstudios](https://github.com/WebDevStudios/_s))
* CMB2
* CPT Core
* Taxonomy Core
* WDS Required Plugins
* Debug Bar
* Jetpack
* Regenerate Thumbnails
* Theme Check
* WDS TLC Transients

### Installation

#### Use Yeoman

`npm install -g yo generator-wd-s` - Install [Yeoman](http://yeoman.io/) and the wd_s generator

`yo wd-s` - In the wp-content folder of a new project, follow the prompts and a new magically created wd_s install with your project name in it's place!


#### Clone

**You'll need to clone recursive this repo, not download the zip!** (It includes submodules and they won't be included in the zip)

* Via command line / Terminal:

  `git clone --recursive git@github.com:WebDevStudios/wd_s.git`

* Via SourceTree/Tower:

  Clone normally, but select "Recurse submodules"

### Getting Started

* Run `npm install` to install Grunt and it's dependencies
* Run `bower install` to install all framework dependencies

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

Compiling with Grunt (via Command Line)
----

`grunt javascript` - Concatenate and minify javascript files.

`grunt styles` - Comb, compile, prefix, combine media queries, and minify scss files.

`grunt watch` - Automatically handle changes to javascript and css files.

`grunt imageminnewer` - Minify images.

`grunt` - Do it all once!
