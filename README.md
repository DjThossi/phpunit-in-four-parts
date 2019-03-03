# PHPUnit in 4 parts
This is the source code used for Sebastian Thoss' session about PHPUnit from basics to SmokeTests.

## Requirements
- Git
- Docker
- Docker Compose

## Installation
1. Just clone this repository 
`git clone git@github.com:DjThossi/phpunit-in-four-parts.git`
1. Go into the repository `cd phpunit-in-four-parts`
1. Boot docker container `docker-compose run cli bash`
1. Run composer install inside container `composer install`

## Running the tests
You can now run all tests inside container. `vendor/bin/phpunit`

Furthermore I've set up several different test suites to make it easier and faster for you to run just some parts of the whole list of tests.

- Unit Tests `vendor/bin/phpunit --testsuite=unit`  
- Integration Tests `vendor/bin/phpunit --testsuite=integration`  
- Acceptance Tests `vendor/bin/phpunit --testsuite=acceptance`


  