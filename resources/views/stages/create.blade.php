
@extends('layouts.etudiant')
@section('content')

    <div class="container">
        {{-- <h2>Zone de Dépot </h2> --}}
        <div class="col-12 mx-auto">
            <form action="{{route('stage-store')}}" method="post" enctype="multipart/form-data" class="row d-flex flex-row align-items-center">
            @csrf
            <div class="col-6">
                <fieldset>
                    <legend>Stage</legend>
                <div class="form-group">
                    <label for="fiche">Fiche de renseignement </label>
                    <input type="file" class="form-control @error('fiche') is-invalid @enderror" name="fiche" accept=".pdf,.docx,.doc" required>
                    @error('fiche')
                     {{ $message }}   
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="entreprise">Entreprise</label>
                    <input type="text" name="entreprise" value="{{ old('entreprise') }}" id="entreprise" class="form-control  @error('entreprise') is-invalid @enderror" required>
                    @error('entreprise')
                    <small>
                        {{ $message }}  
                    </small> 
                   @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="secteur">Secteur Activité</label>
                    <input type="text" class="form-control" value="{{ old('secteur') }} @error('secteur') is-invalid @enderror" name="secteur" id="secteur" required>
                    @error('entreprise')
                    <small>{{ $message }}  </small> 
                   @enderror
                </div> 
                <!-- <div class="d-flex justify-content-between"> -->
                <div class="form-group mt-2">
                    <label for="lieu_stage">Lieu Stage</label>
                    <input type="text" name="lieu_stage" value="{{ old('lieu_stage') }}" id="lieu_stage" class="form-control @error('lieu_stage') is-invalid @enderror" required>
                    @error('lieu_stage')
                    <small>{{ $message }}  </small> 
                   @enderror
                </div>
                <!-- <div class="form-group mt-2 col-4">
                    <label for="code_postal">Code Postal</label>
                    <input type="number" name="code_postal" value="{{ old('code_postal') }}" id="code_postal" class="form-control @error('code_postal') is-invalid @enderror" required>
                    @error('code_postal')
                    <small>{{ $message }}  </small> 
                   @enderror
                </div> -->
                <!-- </div> -->
                <div class="d-flex justify-content-between">
                    <div class="form-group mt-2">
                        <label for="debut_stage">Début Stage</label>
                        <input type="date" name="debut_stage" value="{{ old('debut_stage') }}" id="debut_stage" class="form-control @error('debut_stage') is-invalid @enderror" required> 
                        @error('debut_stage')
                        <small>{{ $message }}  </small> 
                       @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="fin_stage">Fin Stage</label>
                        <input type="date" name="fin_stage" value="{{ old('fin_stage') }}" id="fin_stage" class="form-control @error('fin_stage') is-invalid @enderror" required>
                        @error('fin_stage')
                        <small>{{ $message }}  </small> 
                       @enderror
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="theme_stage">Theme Stage</label>
                    <input type="text" name="theme_stage" value="{{ old('theme_stage') }}" id="theme_stage" class="form-control @error('theme_stage') is-invalid @enderror" required>
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
                    <input type="text" name="tuteur" id="tuteur" value="{{ old('tuteur') }}" class="form-control @error('tuteur') is-invalid @enderror" required>
                </div>
                <div class="form-group mt-2">
                    <label for="tuteur_entreprise_email">Email Tuteur</label>
                    <input type="email" name="tuteur_entreprise_email" value="{{ old('tuteur_entreprise_email') }}" id="tuteur_entreprise_email" class="form-control @error('tuteur_entreprise_email') is-invalid @enderror" required>
                    @error('tuteur_entreprise_email')
                    <small>{{ $message }}  </small> 
                   @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="telephone">Télephone Tuteur</label>
                    <input type="number" name="telephone" value="{{ old('telephone') }}" id="telephone" class="form-control @error('telephone') is-invalid @enderror" required>
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
                            <option>Selec Maitre 1</option>
                                @foreach($enseignants as $responsable)
                                <option value="{{$responsable->id}}" @if( old('voeu3') == "1" ) selected @endif> {{$responsable->matricule}} {{$responsable->nom}}</option>
                                @endforeach
                            <!-- <option value="1" @if( old('voeu1') == "1" ) selected @endif> Mr ALui DJALO Informatique</option>
                            <option value="2" @if( old('voeu1') == "2" )  selected @endif> Mr Cheikhou DIOKOU Mathematiques </option>
                            <option value="3" @if( old('voeu1') == "3" ) selected @endif> Mme DAbo Ndiaye Langes </option> -->
                        </select>
                        @error('voeu1')
                        <small>{{ $message }}  </small> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="voeu2" class="d-block">Choix 2</label>
                        <select name="voeu2" id="voeu2" class="form-control  @error('voeu2') is-invalid @enderror">
                        <option>Selec Maitre 2</option>
                            @foreach($enseignants as $responsable)
                                <option value="{{$responsable->id}}" @if( old('voeu3') == "1" ) selected @endif> {{$responsable->matricule}} {{$responsable->nom}}</option>
                            @endforeach
                            <!-- <option value="1" @if( old('voeu2') == "1" ) selected @endif> Mr ALui DJALO Informatique</option>
                            <option value="2" @if( old('voeu2') == "2" ) selected @endif> Mr Cheikhou DIOKOU Mathematiques </option>
                            <option value="3" @if( old('voeu2') == "3" ) selected @endif> Mme DAbo Ndiaye Langes </option> -->
                        </select>
                        @error('voeu2')
                        <small>{{ $message }}  </small> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="voeu3" class="d-block">Choix 2</label>
                        <select name="voeu3" id="voeu3" class="form-control  @error('voeu3') is-invalid @enderror">
                        <option>Selec Maitre 3</option>
                        @foreach($enseignants as $responsable)
                            <option value="{{$responsable->id}}" @if( old('voeu3') == "1" ) selected @endif> {{$responsable->matricule}} {{$responsable->nom}}</option>
                        @endforeach
                            <!-- <option value="1" @if( old('voeu3') == "1" ) selected @endif> Mr ALui DJALO Informatique</option>
                            <option value="2" @if( old('voeu3') == "2" ) selected @endif> Mr Cheikhou DIOKOU Mathematiques </option>
                            <option value="3" @if( old('voeu3') == "3" ) selected @endif> Mme DAbo Ndiaye Langes </option> -->
                        </select>
                        @error('voeu3')
                        <small>{{ $message }}  </small> 
                        @enderror
                    </div>
                </fieldset>

            </div>
                <div class="mt-4 d-flex col-6 mx-auto justify-content-between">
                    <button type="reset" class="btn btn-danger" > <i class="fa fa-trash"></i> Annuler </button>
                    <button type="submit" class="btn btn-info text-white"> <i class="fa fa-save"></i> Sauvegarder </button>
                </div>
            </form>
        </div>
        </div>
    </div>

@endsection
    