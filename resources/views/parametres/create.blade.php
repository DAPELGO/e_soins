@extends('layouts.template')
@section('page_title', 'ECOM | Add Category')
@section('setting', 'active')
@section('content')
<div class="mt-6 shadow-lg p-4 ps-6">
    <h3>Données paramètres</h3>
    <p class="text-700">Création de nouveau paramètre</p>
    <hr>
    <div class="row g-4">
        <div class="col-12 col-xl-8 order-1 order-xl-0">
            <form class="g-3 border p-4 rounded-2" action="{{ route('parametres.store') }}" method="POST" novalidate="">
                @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label col-form-label-sm" for="parent_id">Parent</label>
                <div class="col-sm-10">
                <select class="form-select" id="parent_id" name="parent_id" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                    <option value="">Selectionner un paramètre ...</option>
                    @foreach($parametres as $parametre)
                        <option value="{{ $parametre->id }}">{{ $parametre->libelle }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label col-form-label-sm" for="nom_parametre">Libellé</label>
                <div class="col-sm-10">
                <input class="form-control form-control-sm @error('nom_parametre') is-invalid @enderror" id="nom_parametre" name="nom_parametre" type="text" placeholder="Nom du paramètre" value="{{ old('nom_parametre') }}" />
                @error('nom_parametre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <hr>
            <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
            <a class="btn btn-outline-primary btn-sm" href="{{ route('parametres.index') }}">Fermer</a>
            </form>
        </div>
    </div>

</div>
@endsection
