=== IF AS Shortcode ===
Contributors: okfie
Tags: if_statement, if, conditions, page_templete_conditions, post_templete_conditions
Requires at least: 4.0
Tested up to: 6.6
Stable tag: 1.2
Requires PHP: 5.6
Text Domain: if-as-shortcode
Domain Path: /lang
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

You can use if statement as shortcode everywhere you want!

== Description ==
This is plugin help you to add conditions inside any post types, menus, and widgets to restrict the content by use shortcode without use php code or other language :).

= Posts/Pages/Other Post Types : =
1. Create new content and in above tinymce editor you will see button it's name is "IF".
1. Click "IF" button and choose the condition you need to use inside content area.
1. You can select the true block and write otherwise inside else block.
1. Save your content and publish to see it!

= Menus : =
1. Click in left side "Appearance"
1. Choose from it "Menus" page.
1. You must show description field for every menu by this way :
1. Click "Screen Options" up the menu page.
1. Chack "Description" from that tab.
1. Now you can add your restrict content from "Shortcode" tab.

= Widgets : =
1. Click in left side "Appearance"
1. Choose from it "Widgets" page.
1. Now you have box it's name "The restricted content".
1. You can move it to any sidebar and fill the felids.


= Translations = 
* Arabic 
* English

== Installation ==

= Installation Automatically =
1. Click Plugins in the menu dashboard.
2. Click Add New.
3. Upload and choose "if-as-shortcode.zip" file and activate directly.
4. After activated plugin you can use shortcode of if statement everywhere!

= Installation Manually =
1. Download the plugin to your computer.
2. Unzip the file and upload it to the "/wp-content/plugins/" by using FTP or Cpanel.
3. Activate the plugin through the "Plugins" menu in WordPress dashboard.
4. After activated plugin you can use shortcode of if statement everywhere!

== List of conditions ==
- [if current_user_can capability="administrator"]True content[else]False content[/if]
- [if current_user_can capability="editor"]True content[else]False content[/if]
- [if current_user_can capability="author"]True content[else]False content[/if]
- [if current_user_can capability="contributor"]True content[else]False content[/if]
- [if current_user_can capability="subscriber"]True content[else]False content[/if]
- [if is_user_logged_in]True content[else]False content[/if]
- [if has_post_thumbnail]True content[else]False content[/if]
- [if comments_open]True content[else]False content[/if]
- [if has_tag]True content[else]False content[/if]
- [if is_attachment]True content[else]False content[/if]
- [if has_excerpt]True content[else]False content[/if]
- [if pings_open]True content[else]False content[/if]
- [if is_home]True content[else]False content[/if]
- [if is_rtl]True content[else]False content[/if]

== Example ==
- Show content for who logged in
`[if is_user_logged_in]
Welcome
[else]
You must login to see this content
[/if]`


== Screenshots ==
1. Button to add new condition.
2. Generate new content shows only for subscribers.
3. Sample of shortcode after putting the content.

== Changelog ==
= 1.2 =
- Some minor fixes.
- New function to check status of [Classic Editor] plugin.
- Tested with WP 6.6.X

= 1.1 =
- Change released version.
- Test on WP 5.X.X
= 1.0 =
- First released version.