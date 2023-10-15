@extends('layouts.template')
@section('page_title', 'ECOM | Add Category')
@section('dispensation', 'active')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <h4 class="panel-title">NOUVELLE ORDONNACE</h4>
        <div class="panel">
            <div class="my-4">
                <div class="row g-4">
                    <div class="col-12 col-xl-12 order-1 order-xl-0">
                        <form class="g-3" action="{{ route('ordonnance.save') }}" method="POST" novalidate="">
                            @csrf
                            <input type="hidden" id="product" name="product">
                            <input type="hidden" id="quantity" name="quantity">
                            <input type="hidden" id="product_id_list" name="product_id_list">
                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label col-form-label-sm" for="numero">Numéro</label>
                        <div class="col-sm-10">
                            <input class="form-control @error('numero') is-invalid @enderror" id="numero" name="numero" type="text" placeholder="2022" value="{{ old('numero') }}" />
                            @error('numero')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label col-form-label-sm" for="date_dispensation">Date</label>
                            <div class="col-sm-10">
                            <input class="form-control @error('date_dispensation') is-invalid @enderror datetimepicker" id="date_dispensation" name="date_dispensation" type="text" placeholder="jj-mm-aaaa" value="{{ old('date_dispensation') ? date('d/m/Y') : old('date_dispensation') }}" />
                            @error('date_debut')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <label class="col-form-label col-form-label-sm">Sélectionner les médicaments</label>

                        <div>
                            <div id="products" data-list='{"valueNames":["product","price","category","tags","vendor","time"],"page":10,"pagination":true}'>
                                <div class="mb-4">
                                  <div class="row g-3">
                                    <div class="col-auto col-6">
                                      <div class="search-box">
                                          <input class="form-control search-input search" type="search" placeholder="Search products" aria-label="Search" />
                                          <span class="fas fa-search search-box-icon"></span>
                                      </div>
                                    </div>
                                    <div class="col-auto col-6">
                                        <div class="total panel-title" style="padding: 0.1rem 1rem;"><span>MONTANT TOTAL : </span><strong class="badge badge-light-primary rounded-pill" id="total_account" style="font-size: 1.2rem;"></strong></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="bg-white border-top border-bottom border-200 position-relative top-1" style="height: 24rem; max-height: 24rem; overflow:scroll">
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
                                          <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:150px;" data-sort="product">PRODUIT</th>
                                          <th class="sort align-middle ps-4" scope="col" data-sort="price" style="width:50px;">QUANTITÉ</th>
                                          <th class="sort align-middle ps-4" scope="col" data-sort="category" style="width:50px;">PRIX</th>
                                          <th class="sort align-middle ps-3" scope="col" data-sort="tags" style="width:50px;">TOTAL</th>
                                        </tr>
                                      </thead>
                                      <tbody class="list" id="products-table-body">
                                        @foreach($nproducts as $nproduct)
                                        <tr class="position-static">
                                          <td class="fs--1 align-middle">
                                            <div class="form-check mb-0 fs-0">
                                              <input class="form-check-input" type="checkbox"  name="product{{ $nproduct->id }}" id="product{{ $nproduct->id }}" data-bulk-select-row='{"product":"","price":"0.0","category":"appareil","tags":["Health",],"star":false}' value="{{ $nproduct->uid }}" onclick="selectProduct({{ $nproduct->id }});" />
                                            </div>
                                          </td>
                                          <td class="align-middle white-space-nowrap py-0">
                                            <div class="border rounded-2"><img src="../../../assets/img/paracetam.png" alt="" width="53" /></div>
                                          </td>
                                          <td class="product align-middle ps-4"><a class="fw-semi-bold line-clamp-3 mb-0" href="#!">{{ $nproduct->name }}</a></td>
                                          <td class="price align-middle white-space-nowrap text-end fw-bold text-700 ps-4">
                                            <input class="form-control @error('quantity') is-invalid @enderror form-control-sm" id="quantity{{ $nproduct->id }}" name="quantity{{ $nproduct->id }}" type="number" value="{{ old('quantity') ? old('quantity') : 0 }}" style="width: 5rem;" disabled onclick="setPrice({{ $nproduct->id }});" onkeyup="setPrice({{ $nproduct->id }});" />
                                            @error('quantity')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                          </td>
                                          <td class="category align-middle white-space-nowrap text-600 fs--1 ps-4 fw-semi-bold"><span class="badge badge-tag me-2 mb-2" id="price{{ $nproduct->id }}">{{ $nproduct->drd_price }}</span></td>
                                          <td class="tags align-middle review pb-2 ps-3"><a class="text-decoration-none" href="#!"><span id="total{{ $nproduct->id }}" class="badge badge-tag me-2 mb-2">0.00</span></a>
                                          </td>
                                        </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <hr>
                        <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('app.consultation') }}">Fermer</a>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
