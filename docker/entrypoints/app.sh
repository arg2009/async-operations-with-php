#!/usr/bin/env sh

# Exit on error
set -e

cp /app/docker/supervisor/app.ini /etc/supervisor.d

# Launch SupervisorD
exec supervisord -n -c /app/docker/supervisor/supervisord.conf
