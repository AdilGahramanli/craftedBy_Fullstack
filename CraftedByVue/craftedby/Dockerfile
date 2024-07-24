# Étape 1 : Construire l'application Vue.js
FROM node:20 AS build
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .

ARG VITE_API_ENDPOINT
ENV VITE_API_ENDPOINT=$VITE_API_ENDPOINT
# Exécuter la commande de build et rediriger les logs vers un fichier
RUN npm run build


# Étape 2 : Servir les fichiers avec Nginx
FROM nginx:alpine
COPY --from=build /app/dist /usr/share/nginx/html
#COPY nginx.conf /etc/nginx/sites-enabled/default
COPY nginx.conf /etc/nginx/conf.d/default.conf
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]

EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
