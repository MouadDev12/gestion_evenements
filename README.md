# GestEvent

Application web de gestion d'événements professionnels, développée avec **Laravel 12**. Elle permet de gérer des événements, les experts qui les animent, et les ateliers associés.

---

## Fonctionnalités

- Créer, consulter et supprimer des **événements** (thème, dates, coût journalier, description)
- Gérer les **experts** (nom, prénom, email, spécialité) et les associer à des événements
- Gérer les **ateliers** rattachés à chaque événement
- Interface responsive avec sidebar de navigation et topbar

## Stack technique

| Couche | Technologie |
|---|---|
| Backend | PHP 8.2 / Laravel 12 |
| Frontend | Blade, CSS natif, Font Awesome 6 |
| Base de données | MySQL / SQLite |
| Build | Vite + Node.js |

## Prérequis

- PHP >= 8.2
- Composer
- Node.js >= 18
- MySQL ou SQLite

## Installation

```bash
# 1. Cloner le dépôt
git clone https://github.com/votre-utilisateur/gestevent.git
cd gestevent

# 2. Installer les dépendances PHP
composer install

# 3. Configurer l'environnement
cp .env.example .env
php artisan key:generate

# 4. Configurer la base de données dans .env
# DB_CONNECTION=mysql
# DB_DATABASE=gestevent
# DB_USERNAME=root
# DB_PASSWORD=

# 5. Lancer les migrations
php artisan migrate

# 6. (Optionnel) Insérer des données de test
php artisan db:seed

# 7. Installer les dépendances JS et compiler les assets
npm install && npm run build
```

## Lancer le serveur de développement

```bash
composer run dev
```

L'application sera disponible sur `http://localhost:8000`.

## Structure du projet

```
app/
├── Http/Controllers/
│   ├── EvenementController.php
│   ├── ExpertController.php
│   └── AtelierController.php
├── Models/
│   ├── Evenement.php
│   ├── Expert.php
│   └── Atelier.php
database/
└── migrations/
resources/
└── views/
    ├── layouts/app.blade.php
    ├── événements/
    ├── experts/
    └── ateliers/
```

## Modèle de données

```
Expert ──< Evenement ──< Atelier
```

- Un **Expert** peut animer plusieurs événements
- Un **Événement** contient plusieurs ateliers
- Un **Atelier** appartient à un seul événement

## Tests

```bash
php artisan test
```

## Licence

MIT
