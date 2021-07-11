@extends('layouts.etudiant')
@section('content')
<div class='container'>
    <div class="row mb-4">
            <div class="col-sm-12 col-md-6">
               <a href="{{ route('stage-index') }}" class="btn btn-md btn-outline-secondary float-left">  <i class="fas fa-arrow-circle-left"></i> Retour</a>
            </div>
            <div class="col-sm-12 col-md-6">
               <!-- <h1>Résultats</h1>-->
            </div>
    </div>

       <div class="row bg-white pt-3 mt-1 mb-3">
       <div class="col-sm-12">
                <!-- MESSAGE DE ERREUR -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                    </ul>
                </div>
            @endif
                <div class="container">
                    <h1 class="text-center">Modification Stage</h1>
                    <form action="{{route('stage-update',['id' => $stage->id])}}" method="POST" enctype="multipart/form-data" class="row d-flex flex-row">
                       @method('PUT')
                        @csrf
                        {{-- id hidden --}}
                        {{-- <input type="hidden" name="id" value="{{$stage->id }}"> --}}
                        <div class="col-6">
                            <fieldset>
                                <legend>Stage</legend>
                            <div class="form-group">
                                <label for="fiche">Fiche de renseignement </label>
                                <input type="file" class="form-control @error('fiche') is-invalid @enderror" name="fiche" accept=".pdf,.docx,.doc">
                                @error('fiche')
                                 {{ $message }}   
                                @enderror
                                <li class="nav-item"><a target="_blank" href="../../../../Fiches_Stages/{{ $stage->fiche }}"> voir la fiche</a></li>
                            </div>
                            <div class="form-group mt-2">
                                <label for="entreprise">Entreprise</label>
                                <input type="text" name="entreprise" value="{{ $stage->entreprise  }}" id="entreprise" class="form-control  @error('entreprise') is-invalid @enderror" required>
                                @error('entreprise')
                                <small>
                                    {{ $message }}  
                                </small> 
                               @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="secteur">Secteur Activité</label>
                                <input type="text" class="form-control" value="{{ $stage->secteur_activite }} @error('secteur') is-invalid @enderror" name="secteur" id="secteur" required>
                                @error('entreprise')
                                <small>{{ $message }}  </small> 
                               @enderror
                            </div> 
                            <div class="d-flex justify-content-between">
                            <div class="form-group mt-2 col-8">
                                <label for="lieu_stage">Lieu Stage</label>
                                <input type="text" name="lieu_stage" value="{{ $stage->lieu }}" id="lieu_stage" class="form-control @error('lieu_stage') is-invalid @enderror" required>
                                @error('lieu_stage')
                                <small>{{ $message }}  </small> 
                               @enderror
                            </div>
                            <div class="form-group mt-2 col-4">
                                <label for="code_postal">Code Postal</label>
                                <input type="number" name="code_postal" value="{{ $stage->cp }}" id="code_postal" class="form-control @error('code_postal') is-invalid @enderror" required>
                                @error('code_postal')
                                <small>{{ $message }}  </small> 
                               @enderror
                            </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="form-group mt-2">
                                    <label for="debut_stage">Début Stage</label>
                                    <input type="date" name="debut_stage" value="{{ $stage->date_debut }}" id="debut_stage" class="form-control @error('debut_stage') is-invalid @enderror" required> 
                                    @error('debut_stage')
                                    <small>{{ $message }}  </small> 
                                   @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <label for="fin_stage">Fin Stage</label>
                                    <input type="date" name="fin_stage" value="{{ $stage->date_fin }}" id="fin_stage" class="form-control @error('fin_stage') is-invalid @enderror" required>
                                    @error('fin_stage')
                                    <small>{{ $message }}  </small> 
                                   @enderror
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="theme_stage">Theme Stage</label>
                                <input type="text" name="theme_stage" value="{{ $stage->theme  }}" id="theme_stage" class="form-control @error('theme_stage') is-invalid @enderror" required>
                                @error('theme_stage')
                                <small>{{ $message }}  </small> 
                               @enderror
                            </div>
                        </fieldset>
                        </div>
                        <div class="col-6">
                            <fieldset>
                                <legend>Tuteur</legend>
                            <div class="form-group mt-2">
                                <label for="tuteur">Nom Prenom Tuteur</label>
                                <input type="text" name="tuteur" id="tuteur" value="{{ $stage->tuteur_entreprise  }}" class="form-control @error('tuteur') is-invalid @enderror" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="tuteur_email">Email Tuteur</label>
                                <input type="email" name="tuteur_email" value="{{ $stage->tuteur_entreprise_email }}" id="tuteur_email" class="form-control @error('tuteur_email') is-invalid @enderror" required>
                                @error('tuteur_email')
                                <small>{{ $message }}  </small> 
                               @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="telephone">Télephone Tuteur</label>
                                <input type="number" name="telephone" value="{{  $stage->tuteur_entreprise_tel }}" id="telephone" class="form-control @error('telephone') is-invalid @enderror" required>
                                @error('telephone')
                                <small>{{ $message }}  </small> 
                               @enderror
                            </div>
                        </fieldset>
                            <fieldset>
                                <legend>Choix des encadreurs</legend>
                                <div class="form-group">
                                    <label for="voeu1" class="d-block">Choix 1</label>
                                    <select name="voeu1" id="voeu1" class="form-control  @error('voeu1') is-invalid @enderror">
                                        <option value="1" @if($stage->voeux_ens1 == 1) selected  @endif> Mr ALui DJALO Informatique</option>
                                        <option value="2" @if( $stage->voeux_ens1 == 2) selected  @endif> Mr Cheikhou DIOKOU Mathematiques </option>
                                        <option value="3" @if($stage->voeux_ens1 == 3) selected  @endif> Mme DAbo Ndiaye Langes </option>
                                    </select>
                                    @error('voeu1')
                                    <small>{{ $message }}  </small> 
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="voeu2" class="d-block">Choix 2</label>
                                    <select name="voeu2" id="voeu2" class="form-control  @error('voeu2') is-invalid @enderror">
                                        <option value="1" @if($stage->voeux_ens2 == 1) selected  @endif> Mr ALui DJALO Informatique</option>
                                        <option value="2" @if( $stage->voeux_ens2 == 2) selected  @endif> Mr Cheikhou DIOKOU Mathematiques </option>
                                        <option value="3"  @if($stage->voeux_ens2 == 3) selected  @endif> Mme DAbo Ndiaye Langes </option>
                                    </select>
                                    @error('voeu2')
                                    <small>{{ $message }}  </small> 
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="voeu3" class="d-block">Choix 2</label>
                                    <select name="voeu3" id="voeu3" class="form-control  @error('voeu3') is-invalid @enderror">
                                        <option value="1" @if($stage->voeux_ens3 == 1) selected  @endif> Mr ALui DJALO Informatique</option>
                                        <option value="2"  @if( $stage->voeux_ens3 == 2) selected  @endif> Mr Cheikhou DIOKOU Mathematiques </option>
                                        <option value="3" @if($stage->voeux_ens3 == 3) selected  @endif> Mme DAbo Ndiaye Langes </option>
                                    </select>
                                    @error('voeu3')
                                    <small>{{ $message }}  </small> 
                                    @enderror
                                </div>
                            </fieldset>
            
                        </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-info"> Soumettrre </button>
                                <button type="reset" class="btn btn-danger"> Annuler </button>
                            </div>
                        </form>
                </div>
            <!-- ALERT DE SUCCESS -->
            @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success')}}</p>
            </div>
            @endif
             <hr class="featurette-divider">


</div>
@endsection