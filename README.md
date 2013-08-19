# Woo p2 theme

## Changelog

### Version 1.0.1 - 2013.08.19
* No longer enqueueing default p2 iphone css and scripts
* Fixed comment edit buttons
* Only add the search bar to the primary custom menu
* Fixed search bar appearance when used in sidebar
* Tweak content layout breakpoint
* Postbox is fixed when scrolling
* Add viewport meta

### Version 1.0.0
* Initial Realease!

## Modified Templates
* header.php - Removed `get_sidebar()`. Added `.header-inner`.
* footer.php - Added `get_sidebar()`.
* post-form.php - Removed post types. Removed citation input. Removed post title input. Changed gravatar size (retina love). Removed media buttons. Added 'beneath-post-box' sidebar.
* sidebar.php - Just call the sidebar...
