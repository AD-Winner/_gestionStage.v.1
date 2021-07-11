@extends('layouts.user')

@section('content')
<div class="container p-5">
<!--
<div class="row justify-content-center">
        <div class="col">
           
                        <select name="secteur_id" disabled="" id="secteur_id" class="form-control-sm secteur">
                                    @foreach($regions as $region)                              
                                        <option <?=  Auth::user()->region_id==$region->id ? 'selected' : '' ?> value="{{$region->id}}"> {{$region->region}} </option>            
                                    @endforeach
                        </select>
        
        </div>
        <div class="col">
            
                        <select name="" id="" disabled="" class="form-control-sm secteur">
                                    @foreach($cercles as $cercle)                              
                                        <option <?=  Auth::user()->cercle_id==$cercle->id ? 'selected' : '' ?> value="{{$cercle->id}}"> {{$cercle->cercle}} </option>            
                                        @endforeach
                        </select>
         
        </div>
        <div class="col">
           
                        <select name="secteur_id" disabled="" id="secteur_id" class="form-control-sm secteur">
                                    <option value="">..selectionner le secteur...</option>
                                    @foreach($secteurs as $secteur)                              
                                        <option <?=  Auth::user()->secteur_id==$secteur->id ? 'selected' : '' ?> value="{{$secteur->id}}"> {{$secteur->secteur}} </option>            
                                        @endforeach
                        </select>
          
        </div>

</div>
-->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark ">
                <div class="card-header  bg-white">{{ __('MENU ACCEUIL') }}
                    <br/>Region : {{$userR[0]->region}}, {{$userC[0]->cercle}}, Secteur: {{$userS[0]->secteur}}
                </div>
    <div class="row rows-cols-4 p-2 my-2">
            <div class="col ml-4">
                <a href=" {{route('rb-index')}} " class="btn btn-outline-warning my-2 ml-3" >Resultat</a>
                <a href="{{route('rb-statistique')}}" class="btn btn-outline-warning my-2" >Statistiques</a>
                <a href="{{route('rb-gRapport')}}" class="btn btn-outline-warning my-2" >Gerer les rapports</a>
                <a href="" class="btn btn-outline-success my-2" >Apropos</a>
            </div>
    </div>
          
                <div class="card-body text-black tela ml-5 mr-4 py-2">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('BIENVENUE') }}
                     <br/>
                </div>
            <hr class="featurette-divider bg-light p-0 m-0">
            <div class="row ml-5 text-white">
                Gestion D'Election :: Developped by : Aliu Djalo {{date('Y') }}                 
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
