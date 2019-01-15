# WordPress GitHub Plugin Updater

This class is meant to be used with your GitHub hosted WordPress plugins. The purpose of the class is to allow your WordPress plugin to be updated whenever you push out a new version of your plugin, similar to the experience users know and love with the WordPress.org plugin repository.

Not all plugins can or should be hosted on the WordPress.org plugin repository, or you may chose to host it on GitHub only.

This class was originally developed by [Joachim Kudish](https://github.com/jkudish), but because he hasn't had a chance to update it in a while, we stepped in. We are using this class in a couple of our own plugins (dogfooding!) and will continue to develop it as we go.

## Usage instructions
* The class should be included somewhere in your plugin. You will need to require the file (example: `include_once('updater.php');`).
* You will need to initialize the class using something similar to this:

```
	if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
		$config = array(
			'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
			'proper_folder_name' => 'plugin-name', // this is the name of the folder your plugin lives in
			'api_url' => 'https://api.github.com/repos/username/repository-name', // the GitHub API url of your GitHub repo
			'raw_url' => 'https://raw.github.com/username/repository-name/master', // the GitHub raw url of your GitHub repo
			'github_url' => 'https://github.com/username/repository-name', // the GitHub url of your GitHub repo
			'zip_url' => 'https://github.com/username/repository-name/zipball/master', // the zip url of the GitHub repo
			'sslverify' => true, // whether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
			'requires' => '3.0', // which version of WordPress does your plugin require?
			'tested' => '3.3', // which version of WordPress is your plugin tested up to?
			'readme' => 'README.md', // which file to use as the readme for the version number
			'access_token' => '', // Access private repositories by authorizing under Appearance > GitHub Updates when this example plugin is installed
		);
		new WP_GitHub_Updater($config);
	}
```

* In your GitHub repository, you will need to include the following line (formatted exactly like this) anywhere in your Readme file:

	`~Current Version:3.1~`

* You will need to update the version number anytime you update the plugin, this will ultimately let the plugin know that a new version is available.

* From v1.6, the updater can pick up the version from the plugin header as well.

* Support for private repository was added in v1.5

## Changelog

## Credits
This class was originally built by [Joachim Kudish](http://jkudish.com "Joachim Kudish") and is now being maintained by [Radish Concepts](http://www.radishconcepts.com/).

## License
This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to:

Free Software Foundation, Inc.
51 Franklin Street, Fifth Floor,
Boston, MA
02110-1301, USA.
