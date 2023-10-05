@extends('layouts.template')
@section('page_title', 'ECOM | Add Category')
@section('structure', 'active')
@section('content')
<div class="mt-6 shadow-lg p-4 ps-6">
    <h3>Structures</h3>
    <p class="text-700">Création de nouvelle structure</p>
    <hr>
    <div class="mt-4">
        <div class="row g-4">
            <div class="col-12 col-xl-8 order-1 order-xl-0">
                <form class="g-3 border p-4 rounded-2" action="{{ route('structures.store') }}" method="POST" novalidate="">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="id_typestructure">Type Structure</label>
                        <div class="col-sm-8">
                            <select class="form-select" id="id_typestructure" name="id_typestructure" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}' onchange="changeValue('id_typestructure', 'parent_id', 'structure');">
                                <option value="">Selectionner un type de structure ...</option>
                                @foreach($valeurs as $valeur)
                                    <option value="{{ $valeur->id }}">{{ $valeur->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                    <div class="row mb-3">
                      <label class="col-sm-4 col-form-label col-form-label-sm" for="parent_id">Structure Parente</label>
                      <div class="col-sm-8">
                        <select class="form-select" id="parent_id" name="parent_id" data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="">Selectionner une structure ...</option>
                          </select>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-4 col-form-label col-form-label-sm" for="nom_structure">Libellé</label>
                      <div class="col-sm-8">
                        <input class="form-control @error('nom_structure') is-invalid @enderror" id="nom_structure" name="nom_structure" type="text" placeholder="Nom de structure" value="{{ old('nom_structure') }}" />
                        @error('nom_structure')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label col-form-label-sm" for="description_structure">Description</label>
                        <div class="col-sm-8">
                        <textarea class="form-control  @error('description_structure') is-invalid @enderror" id="description_structure" name="description_structure" rows="6" placeholder="Description de structure">{{ old('description_structure') }}</textarea>
                        @error('description_structure')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                      </div>
                      <hr>
                    <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
                    <a href="{{ route('structures.index') }}" class="btn btn-outline-primary btn-sm">Fermer</a>
                  </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        alert(0);
    });
</script>
@endsection
