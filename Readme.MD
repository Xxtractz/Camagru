
<h1>Camagru</h1>
<br>

<h2>Im implementing the MVC Aproach.<h2>

<br>
<h2>.htaccess<h2>

I need the htaccess(so that i can play around with my url, and redirectories).

in php.ini, will have to uncomment mod_rewrite.

A brief Explaination of htaccess

What is .htaccess?
.htaccess is a configuration file for use on web servers running the Apache Web Server software. 
When a .htaccess file is placed in a directory which is in turn 'loaded via the Apache Web Server',
then the .htaccess file is detected and executed by the Apache Web Server software.
These .htaccess files can be used to alter the configuration of the Apache Web Server software to enable/disable additional functionality and features that the Apache Web Server software has to offer. These facilities include basic redirect functionality, for instance if a 404 file not found error occurs, or for more advanced functions such as content password protection or image hot link prevention.

What the RewriteEngine on/off statement does is to turn off/on the comment mode for mod_rewrite (RewriteEngine off starts comment mode; RewriteEngine on turns the comment mode off - using the "on" mode "merely" ensures that the comment mode hadn't been turned on elsewhere).