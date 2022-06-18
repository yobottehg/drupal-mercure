# Drupal Mercure workshop Drupal mountain camp 2022

## Initial setup

`$ git clone --branch workshop https://github.com/yobottehg/drupal-mercure.git`
`$ lando start`
`$ lando composer install`
`$ lando drush site:install --db-url=mysql://drupal9:drupal9@database/drupal9 --site-name=mercure -y`

## Check that everything is working

- Go to https://drupalmercure.lndo.site/
- login as the admin user the drush site install created

## Install and configure Mercure

`$ lando drush en mercure`
