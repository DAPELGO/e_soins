@extends('layouts.template')
@section('page_title', 'ECOM | Add Category')
@section('valeur', 'active')
@section('content')
<div class="mt-6 shadow-lg p-4 ps-6">
    <h3>Données paramètres</h3>
    <p class="text-700">Création de nouvelle valeur</p>
    <hr>
    <div class="row g-4">
        <div class="col-12 col-xl-8 order-1 order-xl-0">
            <form class="g-3 border p-4 rounded-2" action="{{ route('valeurs.store') }}" method="POST" novalidate="">
                @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label col-form-label-sm" for="id_parent">Paramètre</label>
              <div class="col-sm-10">
                <select class="form-select" id="parametre_id" name="parametre_id" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                    <option value="">Selectionner un paramètre ...</option>
                    @foreach($parametres as $parametre)
                        <option value="{{ $parametre->id }}">{{ $parametre->libelle }}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label col-form-label-sm" for="id_parent">Valeur Parente</label>
                <div class="col-sm-10">
                  <select class="form-select" id="id_parent" name="id_parent" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                      <option value="">Selectionner une valeur parente</option>
                      @foreach($valeurs as $valeur)
                          <option value="{{ $valeur->id }}">{{ $valeur->libelle }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label col-form-label-sm" for="nom_valeur">Libellé</label>
              <div class="col-sm-10">
                <input class="form-control @error('nom_valeur') is-invalid @enderror" id="nom_valeur" name="nom_valeur" type="text" placeholder="Nom du valeur" value="{{ old('nom_valeur') }}" />
                @error('nom_valeur')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <hr>
            <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
            <a class="btn btn-outline-primary btn-sm" href="{{ route('valeurs.index') }}">Fermer</a>
          </form>
        </div>
    </div>
</div>
@endsection
