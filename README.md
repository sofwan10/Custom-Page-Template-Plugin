# Custom-Page-Template-Plugin
The plugin also programmatically creates the custom template file custom-template.php in the active theme directory on plugin activation. It uses get_template_directory() to get the active theme directory and file_exists to check if the custom-template.php already exist or not, If not exist then it creates the file with fopen, fwrite and fclose.
