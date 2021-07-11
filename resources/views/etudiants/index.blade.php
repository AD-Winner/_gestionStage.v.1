
@extends('layouts.template')
@section('content')
<div class='container'>
    <div class="row mb-4">
            <div class="col-sm-12 col-md-6">
               <a href="{{ route('admin-accueil') }}" class="btn btn-md btn-outline-secondary float-left">  <i class="fas fa-arrow-circle-left"></i> Retour</a>
            </div>
            <div class="col-sm-12 col-md-6">
            
            </div>
    </div>

    <div class="row justifu-contetent-center ml-10">
        <div class="col-sm-0 col-md-6">
                <h4>{{$total}} Etudiants enregistrés</h4>
                <strong> </strong>
        </div>
        <div class="col-sm-12 col-md-6">
            <form class="form-inline mt-2 mt-md-0">
                <div class="input-group mb-0 mt-0"> 
                        <input class="form-control mr-sm-0" type="text" name="p"  value="" placeholder="Rechercher..." aria-label="Recherche">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
                        <a href="" class="btn btn-outline-danger">Annuler</a>
                    </div>
                </div>
            </form>
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

            <!-- ALERT DE SUCCESS -->
            @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success')}}</p>
            </div>
            @endif
             <hr class="featurette-divider">
             <!--Button Ajouter et de PDF -->
             <div class="float-right mr-3">
                    <!-- Botton de la modal d'ajout de Bureaux-->
                    
        
                     <a href="{{route('etudiant-create')}}" class="btn btn-sm btn-outline-primary ml-3 mr-2 mb-3" > <i class="fas fa-plus"></i> Ajouter
                      
                    <!--Button de PDF-->  
                    <a class="btn btn-sm btn-outline-secondary mb-3 " href=""><i class="fas fa-print"></i> PDF </a>                    
             </div>
             <div class="col-sm-12 col-md-6">
             
                                        
            <hr class="featurette-divider">
        </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-sm table-hover ">
                        <thead class="table-dark">
                            <tr>
                                <!-- <th>id</th> -->
                                <th>Matricule</th>
                                <th>Prenom</th>
                                <th>Nom</th>
                                <th>Sexe</th>
                                <th>Tel</th>
                                <th>E-mail</th>
                                <th>CP</th>
                                <th>adresse</th>                          
                                <th>Actions</th>                          
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($etudiants as $etudiant)
                                <tr>
                                    <!-- <td>{{$etudiant->id}}</td>    -->
                                    <td>{{$etudiant->matricule}}</td>   
                                    <td>{{$etudiant->prenom}}</td>   
                                    <td>{{$etudiant->nom}}</td>   
                                    <td>{{$etudiant->sexe}}</td>   
                                    <td>{{$etudiant->adresse}}</td>   
                                    <td>{{$etudiant->portable}}</td>   
                                    <td>{{$etudiant->code_postal}}</td>   
                                    <td>{{$etudiant->adresse}}</td>   
                                     <td class='d-flex'>
                                        <a href="{{ route('etudiant-edit', ['id'=>$etudiant->id])}}" class="btn btn-sm btn-primary mr-2"><i class="fas fa-edit"></i></a>
                                        <form action=" {{ route('etudiant-destroy', ['id'=>$etudiant->id])}} 
                                        " method="post"
                                         onsubmit=" return confirm('Suppression! Êtes-vous sûr de le supprimer ?');">
                                        @csrf
                                        @method('DELETE')                
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button> <!--<i class="fa fa-trash"></i>-->
                                        </form>
                                     </td>
                                
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="float-right">
                        {{ $etudiants->links() }}
                    </div>
                </div>
            </div>
        </div>

</div>
@endsection