<?php

namespace Database\Seeders;

// Importation des modèles
use App\Models\User;
use App\Models\Action;
use App\Models\Job;
use App\Models\Event;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Review;
use App\Models\JobResult;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. CRÉATION DU COMPTE ADMIN AVEC MOT DE PASSE HACHÉ
        User::create([
            'name' => 'Administrateur IMARDOS',
            'email' => 'admin@imardos.org',
            'password' => Hash::make('IMARDOS_ADMIN_2024'), // Le mot de passe est sécurisé ici !
        ]);

        // 2. DONNÉES DE TEST (Pour remplir le site)
        Action::create(['title' => 'Projet Santé Maternelle', 'category' => 'Santé', 'location' => 'Mono', 'description' => 'Amélioration de l\'accès aux soins', 'status' => 'En cours', 'image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=200']);
        Action::create(['title' => 'Éducation pour tous', 'category' => 'Éducation', 'location' => 'Zou', 'description' => 'Scolarisation des enfants', 'status' => 'Terminé', 'image' => 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=200']);
        
        // OFFRES D'EMPLOI AVEC RÉSULTATS D'ÉTUDE DES DOSSIERS
        Job::create([
            'title' => 'Chargé(e) de Projet Santé', 
            'department' => 'Mono', 
            'type' => 'CDD', 
            'deadline' => '15/09/2024',
            'results' => "✅ 3 candidats retenus pour l'entretien final.\n❌ 12 dossiers non conformes.\n📋 5 dossiers en liste d'attente."
        ]);
        Job::create([
            'title' => 'Animateur(trice) Éducation', 
            'department' => 'Zou', 
            'type' => 'Volontariat', 
            'deadline' => '30/08/2024',
            'results' => "✅ 1 candidat retenu (poste pourvu).\n❌ 8 dossiers rejetés.\n📋 2 dossiers en réserve."
        ]);
        
        Event::create(['title' => 'Journée Santé Maternelle', 'location' => 'Lokossa', 'date' => '2024-09-12', 'type' => 'Sensibilisation']);
        Event::create(['title' => 'Atelier Autonomisation', 'location' => 'Bohicon', 'date' => '2024-09-20', 'type' => 'Formation']);
        
        Gallery::create(['title' => 'Construction d\'un puits', 'category' => 'Développement', 'image' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=200']);
        Gallery::create(['title' => 'Consultation médicale', 'category' => 'Santé', 'image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=200']);
        
        // RÉSULTATS DES OFFRES (Anciennement Reviews)
        JobResult::create([
            'name' => 'Recrutement 2024 - Projet Santé',
            'job_title' => 'Chargé(e) de Projet Santé',
            'result_content' => "✅ 3 candidats retenus pour l'entretien final.\n📋 Liste des retenus :\n- Aïssa Traoré\n- Jean-Baptiste K.\n- Fati Bouraïma\n\n❌ 12 dossiers non conformes.",
            'status' => 'Publié'
        ]);
        JobResult::create([
            'name' => 'Recrutement 2024 - Éducation',
            'job_title' => 'Animateur(trice) Éducation',
            'result_content' => "✅ 1 candidat retenu :\n- Koffi A.\n\n📋 2 dossiers en liste d'attente.",
            'status' => 'Publié'
        ]);
        
        // DONNÉES POUR LE BLOG
        Blog::create([
            'title' => "L'importance de l'éducation des filles pour le développement",
            'category' => "Actualités",
            'image' => "https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=600",
            'excerpt' => "L'éducation des filles est l'un des piliers essentiels pour le développement durable des communautés.",
            'content' => "<p>Chez IMARDOS, nous croyons fermement que l'éducation des filles est la clé pour briser le cycle de la pauvreté.</p><p>Depuis 2022, nous avons mis en place des programmes de soutien scolaire et de bourses d'études.</p>",
            'author' => "Équipe IMARDOS",
            'date' => "15 Septembre 2024"
        ]);
        Blog::create([
            'title' => "IMARDOS lance une campagne de sensibilisation DSSR",
            'category' => "Communiqués",
            'image' => "https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&w=600",
            'excerpt' => "Une campagne de grande envergure sur la santé sexuelle et reproductive des jeunes vient d'être lancée.",
            'content' => "<p>IMARDOS est fier d'annoncer le lancement officiel de sa nouvelle campagne 'Jeunesse et DSSR, parlons-en !'</p>",
            'author' => "Direction Exécutive",
            'date' => "10 Septembre 2024"
        ]);
    }
}