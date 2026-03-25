<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Expert;
use App\Models\Evenement;
use App\Models\Atelier;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $expert1 = Expert::create([
            'nom' => 'Benali',
            'prenom' => 'Karim',
            'email' => 'karim.benali@example.com',
            'specialite' => 'Intelligence Artificielle',
        ]);

        $expert2 = Expert::create([
            'nom' => 'Moussaoui',
            'prenom' => 'Sara',
            'email' => 'sara.moussaoui@example.com',
            'specialite' => 'Développement Web',
        ]);

        $expert3 = Expert::create([
            'nom' => 'Tazi',
            'prenom' => 'Youssef',
            'email' => 'youssef.tazi@example.com',
            'specialite' => 'Cybersécurité',
        ]);

        $ev1 = Evenement::create([
            'theme'          => 'Intelligence Artificielle & Machine Learning',
            'date_debut'     => '2026-04-10',
            'date_fin'       => '2026-04-12',
            'description'    => 'Conférence sur les dernières avancées en IA et ML appliquées aux entreprises.',
            'cout_journalier' => 1500.00,
            'expert_id'      => $expert1->id,
        ]);

        Atelier::create(['nom' => 'Introduction au Deep Learning', 'description' => 'Bases des réseaux de neurones.', 'evenement_id' => $ev1->id]);
        Atelier::create(['nom' => 'NLP avec Python', 'description' => 'Traitement du langage naturel.', 'evenement_id' => $ev1->id]);
        Atelier::create(['nom' => 'Vision par ordinateur', 'description' => 'Détection d\'objets avec YOLO.', 'evenement_id' => $ev1->id]);

        $ev2 = Evenement::create([
            'theme'          => 'Développement Web Moderne',
            'date_debut'     => '2026-05-05',
            'date_fin'       => '2026-05-07',
            'description'    => 'Atelier pratique sur Laravel, Vue.js et les APIs REST.',
            'cout_journalier' => 900.00,
            'expert_id'      => $expert2->id,
        ]);

        Atelier::create(['nom' => 'Laravel avancé', 'description' => 'Architecture et bonnes pratiques.', 'evenement_id' => $ev2->id]);
        Atelier::create(['nom' => 'Vue.js 3 & Composition API', 'description' => 'Composants réactifs modernes.', 'evenement_id' => $ev2->id]);

        $ev3 = Evenement::create([
            'theme'          => 'Cybersécurité & Protection des données',
            'date_debut'     => '2026-06-15',
            'date_fin'       => '2026-06-16',
            'description'    => 'Sensibilisation aux menaces et bonnes pratiques de sécurité.',
            'cout_journalier' => 1200.00,
            'expert_id'      => $expert3->id,
        ]);

        Atelier::create(['nom' => 'Pentest Web', 'description' => 'Tests d\'intrusion sur applications web.', 'evenement_id' => $ev3->id]);
        Atelier::create(['nom' => 'RGPD & Conformité', 'description' => 'Obligations légales et mise en conformité.', 'evenement_id' => $ev3->id]);
    }
}
