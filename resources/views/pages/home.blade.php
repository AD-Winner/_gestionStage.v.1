@extends('layouts.etudiant')
@section('content')
<div class="container mt-4">
    <div class="row  d-flex jusify-content-between align-items-center">
        <div class="col-lg-6">
            <h4>Stages: Informations Pratiques </h4>
            <ul class=" list-group-flush">
                <li class="list-group-item">info 1 : Lorem ipsum dolor sit amet.</li>
                <li class="list-group-item">info 2 : Lorem ipsum dolor sit amet consectetur.</li>
                <li class="list-group-item">info 3 : Lorem ipsum dolor sit.</li>
                <li class="list-group-item">info 4 : Lorem, ipsum dolor sit amet consectetur adipisicing.</li>
                <li class="list-group-item">info 5 : Lorem, ipsum dolor.</li>
            </ul>
            <h4>CV : Competences Master </h4>
            <ul class=" list-group-flush">
                <li class="list-group-item">competence 1 : Lorem ipsum dolor sit amet.</li>
                <li class="list-group-item">competence 2 : Lorem ipsum dolor sit amet consectetur.</li>
                <li class="list-group-item">competence 3 : Lorem ipsum dolor sit.</li>
            </ul>
            <h4><a href="{{ public_path('fichiers/fiche.doc') }}" class="nav-link mav-item">Telechargement Fiche de renseignement vierge </a></h4>
            <h4><a href="#" class="nav-link mav-item">Telechargement Fiche de renseignement signée </a></h4>
        </div>
        <div class="col-lg-4">
            <iframe width="555" height="555" src="https://www.youtube.com/embed/dbT-oFIIJLs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>        </div>
    </div>
</div>

@endsection