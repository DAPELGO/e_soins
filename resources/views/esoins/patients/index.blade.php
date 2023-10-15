@extends('layouts.template')
@section('page_title', 'ECOM | All structure')
@section('consultation', 'active')
@section('content')
<div class="mb-4 mt-1">
    <h4 style="padding: 0.4rem 0 0.4rem 1rem; background-color: #004ebc; color: white !important; font-size: 0.8rem;">SELECTIONNER UN PATIENT POUR LA CONSULTATION</h4>
</div>
<div id="products" data-list='{"valueNames":["product","price","category","tags","vendor","time"],"page":10,"pagination":true}'>
    <div class="mb-4">
      <div class="row g-3">
        <div class="col-auto">
          <div class="search-box">
              <input class="form-control search-input search" type="search" placeholder="Search products" aria-label="Search" />
              <span class="fas fa-search search-box-icon"></span>
          </div>
        </div>
        <div class="col-auto">
            <div class="d-flex align-items-center">
              <a href="{{ route('patients.create') }}" class="btn btn-outline-primary btn-sm" style="font-weight: 600;"><span class="fas fa-plus me-2"></span>Enregistrer un nouveau patient</a>
            </div>
          </div>
      </div>
    </div>
    <div class="bg-white border-top border-bottom border-200 position-relative top-1">
      <div class="table-responsive scrollbar mx-n1 px-1">
        <table class="table fs--1 mb-0">
          <thead>
            <tr>
              <th class="white-space-nowrap fs--1 align-middle ps-0" style="max-width:20px; width:18px;">
                <div class="form-check mb-0 fs-0">
                  <input class="form-check-input" id="checkbox-bulk-products-select" type="checkbox" data-bulk-select='{"body":"products-table-body"}' />
                </div>
              </th>
              <th class="" scope="col" style="width:40px;"></th>
              <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:150px;" data-sort="product">PATIENT</th>
              <th class="sort align-middle ps-4" scope="col" data-sort="price" style="width:50px;">ÂGE</th>
              <th class="sort align-middle ps-4" scope="col" data-sort="category" style="width:50px;">VILLAGE</th>
              <th class="sort align-middle ps-4" scope="col" data-sort="category" style="width:50px;">SEXE</th>
              <th class="sort align-middle ps-3" scope="col" data-sort="tags" style="width:50px;">MÈRE</th>
              <th class="sort align-middle ps-3" scope="col" data-sort="tags" style="width:50px;">ACTIONS</th>
            </tr>
          </thead>
          <tbody class="list" id="products-table-body">
            @foreach($patients as $patient)
            <tr class="position-static">
              <td class="fs--1 align-middle">
                <div class="form-check mb-0 fs-0">
                  <input class="form-check-input" type="checkbox"  name="product{{ $patient->id }}" id="product{{ $patient->id }}" data-bulk-select-row='{"product":"","price":"0.0","category":"appareil","tags":["Health",],"star":false}' value="{{ $patient->uid }}" onclick="selectProduct({{ $patient->id }});" />
                </div>
              </td>
              <td class="align-middle white-space-nowrap py-0">
                <div class="avatar avatar-m"><img class="rounded-circle avatar-placeholder" src="{{ asset('/assets/img/team/avatar.webp') }}" alt="">
                </div>
              </td>
              <td class="product align-middle ps-4"><a class="fw-semi-bold line-clamp-3 mb-0" href="#!">{{ $patient->name }}</a></td>
              <td class="price align-middle white-space-nowrap text-end fw-bold text-700 ps-4"><span class="badge badge-tag me-2 mb-2">{{ $patient->birth_date }}</span></td>
              <td class="category align-middle white-space-nowrap text-600 fs--1 ps-4 fw-semi-bold">{{ $patient->village }}</td>
              <td class="category align-middle white-space-nowrap text-600 fs--1 ps-4 fw-semi-bold">{{ $patient->sexe }}</td>
              <td class="tags align-middle review pb-2 ps-3">{{ $patient->mother }}</td>
              <td>
                <a href="{{ route('consultation.add', $patient->id) }}" class="btn btn-soft-primary btn-sm btn-actions"><span class="fs-1 fas fa-user-md"></span></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
