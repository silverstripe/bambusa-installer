## Overview

[![Build Status](https://travis-ci.com/silverstripe/bambusa-installer.svg?branch=master)](https://travis-ci.com/silverstripe/bambusa-installer)

Demonstration project for SilverStripe CMS.

## About this project

This project is meant to demonstrate key features of SilverStripe CMS. It combines both commercially supported modules and non-supported community modules. The frontend of the Bambusa demo is built on top of the [Bambusa Theme](https://github.com/silverstripe/bambusa-theme).

This project is used to build the demonstration environment when a user request a SilverStripe demo from [silverstripe.com/demo](https://silverstripe.com/demo). 

It's not meant to be used directly by the community. However, there's nothing stopping third party from re-using it for their own demo. SilverStripe doesn't provide official support for this project.

## Custom Demos

Bambusa can serve as a great starting point for custom demos,
e.g. as part of sales pitches. It comes with great default content
that shows off CMS capabilities, and a well polished theme.

There's some parts which aren't often required in those custom demos,
so you should start by cloning the repo into a copy,
then modifying `composer.json` to your needs.
Don't forget to contribute back anything that's useful though!

For example, you might want to remove `silverstripe/bambusa-selfservice`
which is only required for self-service demos created through silverstripe.com/demo.

```
composer remove silverstripe/bambusa-selfservice
```

If you're using the default content (which includes translations),
those won't show in the CMS or frontend because they're kept in separate database tables.

## Removing Fluent

Our multilingual capabilities are important, but sometimes not required for custom demos.
Given that the underlying module (`silverstripe/fluent`) can
have side effects on other modules, it's often easiest to remove it.  

```
composer remove silverstripe/bambusa-fluent tractorcow/silverstripe-fluent
```

Note that due to the fluent table structure, you can continue to use the
default database content - any content in other languages simply won't show
to visitors or authors. The sample content itself will mention multilingual
capabilities though.

## Local Development

### Vagrant

This project can be spun up through our
[default Vagrant setup](https://silverstripe.atlassian.net/wiki/spaces/DEV/pages/401506576/Vagrant).

```
vagrant up
```

It'll be available under `http://bambusa.vagrant`.

Note that Solr search won't work out of the box unless you configure it
in the Vagrant box.

### Docker

This project is aimed to be deployed in an internal Kubernetes stack,
as a set of Docker containers. You can approximate this setup locally
by running it through [docker-compose](https://docs.docker.com/compose/).

```
cd docker
docker-compose up
```  

Once all containers have launched, you should be able to access the site
under `http://localhost:8200`.

If you need access to individual containers (e.g. SSH into the web container),
you can use `docker-compose exec` to get an interactive shell
with the webserver user:

```
docker-compose exec -u www-data web /bin/bash
``` 

## Docker Builds

WARNING: The Docker image is specifically crafted for our internal Kubernetes stack. It is not supposed to suit any other needs.

The `docker/deploy.sh` script is run on [TravisCI](../.travis.yml) on green builds after merge to master.  
It builds a new docker image and publishes it to docker hub as [silverstripe/bambusa-installer](https://hub.docker.com/r/silverstripe/bambusa-installer)

`.travis.yml` uses the following environment vars (these are supposed to be set on CI side):
  - `DOCKERHUB_USER`, which is used to log in to docker hub (e.g. silverstripe)
  - `DOCKERHUB_PASSWORD`, which is used to log in to docker hub (e.g. qwerty123)
  - `DOCKERHUB_IMAGE`, which is the docker hub account+image (e.g. silverstripe/bambusa-installer)

The image includes basic PHP + Apache setup, including the application source code with installed dependencies (--prefer-dist)

The [docker/scripts](./docker/scripts) folder contains auxiliary tooling for running this image on our Kubernetes cluster


## License

    Copyright (c) 2007-2018, SilverStripe Limited - www.silverstripe.com
    All rights reserved.

    Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

        * Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
        * Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the
          documentation and/or other materials provided with the distribution.
        * Neither the name of SilverStripe nor the names of its contributors may be used to endorse or promote products derived from this software
          without specific prior written permission.

    THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
    IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
    LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
    GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT,
    STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY
    OF SUCH DAMAGE.
