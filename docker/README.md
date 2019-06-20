## Overview

The `deploy.sh` script is run on [TravisCI](../.travis.yml) on green builds after merge to master.  
It builds a new docker image and publishes it to docker hub as [silverstripe/bambusa-installer](https://hub.docker.com/r/silverstripe/bambusa-installer)

`.travis.yml` uses the following environment vars (these are supposed to be set on CI side):
  - `DOCKERHUB_USER`, which is used to log in to docker hub (e.g. silverstripe)
  - `DOCKERHUB_PASSWORD`, which is used to log in to docker hub (e.g. qwerty123)
  - `DOCKERHUB_IMAGE`, which is the docker hub account+image (e.g. silverstripe/bambusa-installer)

The image includes basic PHP + Apache setup, including the application source code with installed dependencies (--prefer-dist)

The [scripts](./scripts) folder contains auxiliary tooling for running this image on our Kubernetes cluster
