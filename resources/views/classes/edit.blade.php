
@extends('layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h1>Modifier le parcours</h1>
            </div>
            <div class="col-sm-12 col-md-6">
               <a href=" {{ route('classe-index')}} " class="btn btn-md btn-primary float-right">Retour</a>
            </div>
            </div>

            <div class="row bg-white pt-3 mt-2 ">
                <div class="col-sm-12">
                    <h5>Informez les infos de Parcours :</h5>
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
                    <form action="{{ route('classe-update', ['id'=>$classe->id])}}" method="POST">                
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group ml-3 mr-3">
                            <label for="nom">Nom parcours:</label>
                            <input type="text" id="nom" name="nom" required class="form-control" value="{{$classe->nom}}" placeholder="Parcours..."/>
                        </div>
                        <div class="form-group ml-3 mr-3">
                            <label for="annee">Année:</label>
                            <input type="text" id="annee" name="annee" required class="form-control" value="{{$classe->annee}}"placeholder="Année exp. 2021-2022..."/>
                        </div>

                        <div class="form-group ml-3 mr-3">
                            <label for="niveau">Niveau:</label>
                            <input type="text" id="niveau" name="niveau" required class="form-control" value="{{ $classe->niveau}}" placeholder="Niveau..."/>
                        </div>
                        <div class="form-group ml-3 mr-3">
                            <label for="enseignant_id">Responsable de parcours:</label>                            
                                <select name="enseignant_id" id="enseignant_id" class="form-control" required>
                                    <option>selectionner le responsable de parcours ...</option>
                                    @foreach($enseignants as $prof))
                                    <!-- 
                                        On verifie se l'ID de responsable sur table classes(parcours) est égal à 
                                        l'ID de prof(enseignant/responsable) sur table enseignants/responsables
                                        Si Oui, on on prend le valeur de l'ID et on affiche la matricule,prennom et nom de responsable
                                      -->
                                    <option <?= $classe->enseignant_id==$prof->id ? 'selected' : '' ?> value="{{ $prof->id }} "> {{ $prof->matricule }} {{ $prof->prenom }} {{ $prof->nom }} </option>
                                    @endforeach
                        </select>
                        </div>
                      
                        <div class="form-group float-left mt-2 ml-3">
                        <!-- Boutton de mise jour de parcours -->
                        <button type="submit" class="btn btn-md btn-primary" >Mettre à jour</button>
                        </div>

                    </form>
                </div>
            
            </div>

       
    </div><!--Fin de Container-->
@endsection