# Gestion des Événements

Application web Laravel pour la gestion d'événements, d'experts et d'ateliers.

## Stack technique

- PHP 8.2+
- Laravel 12
- Base de données relationnelle (MySQL / SQLite)

## Modèles & relations

- **Expert** — a plusieurs événements
- **Evenement** — appartient à un expert, a plusieurs ateliers
- **Atelier** — appartient à un événement

## Prérequis

- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL ou SQLite

## Installation

```bash
git clone https://github.com/votre-utilisateur/votre-repo.git
cd votre-repo

composer install
cp .env.example .env
php artisan key:generate
```

Configurer la base de données dans `.env` :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nom_de_la_base
DB_USERNAME=utilisateur
DB_PASSWORD=mot_de_passe
```

Puis lancer les migrations :

```bash
php artisan migrate
```

## Lancer le projet

```bash
php artisan serve
```

L'application sera disponible sur `http://localhost:8000`.

## Routes disponibles

| Méthode | URL                  | Description                        |
|---------|----------------------|------------------------------------|
| GET     | `/evenements`        | Liste de tous les événements       |
| GET     | `/evenements/{id}`   | Détail d'un événement + ateliers   |
| DELETE  | `/evenements/{id}`   | Supprimer un événement             |

## Structure du projet

```
app/
├── Http/Controllers/EvenementController.php
├── Models/
│   ├── Atelier.php
│   ├── Evenement.php
│   └── Expert.php
database/
├── migrations/
│   ├── create_experts_table.php
│   ├── create_evenements_table.php
│   └── create_ateliers_table.php
resources/views/événements/
├── index.blade.php
└── show.blade.php
```
