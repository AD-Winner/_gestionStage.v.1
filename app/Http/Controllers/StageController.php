<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Enseignant;
use App\Models\Etudiant;
use Yoeunes\Notify\Notify;
use Illuminate\Http\Request;
use App\Http\Requests\StageRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stages = Stage::orderBy('id','DESC')->paginate(4);;
        $total = Stage::count();
        return view('stages.index', ['stages'=>$stages, 'total'=>$total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $enseignants = Enseignant::all();
        $etudiants = Etudiant::all();
        return view('stages.create', ['etudiants'=>$etudiants, 'enseignants'=>$enseignants]);

    }
    public function offre()
    {
        return view('stages.offre');
    }

    public function contact()
    {
        return view('stages.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StageRequest $request)
    {
        //
        
                //upload fichier
                $fiche = $request->file('fiche');
                $ficheName = 'Fiche-'.date("Y_m_d-H_i_s").'.'.$fiche->extension();
                $fiche->move(\public_path('Fiches_Stages'),$ficheName);
                //$enfant->bulletin = $ficheName;
                Stage::create([
                    'fiche' => $ficheName,
                    'secteur_activite' => $request->secteur,
                    'entreprise' => $request->entreprise,
                    'lieu' => $request->lieu_stage,
                    'code_postal' => $request->code_postal,
                    'date_debut' => $request->debut_stage,
                    'date_fin' => $request->fin_stage,
                    'theme' => $request->theme_stage,
                    'cp' => $request->code_postal,
                    'tuteur_entreprise_email' => $request->tuteur_entreprise_email,
                    'tuteur_entreprise' => $request->tuteur,
                    'tuteur_entreprise_tel' => $request->telephone,
                    'voeux_ens1' => $request->voeu1,
                    'voeux_ens2' => $request->voeu2,
                    'voeux_ens3' => $request->voeu3,
                    'etudiant_id'  => 1,
                    'enseignant_id'  => null
                ]);
               Notify()->success('Depot de stage reussi', 'Depôt');
                return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function show(Stage $stage,$id)
    {
        return view('stages.show', ['stage' => Stage::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function edit(Stage $stage, $id)
    {
    //   dd(Stage::find($id));
        return view('stages.edit', ['stage' => Stage::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $stage = Stage::find($id);
        //update
        $stage->entreprise= $request->entreprise;
        $stage->secteur_activite= $request->secteur;
        $stage->lieu= $request->lieu_stage;
        $stage->theme= $request->theme_stage;
        $stage->tuteur_entreprise= $request->tuteur;
        $stage->tuteur_entreprise_tel= $request->telephone;
        $stage->tuteur_entreprise_email= $request->tuteur_email;
        $stage->date_debut= $request->debut_stage;
        $stage->date_fin= $request->fin_stage;
        $stage->cp= $request->code_postal;
        $stage->voeux_ens3= $request->voeu1;
        $stage->voeux_ens1= $request->voeu2;
        $stage->voeux_ens2= $request->voeu3;

        if( $request->file('fiche') != null){
            //supp fiche
           
            if($stage->fiche != null){
                $fiche =public_path('Fiches_Stages/'.$stage->fiche);
                unlink($fiche);
            }
            // upload file
            $fiche = $request->file('fiche');
            $ficheName = 'Fiche-'.date("Y_m_d-H_i_s").'.'.$fiche->extension();
            $fiche->move(\public_path('Fiches_Stages'),$ficheName);
            $stage->fiche=$ficheName;
        }
        $stage->save();

        notify()->success('Modification  du depot stage reussi','Modification');
        return back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stage $stage,$id)
    {
        //supp fiche 
        if( Stage::find($id)->fiche != null ){
            $fiche =public_path('Fiches_Stages/'.Stage::find($id)->fiche);
            unlink($fiche);    
        }

       Stage::find($id)->delete();
        notify()->success('Suppresion du stage avec succès','Suppresion');
        return back();
    }
}
