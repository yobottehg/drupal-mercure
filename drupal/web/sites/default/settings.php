<?php

$databases = [];
$settings['hash_salt'] = 'E23Dvftkl92HFI8wSIlJc-nC5mrI-vkGqNbaY7iivQZZVsxjKfXpDS_1-pHfjl52AxNFfFh1og';
$settings['update_free_access'] = TRUE;

$settings['container_yamls'][] = $app_root . '/' . $site_path . '/services.yml';

$settings['file_scan_ignore_directories'] = [
  'node_modules',
  'bower_components',
];

$settings['skip_permissions_hardening'] = TRUE;

$settings['entity_update_batch_size'] = 50;

$settings['entity_update_backup'] = TRUE;

$settings['migrate_node_migrate_type_classic'] = FALSE;

$databases['default']['default'] = array (
  'database' => 'drupal9',
  'username' => 'drupal9',
  'password' => 'drupal9',
  'prefix' => '',
  'host' => 'database',
  'port' => '',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);

$settings['config_sync_directory'] = 'sites/default/files/config_qPUrseIm9pDkb8D50zSkyZMlTnjSQP1IobaJjjDSHNCSPchOsCn93vglCYBd6MWSUmiGLTyWbg/sync';
