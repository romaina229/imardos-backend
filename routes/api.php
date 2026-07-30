<?php

use App\Models\Action;
use App\Models\Job;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\JobResult;
use App\Models\Donation;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// --- ROUTES POUR NOS ACTIONS ---
Route::get('/actions', function () {
    return Action::all();
});
Route::post('/actions', function (Request $request) {
    return Action::create($request->all());
});
Route::put('/actions/{id}', function (Request $request, $id) {
    $action = Action::findOrFail($id);
    $action->update($request->all());
    return $action;
});
Route::delete('/actions/{id}', function ($id) {
    Action::destroy($id);
    return response()->noContent();
});

// --- ROUTES POUR OFFRES D'EMPLOI ---
Route::get('/jobse', function () {
    return Job::all();
});
Route::post('/jobse', function (Request $request) {
    return Job::create($request->all());
});
Route::put('/jobse/{id}', function (Request $request, $id) {
    $job = Job::findOrFail($id);
    $job->update($request->all());
    return $job;
});
Route::delete('/jobse/{id}', function ($id) {
    Job::destroy($id);
    return response()->noContent();
});

// --- ROUTES POUR ÉVÈNEMENTS ---
Route::get('/events', function () {
    return Event::all();
});
Route::post('/events', function (Request $request) {
    return Event::create($request->all());
});
Route::put('/events/{id}', function (Request $request, $id) {
    $event = Event::findOrFail($id);
    $event->update($request->all());
    return $event;
});
Route::delete('/events/{id}', function ($id) {
    Event::destroy($id);
    return response()->noContent();
});

// --- ROUTES POUR LE BLOG ---
Route::get('/blogs', function () {
    return \App\Models\Blog::all();
});
Route::get('/blogs/{id}', function ($id) {
    return \App\Models\Blog::findOrFail($id);
});
Route::post('/blogs', function (Request $request) {
    return \App\Models\Blog::create($request->all());
});
Route::put('/blogs/{id}', function (Request $request, $id) {
    $blog = \App\Models\Blog::findOrFail($id);
    $blog->update($request->all());
    return $blog;
});
Route::delete('/blogs/{id}', function ($id) {
    \App\Models\Blog::destroy($id);
    return response()->noContent();
});

// --- ROUTES POUR GALERIE ---
Route::get('/galleries', function () {
    return Gallery::all();
});
Route::post('/galleries', function (Request $request) {
    return Gallery::create($request->all());
});
Route::put('/galleries/{id}', function (Request $request, $id) {
    $gallery = Gallery::findOrFail($id);
    $gallery->update($request->all());
    return $gallery;
});
Route::delete('/galleries/{id}', function ($id) {
    Gallery::destroy($id);
    return response()->noContent();
});

// --- ROUTES POUR LES RÉSULTATS DES OFFRES ---
Route::get('/job-results', function () {
    return \App\Models\JobResult::all();
});
Route::post('/job-results', function (Request $request) {
    return \App\Models\JobResult::create($request->all());
});
Route::put('/job-results/{id}', function (Request $request, $id) {
    $result = \App\Models\JobResult::findOrFail($id);
    $result->update($request->all());
    return $result;
});
Route::delete('/job-results/{id}', function ($id) {
    \App\Models\JobResult::destroy($id);
    return response()->noContent();
});

// Route pour récupérer tous les contacts
Route::get('/contacts', function () {
    return Contact::orderBy('created_at', 'desc')->get();
});
Route::post('/contacts', function(Request $r) { return Contact::create($r->all()); });

// Route pour enregistrer un don 
Route::post('/donations', function (Request $request) {
    $donation = Donation::create($request->all());
    return response()->json(['message' => 'Don enregistré', 'id' => $donation->id], 201);
});

// Route pour l'Admin (récupérer tous les dons)
Route::get('/donations', function () {
    return Donation::orderBy('created_at', 'desc')->get();
});

// Route pour vérifier le mot de passe haché
Route::post('/login', function (Illuminate\Http\Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    // Vérification du mot de passe haché (bcrypt)
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Email ou mot de passe incorrect'], 401);
    }

    // Si c'est bon, on renvoie une confirmation
    return response()->json(['message' => 'Connexion réussie', 'user' => $user->name]);
});