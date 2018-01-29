# DotEnv files for MODX

This MODX plugin lets you override system settings (held in the database) on a per-install basis. Ideal for local changes on your development server (like SMTP server details).

I created this plugin as we forgot to update the SMTP details for our testing environment once, resulting in emails being sent that shouldn't have been.


## IMPORTANT!!!
The `.env` file overrides settings _at runtime_. If you go and view `System Settings` in the manager, you will not see the `.env` changes.
**This is confusing**. Unfortunately, short of _destructively changing_ the values in the database (overwriting them with the `.env` values) there appears to be no work-around.

**Update** Event `OnSiteSettingsRender` may do what's needed... to be investigated unless some kind soul sends me a [Pull Request](https://github.com/pbowyer/modx-dotenv/pulls)

## Installation

  1. [Install the plugin from the MODX Package Manager](https://modx.com/extras/package/dotenv) and activate it.  
     _Alternatively, clone this repository and put it in the `core/components` directory (this file should be located at `core/components/dotenv/README.md`)_

     Go to your MODX Manager, create a new plugin, and point it to the static file `core/components/dotenv/plugin.php`. Enable it for the `OnMODXInit` event.

  1. Create a `.env` file at `core/config/.env`

  1. If you use Git, add `/core/config/.env` to your `.gitignore`. You do not want to commit this file and accidentally deploy it to production -- or to store the sensitive details in it where others can read them.

  1. Update your `.htaccess` file (if using Apache) or nginx config (if using NGINX) to prevent access via the browser to the `.env` file. Yes I know you're using this extension in development only, but you do **NOT** want the chance for anything to go wrong!
     _(This is why sensitive files should not live in the webroot, but MODX does that by default)_.

     For Apache (taken from [StackOverflow](https://stackoverflow.com/q/4352737/119750)):
     ```
     <LocationMatch "\/\.">
         Require all denied
     </LocationMatch>
     ```

     For NGINX:
     ```
     # Block access to dot files
     location ~ /\. {
         deny  all;
     }
     ```

  1. Add some items to the `.env` file. A great one to test that it works is:
     ```bash
     site_name="SET IN DOTENV"
     ```
     [Check this guide]() for the syntax rules allowed in `.env`.

     You can use existing System Settings within your settings, like:
     ```bash
     site_name="SAY ${emailsubject}"
     ```
     Any System Settings can be used (which are in `$modx->config`, not just settings further up the `.env` file.

  1. Check it works by clearing your site's cache and browsing to a page, looking at the changed title tag (if you use the sample files above)
  
  # Thanks
  This extra is brought to you by the MODX experts at [Maple Design](http://www.mapledesign.co.uk/services/s/content-management-systems/modx-development/).
