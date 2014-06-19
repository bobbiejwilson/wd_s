wd_s
====

A new project boilerplate.

### Includes

* _s (Sass fork)     [automattic](https://github.com/Automattic/_s), [gregrickaby](https://github.com/gregrickaby/_s/tree/sass)
* CMB                [webdevstudios](https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress)
* Taxonomy Core      [jtsternberg](https://github.com/jtsternberg/Taxonomy_core)
* CPT Core           [jtsternberg](https://github.com/jtsternberg/CPT_Core)
* Basic MU Plugin

### Clone

You'll need to clone recursive this repo, not download the zip! (It includes other Github submodules and they won't be included in the zip)

Via CLI:

`git clone --recursive https://github.com/WebDevStudios/wd_s.git`

Via SourceTree/Tower:

Select "Recurse submodules"

### Getting Started

You'll need to change all instances of the names: _s.

* Search for: `'_s'` and replace with: `'your project name'`
* Search for: `_s_` and replace with: `your project name_`
* Search for: <code>&nbsp;_s</code> and replace with: <code>&nbsp;your project name/code>
* Search for: `_s-` and replace with: `your project name-`
* Search for: `Text Domain: _s` and replace with: `Text Domain: your project name` in style.css.
* Search for: `_S` and replace with: `Project_Name`

