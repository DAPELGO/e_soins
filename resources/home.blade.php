@extends('layouts.template')
@section('page_title', 'ECOM')
@section('content')
    <div class="pb-1">
      <div class="row g-1">
        <div class="ps-0 pe-0 ">
            <div class="mb-1">
                <div>
                    <div class="text-dark bg-light p-4 pt-2">
                        <div class="row gx-6">
                            <div class="col-12 col-xl-12">
                              <div class="mb-2 mt-1">
                                <h3>Évolution des consultations</h3>
                                <p class="text-700 mb-0">Valeurs des produits de consultation</p>
                              </div>
                            </div>
                        </div>
                            <div class="">
                                <div class="card-body p-0">
                                    <div class="row g-4 g-xl-1 g-xxl-3">
                                      <div class="col-sm-3">
                                        <div class="d-sm-block d-inline-flex d-md-flex flex-xl-column flex-xxl-row align-items-center align-items-xl-start align-items-xxl-center bg-white mt-1 p-3 pb-1" style="min-height: 6rem;">
                                          <div>
                                            <p class="mb-1">Total des actes</p>
                                            <hr>
                                            <h4 class="fw-bolder text-nowrap">0.00 FCFA</h4>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-sm-3">
                                        <div class="d-sm-block d-inline-flex d-md-flex flex-xl-column flex-xxl-row align-items-center align-items-xl-start align-items-xxl-center bg-white ms-2 mt-1 p-3 pb-1" style="min-height: 6rem;">
                                            <div>
                                              <p class="mb-1">Total des équipements</p>
                                              <hr>
                                              <h4 class="fw-bolder text-nowrap">0.00 FCFA</h4>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="col-sm-3">
                                        <div class="d-sm-block d-inline-flex d-md-flex flex-xl-column flex-xxl-row align-items-center align-items-xl-start align-items-xxl-center bg-white ms-2 mt-1 p-3 pb-1" style="min-height: 6rem;">
                                            <div>
                                              <p class="mb-1">Total des médicaments</p>
                                              <hr>
                                              <h4 class="fw-bolder text-nowrap">0.00 FCFA</h4>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="col-sm-3">
                                        <div class="d-sm-block d-inline-flex d-md-flex flex-xl-column flex-xxl-row align-items-center align-items-xl-start align-items-xxl-center bg-white ms-2 mt-1 p-3 pb-1" style="min-height: 6rem;">
                                            <div>
                                              <p class="mb-1">Total des évacuations</p>
                                              <hr>
                                              <h4 class="fw-bolder text-nowrap">0.00 FCFA</h4>
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-200 p-2">
            <div id="map" style="width: 100%; height:34rem; border: 5px solid #FFF;">

            </div>
        </div>

    </div>
@endsection
