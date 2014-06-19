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

`git clone --recursive git@github.com:WebDevStudios/wd_s.git`

Via SourceTree/Tower:

Select "Recurse submodules"

### Getting Started

You'll need to change all instances of the names: _s.

1. Search for `'_s'` (inside single quotations) to capture the text domain.
2. Search for `_s_` to capture all the function names.
3. Search for `Text Domain: _s` in style.css.
4. Search for <code>&nbsp;_s</code> (with a space before it) to capture DocBlocks.
5. Search for `_s-` to capture prefixed handles.
6. Search for `_S_` to capture class names.

OR

* Search for: `'_s'` and replace with: `'project-name'`
* Search for: `_s_` and replace with: `project-name_`
* Search for: `Text Domain: _s` and replace with: `Text Domain: project-name` in style.css.
* Search for: <code>&nbsp;_s</code> and replace with: <code>&nbsp;Megatherium</code>
* Search for: `_s-` and replace with: `project-name-`
6. Search for `_S_` and replace with: `Project_Name_`
