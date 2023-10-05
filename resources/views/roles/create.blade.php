@extends('layouts.template')
@section('page_title', 'ECOM | Add Category')
@section('role', 'active')
@section('content')
<div class="mt-6 shadow-lg p-4">
    <h3 class="mt-4">Rôles</h3>
    <p class="text-700">Création de nouveau rôle</p>
    <hr>
    <div class="row g-4">
        <div class="col-12 col-xl-10 order-1 order-xl-0">
            <form class="g-3" action="{{ route('roles.store') }}" method="POST" novalidate="">
                @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label col-form-label-sm" for="nom_role">Libellé</label>
                <div class="col-sm-10">
                <input class="form-control @error('nom_role') is-invalid @enderror" id="nom_role" name="nom_role" type="text" placeholder="Nom du role" value="{{ old('nom_role') }}" />
                @error('nom_role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label col-form-label-sm" for="nom_role">Permission</label>
                <div class="col-sm-10">
                    <div class="row">
                        @foreach ($permissions as $permission )
                        <div class="col-lg-4">
                            <div class="form-check">
                                <input class="form-check-input" id="{{ $permission->id }}" name="permission[]" type="checkbox" value="{{ $permission->id }}" />
                                <label class="form-check-label" for="{{ $permission->id }}">{{ $permission->nom_permission }}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @error('nom_role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <hr>
            <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
            <a class="btn btn-outline-primary btn-sm" href="{{ route('roles.index') }}">Fermer</a>
            </form>
        </div>

    </div>
</div>
@endsection
