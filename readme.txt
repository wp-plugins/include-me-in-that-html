=== Include Me In That HTML ===
Contributors: Martin Ford, Bochgoch
Donate link: http://www.bochgoch.com/?p=wp
Tags: posts,pages,embed file,content
Requires at least: 2.0.2
Tested up to: 2.2.2
Stable tag: trunk

This is a embedded file plugin that will include any file into the body of any Wordpress Post or Page.

== Description ==
This is a embedded file plugin that will include any file into the body of any Wordpress Post or Page. 
Be careful what you place into any included file as its content will be transferred directly into the html of your Wordpress Blog Site.


== Installation ==
* Unzip into your `/wp-content/plugins/` directory.
* Activate 'Include Me In That (html)' through the 'Plugins' menu on the WordPress Admin page of your blog.
* Create a directory called IMIT_files in the directory that Wordpress is installed into. 
* Place the files that you want to include in that directory (/wordpress/IMIT_files/)
* That's it...

To include a file simply enter the following HTML comment into the body of your post or page:

<!--IMITH *filename*IMITH--> 

Substitute *filename* as appropriate.

== Frequently Asked Questions ==

= Where can I leave feedback about the If You Liked That plugin? =
Visit www.bochgoch.com

= Can I only include one file? =
You can use the plugin as many times as you like in a page or post.

You can also include a number of files in the file definition and the plugin will randomly select one. For example,

<!--IMITH file1.html|file2.html|file3.htmlIMITH--> 

The plugin will select the content of one of the three files (file1.html, file2.html or file3.html) to include for you.