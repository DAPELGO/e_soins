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
                            <div class="col-12 col-xl-8">
                              <div class="mb-2 mt-1">
                                <h3>Évolution des soins gratuits</h3>
                                <p class="text-700 mb-0">Valeurs financières des biens et services</p>
                              </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="mb-2 mt-1">
                                    <div class="alert alert-soft-success" role="alert" id="org_unit_name" style="display: none;"></div>
                                </div>
                            </div>
                        </div>
                            <div class="">
                                <div class="card-body p-0">
                                    <div class="row g-4 g-xl-1 g-xxl-3">
                                      <div class="col-sm-3">
                                        <div class="d-sm-block d-inline-flex d-md-flex flex-xl-column flex-xxl-row align-items-center align-items-xl-start align-items-xxl-center bg-white mt-1 p-2 pb-1 ps-3" style="min-height: 5rem;">
                                          <div>
                                            <p class="mb-1">Médicaments et consommables médicaux</p>
                                            <hr style="margin: 0.5rem 0;">
                                            <h4 class="fw-bolder text-nowrap" id="total_med">En cours ...</h4>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-sm-3">
                                        <div class="d-sm-block d-inline-flex d-md-flex flex-xl-column flex-xxl-row align-items-center align-items-xl-start align-items-xxl-center bg-white ms-2 mt-1 p-2 pb-1 ps-3" style="min-height: 5rem;">
                                            <div>
                                              <p class="mb-1">Actes<br><br></p>
                                              <hr style="margin: 0.5rem 0;">
                                              <h4 class="fw-bolder text-nowrap" id="total_act">En cours ...</h4>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="col-sm-3">
                                        <div class="d-sm-block d-inline-flex d-md-flex flex-xl-column flex-xxl-row align-items-center align-items-xl-start align-items-xxl-center bg-white ms-2 mt-1 p-2 pb-1 ps-3" style="min-height: 5rem;">
                                            <div>
                                              <p class="mb-1">Examens complémentaires</p>
                                              <hr style="margin: 0.5rem 0;">
                                              <h4 class="fw-bolder text-nowrap" id="total_ex">En cours ...</h4>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="col-sm-3">
                                        <div class="d-sm-block d-inline-flex d-md-flex flex-xl-column flex-xxl-row align-items-center align-items-xl-start align-items-xxl-center bg-white ms-2 mt-1 p-2 pb-1 ps-3" style="min-height: 5rem;">
                                            <div>
                                              <p class="mb-1">Mise en observation / Hospitalisation</p>
                                              <hr style="margin: 0.5rem 0;">
                                              <h4 class="fw-bolder text-nowrap" id="total_obs">En cours ...</h4>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="col-sm-3">
                                        <div class="d-sm-block d-inline-flex d-md-flex flex-xl-column flex-xxl-row align-items-center align-items-xl-start align-items-xxl-center bg-white ms-2 mt-1 p-2 pb-1 ps-3" style="min-height: 5rem;">
                                            <div>
                                              <p class="mb-1">Évacuations sanitaires</p>
                                              <hr style="margin: 0.5rem 0;">
                                              <h4 class="fw-bolder text-nowrap" id="total_ev">En cours ...</h4>
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
            <div class='load_map' id="loader_map" style="display: none;"></div>
            <div id="map" style="width: 100%; height:34rem; border: 5px solid #FFF;"></div>
        </div>

    </div>
@endsection
