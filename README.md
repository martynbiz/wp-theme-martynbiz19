# University of Stirling theme

This is the theme for a basic University of Stirling Wordpress blog. It works as
a stand alone theme with branded header and footer with basic post styling.

## Installing the theme

1. cd into wp-content/themes directory
2. git clone https://gitlab.com/stiracuk/wp-layout-theme.git uos-layout

Activate the Theme through the 'Themes' menu in WordPress, or preferably create a child theme.

## Creating menus

There are two menu locations registered for Main Menu (news, research, etc) and
Top Right Menu (portal, search) menu links

Create new menus for these locations in Appearance > Menus for links to appear. If
menu items are categories, create those first in Posts > Categories.

## Header images

The default header image for the blog can be selected from Appearance > Header. From here,
select the header image from media library or upload a new one to appear as the header.

To have a different header image for each category/page, first upload/select all images
in Appearance > Header then install the Unique Headers plugin. This will allow header
images to be specifically for that item in Pages and Posts > Categories.

## Development

Changes to this theme will affect all child themes based on this. Changes to be
pushed back to the repository so that other installations can be updated. This theme
uses NPM/Bower for dependency management and Gulp for asset compilation.

First time only, install dependencies:

```
$ cd wp-content/themes/uos-layout
$ npm install
$ bower install
```

Now that dependencies have been install, to edit styles and javascript, run:

```
$ gulp
```

Note: DO NOT edit style.css and script.js directly! Only edit scss and js/\*.js files.
Changes will be overwritten when next compiled.

At this time of writing, the new theme has been built for homepage posts (index.php) and
showing posts (single.php) as this is all that blog.stir.ac.uk seems to have. Please test
such features if required for another blog before switching to this theme. The plan is to
suppost all Wordpress types (posts, comments, etc).


TODO
* masonry
* https://codex.wordpress.org/Theme_Development
* responsive
* theme versions ?
* social media links in single
* contact page
* about me page
* footer
* final screenshot
* category description
* comments
