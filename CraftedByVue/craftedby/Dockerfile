# syntax=docker/dockerfile:1

# Étape 1 : Construire l'application Vue.js
FROM node:20 AS build
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .

# Exécuter la commande de build et rediriger les logs vers un fichier
RUN npm run build


# Étape 2 : Servir les fichiers avec Nginx
FROM nginx:alpine
COPY --from=build /app/dist /usr/share/nginx/html
COPY nginx.conf /etc/nginx/sites-enabled/default

EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
