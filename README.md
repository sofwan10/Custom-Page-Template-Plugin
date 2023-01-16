# Custom-Page-Template-Plugin
This version of the plugin includes additional plugin details in the header comments such as version, author, author URI, and license. The plugin also programmatically creates the custom template file custom-template.php in the active theme directory on plugin activation.
It uses get_template_directory() to get the active theme directory and file_exists to check if the custom-template.php already exist or not, If not exist then it creates the file with fopen, fwrite and fclose.


## To use this plugin:

- Create a new directory in your wp-content/plugins directory and name it custom-page-template
- Create a new file inside this directory and name it custom-page-template.php
- Open the custom-page-template.php file and paste the above code in it.
- Zip the custom-page-template directory and upload it to your WordPress site through the plugin installer.
- Once the plugin is installed, activate it.
- The plugin will automatically create a new page on your website with
