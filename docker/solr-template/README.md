# Solr 4 docker template

This is mostly copied from https://github.com/docker-solr/docker-solr4. There is no official
image for solr 4 because it is now legacy.

Note that it has been modified to run solr under the `www-data` user. This is so file permissions
are not problematic when sharing solr config between the web and solr containers on the same volume.
