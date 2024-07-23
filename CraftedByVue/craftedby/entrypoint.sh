#!/bin/sh

ROOT_DIR=/usr/share/nginx/html

# Remplacer les variables d'environnement dans les fichiers générés
for file in $ROOT_DIR/js/*.js* $ROOT_DIR/index.html $ROOT_DIR/precache-manifest*.js;
do
  sed -i 's|__VITE_API_ENDPOINT__|'${VITE_API_ENDPOINT}'|g' $file
done

# Lancer Nginx
exec "$@"
