<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Classe;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEtudiantRequest;
use App\Http\Requests\UpdateEtudiantRequest;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $etudiants = Etudiant::orderBy('id','DESC')->paginate(4);;
        $total = Etudiant::count();
        return view('etudiants.index', ['etudiants'=>$etudiants, 'total'=>$total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         ##-- On selectionne tous les classes pour pouvoir les afficher au select input --##
         $classes = Classe::all();
         // Puis on renvoi la vue create avec la liste des classes
         return view('etudiants.create', ['classes'=>$classes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEtudiantRequest $request)
    {
        //
        $etudiant = new Etudiant();
        $etudiant->matricule = $request->matricule;
        $etudiant->prenom = $request->prenom;
        $etudiant->nom = $request->nom;
        $etudiant->sexe = $request->sexe;
        $etudiant->email = $request->email;
        $etudiant->code_postal = $request->code_postal;
        $etudiant->portable = $request->portable;
        $etudiant->adresse = $request->adresse;
        $etudiant->classe_id = $request->classe_id;
        $etudiant->save();

        return redirect(route('etudiant-index'))->with('success', 'Les informations  ajoutées avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // On trouve l'etudiant par ID
        $etudiant = Etudiant::find($id);
         ##-- On selectionne tous les classes pour pouvoir recuperer la classe d'tudiant les afficher au select box --##
         $classes = Classe::all();
         // Puis on renvoi la vue edit etudiant avec la liste des classes
         return view('etudiants.edit', ['etudiant'=>$etudiant,'classes'=>$classes]);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEtudiantRequest $request, $id)
    {
        //
        $etudiant = Etudiant::find($id);
        $etudiant->matricule = $request->matricule;
        $etudiant->prenom = $request->prenom;
        $etudiant->nom = $request->nom;
        $etudiant->sexe = $request->sexe;
        $etudiant->email = $request->email;
        $etudiant->code_postal = $request->code_postal;
        $etudiant->portable = $request->portable;
        $etudiant->adresse = $request->adresse;
        $etudiant->classe_id = $request->classe_id;
        $etudiant->update();

        return redirect(route('etudiant-index'))->with('success', 'Mise à jour des informations effectuée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Etudiant::find($id)->delete();
        return redirect(route('etudiant-index'))->with('success', 'Enregistrement supprimé avec succès.');
    }
}
