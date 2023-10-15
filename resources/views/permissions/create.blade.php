@extends('layouts.template')
@section('page_title', 'ECOM | Add Category')
@section('permission', 'active')
@section('content')
<div class="mt-6 shadow-lg p-4">
    <h3 class="mt-4">Permissions</h3>
    <p class="text-700">Création de nouvelle permission</p>
    <hr>
    <div class="row g-4">
        <div class="col-12 col-xl-8 order-1 order-xl-0">
            <form class="g-3" action="{{ route('permissions.store') }}" method="POST" novalidate="">
                @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label col-form-label-sm" for="nom_permission">Libellé</label>
              <div class="col-sm-10">
                <input class="form-control @error('nom_permission') is-invalid @enderror" id="nom_permission" name="nom_permission" type="text" placeholder="Nom du permission" value="{{ old('nom_permission') }}" />
                @error('nom_permission')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <hr>
            <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
            <a class="btn btn-outline-primary btn-sm" href="{{ route('permissions.index') }}">Fermer</a>
          </form>
        </div>
      </div>
</div>
@endsection
