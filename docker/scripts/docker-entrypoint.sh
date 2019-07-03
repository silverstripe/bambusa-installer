#!/bin/bash
set -e

if [[ "$VERBOSE" = "yes" ]]; then
    set -x
fi

# execute command passed in as arguments.
exec "$@"