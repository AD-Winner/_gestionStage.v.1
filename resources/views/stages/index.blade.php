@extends('layouts.etudiant')
@section('content')
<div class='container'>

    <div class="row justifu-contetent-center ml-10">
        <div class="col-sm-0 col-md-6">
                <h4>{{$total}} Stages enregistrés</h4>
                <strong> </strong>
        </div>                          
            <hr class="featurette-divider">
        </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-sm table-hover ">
                        <thead class="table-dark">
                            <tr>
                                <th>id</th>
                                <th>Entreprise</th>
                                <!--<th>Secteur_Activité</th>-->
                                <th>Lieu</th>
                              <!--  <th>Theme_Stage</th>                      -->
                                <th>Tuteur_stage</th>                          
                                <th>Tel_Tuteur</th>                          
                                <th>Email_Tuteur</th>                          
                                <th>Debut_stage</th>                          
                                <th>Fin__stage</th>                          
                                <th>Fiche</th>                                                                            
                                <th>Actions</th>                          
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($stages as $stage)
                                <tr>
                                    <td>{{$stage->id}}</td>   
 
                                    <td>{{$stage->entreprise}}</td>   
                                    <!--<td>{{$stage->secteur_activite}}</td>   -->
                                    <td>{{$stage->lieu}}</td>  
                                    <!-- 
                                    <td>{{$stage->theme}}</td>   
                                    -->
                                    <td>{{$stage->tuteur_entreprise}}</td>   
                                    <td>{{$stage->tuteur_entreprise_tel}}</td>   
                                    <td>{{$stage->tuteur_entreprise_email}}</td>   
                                    <td>{{$stage->date_debut}}</td>   
                                    <td>{{$stage->date_fin}}</td>   
                                    <td>{{$stage->fiche}}</td>    
                                    
                                     <td class='d-flex'>
                                        <a href="{{ route('stage-show', ['id'=>$stage->id])}}" class="btn btn-sm btn-info mr-2 text-white"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('stage-edit', ['id'=>$stage->id])}}" class="btn btn-sm btn-primary mr-2"><i class="fas fa-edit"></i></a>
                                        <form action=" {{ route('stage-destroy', ['id'=>$stage->id])}} 
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
                        <!--{{ $stages->links() }}-->
                    </div>
                </div>
            </div>
        </div>

</div>
@endsection