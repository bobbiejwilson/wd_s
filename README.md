wd_s
====

A new project boilerplate for [WebDevStudios](http://webdevstudios.com). This is intented to replace the entire `/wp-content` directory of a fresh WordPress install.

# Includes

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
* [Transient Manager](https://github.com/pippinsplugins/Transients-Manager.git)
* [Jetpack](https://github.com/Automattic/jetpack)
* [Regenerate Thumbnails](https://github.com/Viper007Bond/regenerate-thumbnails)
* [Theme Check](https://github.com/Otto42/theme-check.git)

# Pre-Installation

Basic knowledge of the command line and the following dependencies are required to use wd_s:

- Node ([http://nodejs.org/](http://nodejs.org/))
- Ruby ([http://rubyinstaller.org/](http://rubyinstaller.org/))
- Grunt CLI ([http://gruntjs.com/](http://gruntjs.com/)) - `npm install -g grunt-cli`
- Bower ([http://bower.io/](http://bower.io/)) - `npm install -g bower`
- Sass ([http://sass-lang.com/](http://sass-lang.com/install)) - `gem install sass`
- A fresh install of [https://wordpress.org/](https://wordpress.org/) and an empty /wp-content directory!

#Installation

## Automatic Installation

The easiest way to get started is by using [Yeoman](http://yeoman.io/). It will ask you a series of questions, pull everything down, and set up wd_s in an empty /wp-content directory.

##### 1) Delete everything inside /wp-content!

##### 2) Navigate to the /wp-content folder of your project
`cd /your-project/wordpress/wp-content`

##### 3) Install Yeoman, the wd_s generator, and kick it all off!
`npm install -g generator-wd-s && yo wd-s`

That's it! You're ready to start using [Grunt](https://github.com/WebDevStudios/wd_s/blob/master/README.md#using-grunt)!

## Manual Installation

Setting up by hand is a bit harder, but if you're comfortable with Git and doing a find & replace, you can get up and running a minutes.

##### 1) Navigate to your new WordPress project and delete /wp-content

##### 2) Clone

**You'll need to clone recursive this repo, not download the zip!** (It includes submodules and they won't be included in the zip)

- Via command line / Terminal:

  `git clone --recursive git@github.com:WebDevStudios/wd_s.git wp-content`

- Via SourceTree/Tower:

  Clone normally, but select "Recurse submodules" and clone into `/wp-content`

##### 3) Navigate to the theme folder
`cd /your-project/wordpress/wp-content/_s/`

##### 4) Find & Replace

You'll need to change all instances of the names: `_s` to your project name.

- Search for: `'_s'` and replace with: `'project-name'` (inside single quotations) to capture the text domain
- Search for: `_s_` and replace with: `project-name_` to capture all the function names
- Search for: `Text Domain: _s` and replace with: `Text Domain: project-name` in style.css
- Search for (and include the leading space): <code>&nbsp;_s</code> and replace with: <code>&nbsp;Project Name</code>(with a space before it) to capture DocBlocks
- Search for: `_s-` and replace with: `project-name-` to capture prefixed handles

##### 5) Install Grunt and Dependencies
- Run `npm install && bower install` from the command line to install Grunt and pull down any dependencies via Bower.

That's it! You're ready to start using [Grunt](https://github.com/WebDevStudios/wd_s/blob/master/README.md#using-grunt)!

## Using Grunt

##### 1) Navigate to the theme folder 
`cd /your-project/wordpress/wp-content/_s`

##### 2) Grunt tasks available:

`grunt watch` - Automatically handle changes to CSS, javascript, and image sprites

`grunt javascript` - Concatenate and minify javascript files

`grunt styles` - Comb, compile, prefix, combine media queries, and minify CSS files

`grunt imageminnewer` - Minify images

`grunt sprites` - Generate image sprites and the associated CSS

`grunt i18n` - Generate a translation file

`grunt` - Do it all once!
