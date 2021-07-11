@extends('layouts.admin')
@section('content')
<div class="container">
<!--
    <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h1>Bureaux  de vote</h1>
                </div>
                <div class="col-sm-12 col-md-6">
                <a href="{{ route('bureau-index') }}" class="btn btn-md btn-success float-right"> <i class="fas fa-user-plus"></i>+</a>
                </div>
    </div>
-->
    <div class="row justifu-contetent-center ml-10">
        <div class="col-sm-0 col-md-6">
            <h1>Les utilisateurs</h1>
        </div>
        <div class="col-sm-12 col-md-6">
            <form class="form-inline mt-2 mt-md-0">
                <div class="input-group mb-0 mt-0"> 
                        <input class="form-control mr-sm-0" type="text" name="p"  value="{{$p}}" placeholder="Recherche.." aria-label="Pequisar">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                        <a href="{{ route('user-index') }}" class="btn btn-outline-danger">Annuler</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="AjouterCandidatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <!--Titre de modal-->
                    <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un Candidat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Corp de Modal-->
                <form  method="POST" action="{{ route('candidat-store')}}" >
                @csrf
                    <div class="modal-body">   
                        <!--LIBELLE prenom Candidat -->                     
                         <div class="form-group">
                            <label for="cod_candidat">Abrev Candidat :</label>
                             <input type="text" class="form-control" id="cod_candidat" max="20"  require
                             min="1" name="cod_candidat"  placeholder="Saisir abrev candidat..." />
                        </div>  
                        <!--LIBELLE prenom Candidat -->                     
                         <div class="form-group">
                            <label for="prenom">Prénom :</label>
                             <input type="text" class="form-control" id="prenom" max="50"  require
                             min="2" name="prenom"  placeholder="Saisir Prénom Candidat..." />
                        </div>  
                        <!--LIBELLE Nom Candidat -->                       
                         <div class="form-group">
                            <label for="nom">Nom :</label>
                             <input type="text" class="form-control" id="nom" max="20"  require
                             min="1" name="nom"  placeholder="Saisir Nom Candidat..." />
                        </div>      
                        <!--LIBELLE Sexe Candidat -->                   
                         <div class="form-group">
                            <label for="sexe">Sexe :</label>
                             <input type="text" class="form-control" id="sexe" max="10"  require
                             min="1" name="sexe"  placeholder="Saisir sexe.." />
                        </div>     
                        <!--LIBELLE Date Naissace Candidat -->                 
                         <div class="form-group">
                            <label for="dateNaissance">Date Naissance:</label>
                             <input type="date" class="form-control" id="dateNaissance"  require
                              name="dateNaissance"  placeholder="Saisir date naissance candidat..." />
                        </div>                      
                        
                                       
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
                         <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--FIN DE MODAL D'AJOUT DE REGION-->
    
    <!--DEBUT DE MODAL DE MODIFICATION DE REGION-->
                        <div class="modal fade" id="ModifierCercleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <!--Titre de modal-->
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modifier la cercle</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- Corp de Modal-->
                                    <form  method="POST" action="" >
                                    @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="cod_cercle">Code:</label>
                                                <input type="number" min="1" max="10" class="form-control"  value="" placeholder="Code de région" name="cod_cercle" id="rcode">
                                            </div>
                                            <div class="form-group">
                                                <label for="rname">Région:</label>
                                                <input type="text" class="form-control" id="rname" max="20" min="3" value=""  name="rname"  placeholder="Nom de région" />
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
                                            <button type="submit" class="btn btn-primary">Ajouter</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--FIN DE MODAL DE MODIFICATION DE REGION-->


   
    <div class="row bg-white pt-3 mt-1">
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

            <!-- ALERT DE SUCCESS -->
            @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success')}}</p>
            </div>
            @endif
             <hr class="featurette-divider">
             <!--Button Ajouter et de PDF -->
             <div class="float-right">
                    <!-- Botton de la modal d'ajout de Bureaux-->
                    <!--
                    <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#AjouterCandidatModal">
                        <i class="fas fa-plus"></i> Ajouter
                    </button>  
                    -->
                    <a class="btn btn-sm btn-outline-secondary " href=" {{route('user-create')}}"><i class="fas fa-plus"></i> Ajouter </a>                    
                    <!--Button de PDF-->  
                    <a class="btn btn-sm btn-outline-secondary " href=" {{route('candidat-print')}}"><i class="fas fa-print"></i> PDF </a>                    
             </div>
             <div class="col-sm-12 col-md-6">
               <h4> Total <strong> {{ $tot }} </strong> utilisateurs   </h4>  Connecté: {{ Auth::user()->name}} Profil: {{ Auth::user()->profil}}
             </div>               
            <hr class="featurette-divider">
        </div>
        <div class="col-12">
        <!--Table des données -->
            <div class="table-responsive">
                <table class="table table-striped table-sm table-hover">
                        <thead class="table-dark">
                            <tr>                              
                                <th>ID</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Profil</th>
                                <th>Region</th>                                                                                                                     
                                <th>Cercle</th>                                                                                                                     
                                <th>Secteur</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>                                                 
                                <td> {{$user->id}} </td>
                                <td> {{$user->name}} </td>
                                <td> {{$user->email}} </td>
                                <td> {{$user->profil}} </td>
                                <td> {{$user->region_id}} </td>
                                <td> {{$user->cercle_id}} </td>
                                <td> {{$user->secteur_id}} </td>                                                    
                                <td class='d-flex'>
                                <a href=" {{route('user-edit',['id'=>$user->id])}} "  class="btn btn-sm btn-info mr-2"> <i class="fas fa-edit"></i> Modifier</a>                                   
                                    <form action=" {{ route('user-destroy', ['id'=>$user->id])}} 
                                    "method="post" onsubmit=" return confirm('Suppression de enregistrement! Êtes-vous sûr?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Supprimer</button> <!--<i class="fa fa-trash"></i>-->
                                    </form>          
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                </table>
                <div class="float-right">
                        {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>



</div>

@endsection