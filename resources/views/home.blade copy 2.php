@extends('layouts.template')
@section('page_title', 'ECOM')
@section('content')
    <div class="pb-5">
      <div class="row g-1">
        <div class="col-12 col-xxl-6">
          <div>
            <h2 class="mb-2">eFlux Financier Dashboard</h2>
            <h5 class="text-700 fw-semi-bold">Tableau de bord des flux financier des CSPS et CMA</h5>
          </div>
          <hr class="bg-200 mt-3">
        </div>
        <div class="col-12 col-xxl-6">
          <div class="row g-3">
            <div class="col-12 col-md-6">
              <div class="card h-100 bg-light">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h5 class="mb-1">Total orders<span class="badge badge-phoenix badge-phoenix-warning rounded-pill fs--1 ms-2"><span class="badge-label">-6.8%</span></span></h5>
                      <h6 class="text-700">Last 7 days</h6>
                    </div>
                    <h4>16,247</h4>
                  </div>
                  <div class="d-flex justify-content-center px-4 py-6">
                    <div class="echart-total-orders" style="height: 85px; width: 115px; user-select: none; position: relative;" _echarts_instance_="ec_1678380653832"><div style="position: relative; width: 115px; height: 85px; padding: 0px; margin: 0px; border-width: 0px;"><canvas style="position: absolute; left: 0px; top: 0px; width: 115px; height: 85px; user-select: none; padding: 0px; margin: 0px; border-width: 0px;" data-zr-dom-id="zr_0" width="230" height="170"></canvas></div><div class=""></div></div>
                  </div>
                  <div class="mt-2">
                    <div class="d-flex align-items-center mb-2">
                      <div class="bullet-item bg-primary me-2"></div>
                      <h6 class="text-900 fw-semi-bold flex-1 mb-0">Completed</h6>
                      <h6 class="text-900 fw-semi-bold mb-0">52%</h6>
                    </div>
                    <div class="d-flex align-items-center">
                      <div class="bullet-item bg-primary-100 me-2"></div>
                      <h6 class="text-900 fw-semi-bold flex-1 mb-0">Pending payment</h6>
                      <h6 class="text-900 fw-semi-bold mb-0">48%</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="card h-100 bg-light">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h5 class="mb-1">New customers<span class="badge badge-phoenix badge-phoenix-warning rounded-pill fs--1 ms-2"> <span class="badge-label">+26.5%</span></span></h5>
                      <h6 class="text-700">Last 7 days</h6>
                    </div>
                    <h4>356</h4>
                  </div>
                  <div class="pb-0 pt-4">
                    <div class="echarts-new-customers" style="height: 180px; width: 100%; user-select: none; position: relative;" data-echart-responsive="true" _echarts_instance_="ec_1678380653827"><div style="position: relative; width: 495px; height: 180px; padding: 0px; margin: 0px; border-width: 0px;"><canvas style="position: absolute; left: 0px; top: 0px; width: 495px; height: 180px; user-select: none; padding: 0px; margin: 0px; border-width: 0px;" data-zr-dom-id="zr_0" width="990" height="360"></canvas></div><div class=""></div></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="card h-100 bg-light">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h5 class="mb-2">Top coupons</h5>
                      <h6 class="text-700">Last 7 days</h6>
                    </div>
                  </div>
                  <div class="pb-4 pt-3">
                    <div class="echart-top-coupons" style="height: 115px; width: 100%; user-select: none; position: relative;" _echarts_instance_="ec_1678380653828"><div style="position: relative; width: 495px; height: 115px; padding: 0px; margin: 0px; border-width: 0px;"><canvas style="position: absolute; left: 0px; top: 0px; width: 495px; height: 115px; user-select: none; padding: 0px; margin: 0px; border-width: 0px;" data-zr-dom-id="zr_0" width="990" height="230"></canvas></div><div class=""></div></div>
                  </div>
                  <div>
                    <div class="d-flex align-items-center mb-2">
                      <div class="bullet-item bg-primary me-2"></div>
                      <h6 class="text-900 fw-semi-bold flex-1 mb-0">Percentage discount</h6>
                      <h6 class="text-900 fw-semi-bold mb-0">72%</h6>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                      <div class="bullet-item bg-primary-200 me-2"></div>
                      <h6 class="text-900 fw-semi-bold flex-1 mb-0">Fixed card discount</h6>
                      <h6 class="text-900 fw-semi-bold mb-0">18%</h6>
                    </div>
                    <div class="d-flex align-items-center">
                      <div class="bullet-item bg-info-500 me-2"></div>
                      <h6 class="text-900 fw-semi-bold flex-1 mb-0">Fixed product discount</h6>
                      <h6 class="text-900 fw-semi-bold mb-0">10%</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="card h-100 bg-light">
                <div class="card-body d-flex flex-column">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h5 class="mb-2">Paying vs non paying</h5>
                      <h6 class="text-700">Last 7 days</h6>
                    </div>
                  </div>
                  <div class="d-flex justify-content-center pt-3 flex-1">
                    <div class="echarts-paying-customer-chart" style="height: 100%; width: 100%; user-select: none; position: relative;" _echarts_instance_="ec_1678380653831"><div style="position: relative; width: 495px; height: 144px; padding: 0px; margin: 0px; border-width: 0px;"><canvas style="position: absolute; left: 0px; top: 0px; width: 495px; height: 144px; user-select: none; padding: 0px; margin: 0px; border-width: 0px;" data-zr-dom-id="zr_0" width="990" height="288"></canvas></div><div class=""></div></div>
                  </div>
                  <div class="mt-3">
                    <div class="d-flex align-items-center mb-2">
                      <div class="bullet-item bg-primary me-2"></div>
                      <h6 class="text-900 fw-semi-bold flex-1 mb-0">Paying customer</h6>
                      <h6 class="text-900 fw-semi-bold mb-0">30%</h6>
                    </div>
                    <div class="d-flex align-items-center">
                      <div class="bullet-item bg-primary-100 me-2"></div>
                      <h6 class="text-900 fw-semi-bold flex-1 mb-0">Non-paying customer</h6>
                      <h6 class="text-900 fw-semi-bold mb-0">70%</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
