# Drupal Mercure workshop Drupal mountain camp 2022

## Initial setup

`$ git clone --branch workshop https://github.com/yobottehg/drupal-mercure.git`
`$ cd drupal`
`$ lando start`
`$ lando composer install`
`$ lando drush site:install --db-url=mysql://drupal9:drupal9@database/drupal9 --site-name=mercure -y`

## Check that everything is working

- Go to https://drupalmercure.lndo.site/
- login as the admin user the drush site install created
- Check the mercure UI http://hub.drupalmercure.lndo.site

## Install and configure Mercure

`$ lando drush en jsonapi mercure jsonapi_extras article_updates -y`

## Build and run the client

`$ cd client`
`$ npm i`
`$ npm run dev`
`$ go to localhost:1234`
