<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->formDir,
        $config->application->librariesDir
    ]
  );

  /**
   * Register Files, composer autoloader
   */
  $loader->registerFiles(
      [
          '../vendor/autoload.php'
      ]
  );

  /**
   * Register Autoloader
   */
  $loader->register();
