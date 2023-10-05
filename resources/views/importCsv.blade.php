@extends('layouts.template')
@section('page_title', 'ECOM | Add Category')
@section('creancedette', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="panel-title">CAHIER DES CRÉANCES ET DES DETTES </h3>
    <div class="panel" style="padding-top: 0; padding-bottom: 0;">
        <form class="g-3" action="{{ route('import.data') }}" method="POST" novalidate="" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label class="form-label" for="file_import">Importer (<span class="text-danger">*</span>)</label>
                <input type="file" class="form-control" id="file_import" name="file_import" placeholder="Code">
                  {!! $errors->first('file_import', '<p class="text-danger msg-error">:message</p>') !!}
            </div>
            <button class="btn btn-primary btn-sm" type="submit">Uploader</button>
            <a class="btn btn-outline-primary btn-sm" href="{{ route('home') }}">Fermer</a>
        </form>
</div>
</div>
</div>
@endsection
