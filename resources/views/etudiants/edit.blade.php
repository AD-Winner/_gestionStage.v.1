
@extends('layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h4>Mise à jour des etudiants</h4>
            </div>
            <div class="col-sm-12 col-md-6">
               <a href=" {{ route('etudiant-index')}} " class="btn btn-md btn-primary float-right">Retour</a>
            </div>
            </div>

            <div class="row bg-white pt-3 mt-2 ">
                <div class="col-sm-12">
                    <h5>Informez les infos de l'etudiant:</h5>
                    <br/>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-sm-12">
                    <form action="{{ route('etudiant-update', ['id'=>$etudiant->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group ml-3 mr-3">
                            <label for="name">Matricule:</label>
                            <input type="text" id="matricule" name="matricule" required  value="{{$etudiant->matricule}}" class="form-control" placeholder="Matricule..."/>
                        </div>
                        <div class="form-group ml-3 mr-3">
                            <label for="name">Prenom:</label>
                            <input type="text" id="prenom" name="prenom" required  value="{{$etudiant->prenom}}" class="form-control" placeholder="Prenoms..."/>
                        </div>
                        <div class="form-group ml-3 mr-3">
                            <label for="name">Nom:</label>
                            <input type="text" id="nom" name="nom" required  value="{{$etudiant->nom}}" class="form-control" placeholder="Nom..."/>
                        </div>
                        <div class="form-group ml-3 mr-3">
                            <label for="name">Sexe:</label>
                            <input type="text" id="sexe" name="sexe" required  value="{{$etudiant->sexe}}" class="form-control" placeholder="Sexe..."/>
                        </div>
                        <div class="form-group ml-3 mr-3">
                            <label for="name">Code Postal:</label>
                            <input type="text" id="code_postal" name="code_postal"  value="{{$etudiant->code_postal}}" required class="form-control" 
                                placeholder="Code Postal..."/>
                        </div>
                        <div class="form-group ml-3 mr-3">
                            <label for="name">E-mail:</label>
                            <input type="email" id="email" name="email" required  value="{{$etudiant->email}}" class="form-control" placeholder="Adresse e-mail..."/>
                        </div>
                        <div class="form-group ml-3 mr-3">
                            <label for="name">Numero portable:</label>
                            <input type="text" id="portable" name="portable" required  value="{{$etudiant->portable}}" class="form-control" placeholder="Numero de portable..."/>
                        </div>
                        <div class="form-group ml-3 mr-3">
                            <label for="name">Adresse:</label>
                            <input type="text" id="adresse" name="adresse" required  value="{{$etudiant->adresse}}" class="form-control" placeholder="Adresse..."/>
                        </div>
                        <div class="form-group ml-3 mr-3">
                            <label for="classe_id">Parcours :</label>
                           
                                <select name="classe_id" id="classe_id" class="form-control" required>
                                    <option>selectionner le parcours ...</option>
                                    @foreach($classes as $parcours))                                    
                                    <option <?= $etudiant->classe_id==$parcours->id ? 'selected' : '' ?> value="{{ $parcours->id }} "> {{$parcours->nom}} {{ $parcours->annee }} {{ $parcours->niveau }} </option>
                                    @endforeach
                        </select>
                        </div>

                        <div class="form-group float-left mt-2 ml-3">
                        <button type="submit" class="btn btn-md btn-primary" >Mettre à jour</button>
                        </div>

                    </form>
                </div>
            
            </div>

       
    </div><!--Fin de Container-->
@endsection