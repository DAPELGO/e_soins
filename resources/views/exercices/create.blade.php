@extends('layouts.template')
@section('page_title', 'ECOM | Add Category')
@section('exercice', 'active')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <h4 class="panel-title">LES EXERCICES</h4>
        <div class="panel">
            <div class="my-4">
                <div class="row g-4">
                    <div class="col-12 col-xl-12 order-1 order-xl-0">
                        <form class="g-3" action="{{ route('exercices.store') }}" method="POST" novalidate="">
                            @csrf
                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label col-form-label-sm" for="libelle">Libellé</label>
                        <div class="col-sm-10">
                            <input class="form-control @error('libelle') is-invalid @enderror" id="libelle" name="libelle" type="text" placeholder="2022" value="{{ old('libelle') }}" />
                            @error('libelle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label col-form-label-sm" for="date_debut">Date Début</label>
                            <div class="col-sm-10">
                            <input class="form-control @error('date_debut') is-invalid @enderror datetimepicker" id="date_debut" name="date_debut" type="text" placeholder="jj-mm-aaaa" value="{{ old('date_debut') }}" />
                            @error('date_debut')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label col-form-label-sm" for="date_fin">Date Fin</label>
                            <div class="col-sm-10">
                            <input class="form-control @error('date_fin') is-invalid @enderror datetimepicker" id="date_fin" name="date_fin" type="text" placeholder="jj-mm-aaaa" value="{{ old('date_fin') }}" />
                            @error('date_fin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('exercices.index') }}">Fermer</a>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
