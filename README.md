# Houston
Houston is a child theme for [p2](http://p2theme.com/), designed by the folks at [WooThemes](http://woothemes.com). It features a device-agnostic design so the layout responds to suit the browser, making it easy to stay up to date when you're on the go. Houston also introduces a handy new widget region beanth the post box and features integration with the "p2 likes" plugin.

### Resourses
Houston makes use of the following resources:

* [FontAwesome Icon font](http://fortawesome.github.io/Font-Awesome/). License: [SIL Open Font License (OFL)](http://scripts.sil.org/cms/scripts/page.php?site_id=nrsi&id=OFL)


## Changelog

### Version 1.1.0 - 2013.10.11
* Added a more prominent reply link

### Version 1.0.3 - 2013.10.10
* Added word-wrap:break-word to fix overflowing links etc.
* Better p2 likes integration.
* Fixed long site title overflow.
* Styled dropdown navigation.

### Version 1.0.2 - 2013.09.17
* Rename theme and functions.
* Fix 404 page layout.
* Post box textrea focused when visible.

### Version 1.0.1 - 2013.08.19
* No longer enqueueing default p2 iphone css and scripts
* Fixed comment edit buttons
* Only add the search bar to the primary custom menu
* Fixed search bar appearance when used in sidebar
* Tweak content layout breakpoint
* Postbox is fixed when scrolling
* Add viewport meta
* Javascript tidy up
* Made post box collapsable

### Version 1.0.0
* Initial Realease!

## Modified Templates
* header.php - Removed `get_sidebar()`. Added `.header-inner`.
* footer.php - Added `get_sidebar()`.
* post-form.php - Removed post types. Removed citation input. Removed post title input. Changed gravatar size (retina love). Removed media buttons. Added 'beneath-post-box' sidebar. Added `.inputs` wrapping div.
* sidebar.php - Just call the sidebar...
