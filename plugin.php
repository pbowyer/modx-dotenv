<?php
/** @var modX $modx */
switch ($modx->event->name) {

    case 'OnMODXInit':
        $path = $modx->getOption('dotenv.path', null, MODX_CORE_PATH . 'components/dotenv/', true);
        $dotenv_file = MODX_CORE_PATH . 'config/.env';
        if (!file_exists($dotenv_file)) {
            $modx->log(MODX_LOG_LEVEL_ERROR, "[Dotenv] .env file '$dotenv_file' does not exist");
        } else {
            require_once $path . '/vendor/autoload.php';
            $env = new M1\Env\Parser(file_get_contents($dotenv_file), $modx->config);
            $modx->config = array_merge($modx->config, $env->getContent());
        }
        break;
    case 'OnCacheUpdate':
        if ($results['system_settings'] === true) {
            // @TODO Read the cached system settings file; update the array to contain dotenv details, and write to the file again
        }
        break;

    case 'OnSiteSettingsRender':
        // @TODO Can we highlight changed values on the System Settings page?
        $x = 1;
        break;
}