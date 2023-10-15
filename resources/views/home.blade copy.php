@extends('layouts.template')
@section('page_title', 'ECOM')
@section('content')
    <div class="pb-5">
      <div class="row g-4">
        <div class="col-12 col-xxl-6">
          <div class="mb-8">
            <h2 class="mb-2">eFlux Financier Dashboard</h2>
            <h5 class="text-700 fw-semi-bold">Here’s what’s going on at your business right now</h5>
          </div>
          <div class="row align-items-center g-4">
            <div class="col-12 col-md-auto">
              <div class="d-flex align-items-center"><img src="{{ asset('assets/img/icons/illustrations/4l.png') }}" alt="" width="46" height="46">
                <div class="ms-3">
                  <h4 class="mb-0">57 new orders</h4>
                  <p class="text-800 fs--1 mb-0">Awating processing</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-auto">
              <div class="d-flex align-items-center"><img src="{{ asset('assets/img/icons/illustrations/3l.png') }}" alt="" width="46" height="46">
                <div class="ms-3">
                  <h4 class="mb-0">5 orders</h4>
                  <p class="text-800 fs--1 mb-0">On hold</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-auto">
              <div class="d-flex align-items-center"><img src="{{ asset('assets/img/icons/illustrations/2l.png') }}" alt="" width="46" height="46">
                <div class="ms-3">
                  <h4 class="mb-0">15 products</h4>
                  <p class="text-800 fs--1 mb-0">Out of stock</p>
                </div>
              </div>
            </div>
          </div>
          <hr class="bg-200 mb-6 mt-4">
          <div class="row flex-between-center mb-4 g-3">
            <div class="col-auto">
              <h3>Total sells</h3>
              <p class="text-700 lh-sm mb-0">Payment received across all channels</p>
            </div>
            <div class="col-8 col-sm-4">
              <select class="form-select form-select-sm mt-2" id="select-gross-revenue-month">
                <option>Mar 1 - 31, 2022</option>
                <option>April 1 - 30, 2022</option>
                <option>May 1 - 31, 2022</option>
              </select>
            </div>
          </div>
          <div class="echart-total-sales-chart" style="min-height: 320px; width: 100%; user-select: none; position: relative;" data-echart-responsive="data-echart-responsive" _echarts_instance_="ec_1678380653826"><div style="position: relative; width: 1106px; height: 320px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas style="position: absolute; left: 0px; top: 0px; width: 1106px; height: 320px; user-select: none; padding: 0px; margin: 0px; border-width: 0px;" data-zr-dom-id="zr_0" width="2212" height="640"></canvas></div><div class="" style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; background-color: rgb(239, 242, 246); border-width: 1px; border-radius: 4px; color: rgb(20, 24, 36); font: 14px / 21px sans-serif; padding: 10px; top: 0px; left: 0px; transform: translate3d(74px, 63px, 0px); border-color: rgb(203, 208, 221); pointer-events: none; visibility: hidden; opacity: 0;"><div class="ms-1">
        <h6 class="fs--1 text-700 false"><svg class="svg-inline--fa fa-circle me-2" style="color: #3874ff;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z"></path></svg><!-- <span class="fas fa-circle me-2" style="color:#3874ff"></span> Font Awesome fontawesome.com -->
May 02 : 200
</h6><h6 class="fs--1 text-700 mb-0"><svg class="svg-inline--fa fa-circle me-2" style="color: #0097eb;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z"></path></svg><!-- <span class="fas fa-circle me-2" style="color:#0097eb"></span> Font Awesome fontawesome.com -->
Apr 02 : 200
</h6>
      </div></div></div>
        </div>
        <div class="col-12 col-xxl-6">
          <div class="row g-3">
            <div class="col-12 col-md-6">
              <div class="card h-100">
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
              <div class="card h-100">
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
              <div class="card h-100">
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
              <div class="card h-100">
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
    <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white pt-7 border-y border-300">
      <div data-list="{&quot;valueNames&quot;:[&quot;product&quot;,&quot;customer&quot;,&quot;rating&quot;,&quot;review&quot;,&quot;time&quot;],&quot;page&quot;:6}">
        <div class="row align-items-end justify-content-between pb-5 g-3">
          <div class="col-auto">
            <h3>Latest reviews</h3>
            <p class="text-700 lh-sm mb-0">Payment received across all channels</p>
          </div>
          <div class="col-12 col-md-auto">
            <div class="row g-2 gy-3">
              <div class="col-auto flex-1">
                <div class="search-box">
                  <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                    <input class="form-control search-input search form-control-sm" type="search" placeholder="Search" aria-label="Search">
                    <svg class="svg-inline--fa fa-magnifying-glass search-box-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"></path></svg><!-- <span class="fas fa-search search-box-icon"></span> Font Awesome fontawesome.com -->

                  </form>
                </div>
              </div>
              <div class="col-auto">
                <button class="btn btn-sm btn-phoenix-secondary bg-white hover-bg-100 me-2" type="button">All products</button>
                <button class="btn btn-sm btn-phoenix-secondary bg-white hover-bg-100" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><svg class="svg-inline--fa fa-ellipsis fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path></svg><!-- <span class="fas fa-ellipsis-h fs--2"></span> Font Awesome fontawesome.com --></button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive mx-n1 px-1 scrollbar">
          <table class="table fs--1 mb-0 border-top border-200">
            <thead>
              <tr>
                <th class="white-space-nowrap fs--1 ps-0 align-middle">
                  <div class="form-check mb-0 fs-0">
                    <input class="form-check-input" id="checkbox-bulk-reviews-select" type="checkbox" data-bulk-select="{&quot;body&quot;:&quot;table-latest-review-body&quot;}">
                  </div>
                </th>
                <th class="sort white-space-nowrap align-middle" scope="col"></th>
                <th class="sort white-space-nowrap align-middle" scope="col" style="min-width:360px;" data-sort="product">PRODUCT</th>
                <th class="sort align-middle" scope="col" data-sort="customer" style="min-width:200px;">CUSTOMER</th>
                <th class="sort align-middle" scope="col" data-sort="rating" style="min-width:110px;">RATING</th>
                <th class="sort align-middle" scope="col" style="max-width:350px;" data-sort="review">REVIEW</th>
                <th class="sort text-start ps-5 align-middle" scope="col" data-sort="status">STATUS</th>
                <th class="sort text-end align-middle" scope="col" data-sort="time">TIME</th>
                <th class="sort text-end pe-0 align-middle" scope="col"></th>
              </tr>
            </thead>
            <tbody class="list" id="table-latest-review-body"><tr class="hover-actions-trigger btn-reveal-trigger position-static">
                <td class="fs--1 align-middle ps-0">
                  <div class="form-check mb-0 fs-0">
                    <input class="form-check-input" type="checkbox" data-bulk-select-row="{&quot;product&quot;:&quot;Fitbit Sense Advanced Smartwatch with Tools for Heart Health, Stress Management &amp; Skin Temperature Trends, Carbon/Graphite, One Size (S &amp; L Bands)&quot;,&quot;productImage&quot;:&quot;/products/60x60/1.png&quot;,&quot;customer&quot;:{&quot;name&quot;:&quot;Richard Dawkins&quot;,&quot;avatar&quot;:&quot;&quot;},&quot;rating&quot;:5,&quot;review&quot;:&quot;This Fitbit is fantastic! I was trying to be in better shape and needed some motivation, so I decided to treat myself to a new Fitbit.&quot;,&quot;status&quot;:{&quot;title&quot;:&quot;Approved&quot;,&quot;badge&quot;:&quot;success&quot;,&quot;icon&quot;:&quot;check&quot;},&quot;time&quot;:&quot;Just now&quot;}">
                  </div>
                </td>
                <td class="align-middle product white-space-nowrap py-0">
                  <div class="rounded-2 border"><img src="{{ asset('assets/img//products/60x60/1.png') }}" alt="" width="53"></div>
                </td>
                <td class="align-middle product white-space-nowrap"><a class="fw-semi-bold" href="apps/e-commerce/landing/product-details.html">Fitbit Sense Advanced Smartwatch with Tools fo...</a></td>
                <td class="align-middle customer white-space-nowrap"><a class="d-flex align-items-center" href="#!">
                    <div class="avatar avatar-l">
                      <div class="avatar-name rounded-circle"><span>R</span></div>
                    </div>
                    <h6 class="mb-0 ms-3 text-900">Richard Dawkins</h6>
                  </a></td>
                <td class="align-middle rating white-space-nowrap fs--2"><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com -->
                </td>
                <td class="align-middle review" style="min-width:350px;">
                  <p class="fs--1 fw-semi-bold text-1000 mb-0">This Fitbit is fantastic! I was trying to be in better shape and needed some motivation, so I decided to treat myself to a new Fitbit.</p>
                </td>
                <td class="align-middle text-start ps-5 status"><span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">Approved</span><svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check ms-1" style="height:12.8px;width:12.8px;"><polyline points="20 6 9 17 4 12"></polyline></svg></span></td>
                <td class="align-middle text-end time white-space-nowrap">
                  <div class="hover-hide">
                    <h6 class="text-1000 mb-0">Just now</h6>
                  </div>
                </td>
                <td class="align-middle white-space-nowrap text-end pe-0">
                  <div class="position-relative">
                    <div class="hover-actions">
                      <button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg><!-- <span class="fas fa-check"></span> Font Awesome fontawesome.com --></button>
                      <button class="btn btn-sm btn-phoenix-secondary fs--2"><svg class="svg-inline--fa fa-trash" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"></path></svg><!-- <span class="fas fa-trash"></span> Font Awesome fontawesome.com --></button>
                    </div>
                  </div>
                  <div class="font-sans-serif btn-reveal-trigger position-static">
                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><svg class="svg-inline--fa fa-ellipsis fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path></svg><!-- <span class="fas fa-ellipsis-h fs--2"></span> Font Awesome fontawesome.com --></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </td>
              </tr><tr class="hover-actions-trigger btn-reveal-trigger position-static">
                <td class="fs--1 align-middle ps-0">
                  <div class="form-check mb-0 fs-0">
                    <input class="form-check-input" type="checkbox" data-bulk-select-row="{&quot;product&quot;:&quot;iPhone 13 pro max-Pacific Blue-128GB storage&quot;,&quot;productImage&quot;:&quot;/products/60x60/2.png&quot;,&quot;customer&quot;:{&quot;name&quot;:&quot;Ashley Garrett&quot;,&quot;avatar&quot;:&quot;/team/40x40/59.webp&quot;},&quot;rating&quot;:3,&quot;review&quot;:&quot;The order was delivered ahead of schedule. To give us additional time, you should leave the packaging sealed with plastic.&quot;,&quot;status&quot;:{&quot;title&quot;:&quot;Approved&quot;,&quot;badge&quot;:&quot;success&quot;,&quot;icon&quot;:&quot;check&quot;},&quot;time&quot;:&quot;Just now&quot;}">
                  </div>
                </td>
                <td class="align-middle product white-space-nowrap py-0">
                  <div class="rounded-2 border"><img src="{{ asset('assets/img//products/60x60/2.png') }}" alt="" width="53"></div>
                </td>
                <td class="align-middle product white-space-nowrap"><a class="fw-semi-bold" href="apps/e-commerce/landing/product-details.html">iPhone 13 pro max-Pacific Blue-128GB storage</a></td>
                <td class="align-middle customer white-space-nowrap"><a class="d-flex align-items-center" href="#!">
                    <div class="avatar avatar-l"><img class="rounded-circle" src="{{ asset('assets/img/team/40x40/59.webp') }}" alt="">
                    </div>
                    <h6 class="mb-0 ms-3 text-900">Ashley Garrett</h6>
                  </a></td>
                <td class="align-middle rating white-space-nowrap fs--2"><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning-300" aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M287.9 0C297.1 0 305.5 5.25 309.5 13.52L378.1 154.8L531.4 177.5C540.4 178.8 547.8 185.1 550.7 193.7C553.5 202.4 551.2 211.9 544.8 218.2L433.6 328.4L459.9 483.9C461.4 492.9 457.7 502.1 450.2 507.4C442.8 512.7 432.1 513.4 424.9 509.1L287.9 435.9L150.1 509.1C142.9 513.4 133.1 512.7 125.6 507.4C118.2 502.1 114.5 492.9 115.1 483.9L142.2 328.4L31.11 218.2C24.65 211.9 22.36 202.4 25.2 193.7C28.03 185.1 35.5 178.8 44.49 177.5L197.7 154.8L266.3 13.52C270.4 5.249 278.7 0 287.9 0L287.9 0zM287.9 78.95L235.4 187.2C231.9 194.3 225.1 199.3 217.3 200.5L98.98 217.9L184.9 303C190.4 308.5 192.9 316.4 191.6 324.1L171.4 443.7L276.6 387.5C283.7 383.7 292.2 383.7 299.2 387.5L404.4 443.7L384.2 324.1C382.9 316.4 385.5 308.5 391 303L476.9 217.9L358.6 200.5C350.7 199.3 343.9 194.3 340.5 187.2L287.9 78.95z"></path></svg><!-- <span class="fa-regular fa-star text-warning-300"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning-300" aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M287.9 0C297.1 0 305.5 5.25 309.5 13.52L378.1 154.8L531.4 177.5C540.4 178.8 547.8 185.1 550.7 193.7C553.5 202.4 551.2 211.9 544.8 218.2L433.6 328.4L459.9 483.9C461.4 492.9 457.7 502.1 450.2 507.4C442.8 512.7 432.1 513.4 424.9 509.1L287.9 435.9L150.1 509.1C142.9 513.4 133.1 512.7 125.6 507.4C118.2 502.1 114.5 492.9 115.1 483.9L142.2 328.4L31.11 218.2C24.65 211.9 22.36 202.4 25.2 193.7C28.03 185.1 35.5 178.8 44.49 177.5L197.7 154.8L266.3 13.52C270.4 5.249 278.7 0 287.9 0L287.9 0zM287.9 78.95L235.4 187.2C231.9 194.3 225.1 199.3 217.3 200.5L98.98 217.9L184.9 303C190.4 308.5 192.9 316.4 191.6 324.1L171.4 443.7L276.6 387.5C283.7 383.7 292.2 383.7 299.2 387.5L404.4 443.7L384.2 324.1C382.9 316.4 385.5 308.5 391 303L476.9 217.9L358.6 200.5C350.7 199.3 343.9 194.3 340.5 187.2L287.9 78.95z"></path></svg><!-- <span class="fa-regular fa-star text-warning-300"></span> Font Awesome fontawesome.com -->
                </td>
                <td class="align-middle review" style="min-width:350px;">
                  <p class="fs--1 fw-semi-bold text-1000 mb-0">The order was delivered ahead of schedule. To give us additional time, you should leave the packaging sealed with plastic.</p>
                </td>
                <td class="align-middle text-start ps-5 status"><span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">Approved</span><svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check ms-1" style="height:12.8px;width:12.8px;"><polyline points="20 6 9 17 4 12"></polyline></svg></span></td>
                <td class="align-middle text-end time white-space-nowrap">
                  <div class="hover-hide">
                    <h6 class="text-1000 mb-0">Just now</h6>
                  </div>
                </td>
                <td class="align-middle white-space-nowrap text-end pe-0">
                  <div class="position-relative">
                    <div class="hover-actions">
                      <button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg><!-- <span class="fas fa-check"></span> Font Awesome fontawesome.com --></button>
                      <button class="btn btn-sm btn-phoenix-secondary fs--2"><svg class="svg-inline--fa fa-trash" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"></path></svg><!-- <span class="fas fa-trash"></span> Font Awesome fontawesome.com --></button>
                    </div>
                  </div>
                  <div class="font-sans-serif btn-reveal-trigger position-static">
                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><svg class="svg-inline--fa fa-ellipsis fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path></svg><!-- <span class="fas fa-ellipsis-h fs--2"></span> Font Awesome fontawesome.com --></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </td>
              </tr><tr class="hover-actions-trigger btn-reveal-trigger position-static">
                <td class="fs--1 align-middle ps-0">
                  <div class="form-check mb-0 fs-0">
                    <input class="form-check-input" type="checkbox" data-bulk-select-row="{&quot;product&quot;:&quot;Apple MacBook Pro 13 inch-M1-8/256GB-space&quot;,&quot;productImage&quot;:&quot;/products/60x60/3.png&quot;,&quot;customer&quot;:{&quot;name&quot;:&quot;Woodrow Burton&quot;,&quot;avatar&quot;:&quot;/team/40x40/58.webp&quot;},&quot;rating&quot;:4.5,&quot;review&quot;:&quot;It's a Mac, after all. Once you've gone Mac, there's no going back. My first Mac lasted over nine years, and this is my second.&quot;,&quot;status&quot;:{&quot;title&quot;:&quot;Pending&quot;,&quot;badge&quot;:&quot;warning&quot;,&quot;icon&quot;:&quot;clock&quot;},&quot;time&quot;:&quot;Just now&quot;}">
                  </div>
                </td>
                <td class="align-middle product white-space-nowrap py-0">
                  <div class="rounded-2 border"><img src="{{ asset('assets/img//products/60x60/3.png') }}" alt="" width="53"></div>
                </td>
                <td class="align-middle product white-space-nowrap"><a class="fw-semi-bold" href="apps/e-commerce/landing/product-details.html">Apple MacBook Pro 13 inch-M1-8/256GB-space</a></td>
                <td class="align-middle customer white-space-nowrap"><a class="d-flex align-items-center" href="#!">
                    <div class="avatar avatar-l"><img class="rounded-circle" src="{{ asset('assets/img/team/40x40/58.webp') }}" alt="">
                    </div>
                    <h6 class="mb-0 ms-3 text-900">Woodrow Burton</h6>
                  </a></td>
                <td class="align-middle rating white-space-nowrap fs--2"><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star-half-stroke star-icon text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star-half-stroke" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7zM288 376.4L288.1 376.3L399.7 435.9L378.4 309.6L469.2 219.8L343.8 201.4L288.1 86.85L288 87.14V376.4z"></path></svg><!-- <span class="fa fa-star-half-alt star-icon text-warning"></span> Font Awesome fontawesome.com -->
                </td>
                <td class="align-middle review" style="min-width:350px;">
                  <p class="fs--1 fw-semi-bold text-1000 mb-0">It's a Mac, after all. Once you've gone Mac, there's no going back. My first Mac lasted over nine years, and this is my second.</p>
                </td>
                <td class="align-middle text-start ps-5 status"><span class="badge badge-phoenix fs--2 badge-phoenix-warning"><span class="badge-label">Pending</span><svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock ms-1" style="height:12.8px;width:12.8px;"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></span></td>
                <td class="align-middle text-end time white-space-nowrap">
                  <div class="hover-hide">
                    <h6 class="text-1000 mb-0">Just now</h6>
                  </div>
                </td>
                <td class="align-middle white-space-nowrap text-end pe-0">
                  <div class="position-relative">
                    <div class="hover-actions">
                      <button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg><!-- <span class="fas fa-check"></span> Font Awesome fontawesome.com --></button>
                      <button class="btn btn-sm btn-phoenix-secondary fs--2"><svg class="svg-inline--fa fa-trash" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"></path></svg><!-- <span class="fas fa-trash"></span> Font Awesome fontawesome.com --></button>
                    </div>
                  </div>
                  <div class="font-sans-serif btn-reveal-trigger position-static">
                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><svg class="svg-inline--fa fa-ellipsis fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path></svg><!-- <span class="fas fa-ellipsis-h fs--2"></span> Font Awesome fontawesome.com --></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </td>
              </tr><tr class="hover-actions-trigger btn-reveal-trigger position-static">
                <td class="fs--1 align-middle ps-0">
                  <div class="form-check mb-0 fs-0">
                    <input class="form-check-input" type="checkbox" data-bulk-select-row="{&quot;product&quot;:&quot;Apple iMac 24\&quot; 4K Retina Display M1 8 Core CPU, 7 Core GPU, 256GB SSD, Green (MJV83ZP/A) 2021&quot;,&quot;productImage&quot;:&quot;/products/60x60/4.png&quot;,&quot;customer&quot;:{&quot;name&quot;:&quot;Eric McGee&quot;,&quot;avatar&quot;:&quot;/team/40x40/avatar.webp&quot;,&quot;avatarPlaceholder&quot;:true},&quot;rating&quot;:3,&quot;review&quot;:&quot;Personally, I like the minimalist style, but I wouldn't choose it if I were searching for a computer that I would use frequently. It's not horrible in terms of speed and power, but the&quot;,&quot;status&quot;:{&quot;title&quot;:&quot;Pending&quot;,&quot;badge&quot;:&quot;warning&quot;,&quot;icon&quot;:&quot;clock&quot;},&quot;time&quot;:&quot;Nov 09, 3:23 AM&quot;}">
                  </div>
                </td>
                <td class="align-middle product white-space-nowrap py-0">
                  <div class="rounded-2 border"><img src="{{ asset('assets/img//products/60x60/4.png') }}" alt="" width="53"></div>
                </td>
                <td class="align-middle product white-space-nowrap"><a class="fw-semi-bold" href="apps/e-commerce/landing/product-details.html">Apple iMac 24" 4K Retina Display M1 8 Core CPU...</a></td>
                <td class="align-middle customer white-space-nowrap"><a class="d-flex align-items-center" href="#!">
                    <div class="avatar avatar-l"><img class="rounded-circle avatar-placeholder" src="{{ asset('assets/img/team/40x40/avatar.webp') }}" alt="">
                    </div>
                    <h6 class="mb-0 ms-3 text-900">Eric McGee</h6>
                  </a></td>
                <td class="align-middle rating white-space-nowrap fs--2"><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning-300" aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M287.9 0C297.1 0 305.5 5.25 309.5 13.52L378.1 154.8L531.4 177.5C540.4 178.8 547.8 185.1 550.7 193.7C553.5 202.4 551.2 211.9 544.8 218.2L433.6 328.4L459.9 483.9C461.4 492.9 457.7 502.1 450.2 507.4C442.8 512.7 432.1 513.4 424.9 509.1L287.9 435.9L150.1 509.1C142.9 513.4 133.1 512.7 125.6 507.4C118.2 502.1 114.5 492.9 115.1 483.9L142.2 328.4L31.11 218.2C24.65 211.9 22.36 202.4 25.2 193.7C28.03 185.1 35.5 178.8 44.49 177.5L197.7 154.8L266.3 13.52C270.4 5.249 278.7 0 287.9 0L287.9 0zM287.9 78.95L235.4 187.2C231.9 194.3 225.1 199.3 217.3 200.5L98.98 217.9L184.9 303C190.4 308.5 192.9 316.4 191.6 324.1L171.4 443.7L276.6 387.5C283.7 383.7 292.2 383.7 299.2 387.5L404.4 443.7L384.2 324.1C382.9 316.4 385.5 308.5 391 303L476.9 217.9L358.6 200.5C350.7 199.3 343.9 194.3 340.5 187.2L287.9 78.95z"></path></svg><!-- <span class="fa-regular fa-star text-warning-300"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning-300" aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M287.9 0C297.1 0 305.5 5.25 309.5 13.52L378.1 154.8L531.4 177.5C540.4 178.8 547.8 185.1 550.7 193.7C553.5 202.4 551.2 211.9 544.8 218.2L433.6 328.4L459.9 483.9C461.4 492.9 457.7 502.1 450.2 507.4C442.8 512.7 432.1 513.4 424.9 509.1L287.9 435.9L150.1 509.1C142.9 513.4 133.1 512.7 125.6 507.4C118.2 502.1 114.5 492.9 115.1 483.9L142.2 328.4L31.11 218.2C24.65 211.9 22.36 202.4 25.2 193.7C28.03 185.1 35.5 178.8 44.49 177.5L197.7 154.8L266.3 13.52C270.4 5.249 278.7 0 287.9 0L287.9 0zM287.9 78.95L235.4 187.2C231.9 194.3 225.1 199.3 217.3 200.5L98.98 217.9L184.9 303C190.4 308.5 192.9 316.4 191.6 324.1L171.4 443.7L276.6 387.5C283.7 383.7 292.2 383.7 299.2 387.5L404.4 443.7L384.2 324.1C382.9 316.4 385.5 308.5 391 303L476.9 217.9L358.6 200.5C350.7 199.3 343.9 194.3 340.5 187.2L287.9 78.95z"></path></svg><!-- <span class="fa-regular fa-star text-warning-300"></span> Font Awesome fontawesome.com -->
                </td>
                <td class="align-middle review" style="min-width:350px;">
                  <p class="fs--1 fw-semi-bold text-1000 mb-0">Personally, I like the minimalist style, but I wouldn't choose it if I were searching for a computer that I would use frequently. It's...<a href="#!">See more</a></p>
                </td>
                <td class="align-middle text-start ps-5 status"><span class="badge badge-phoenix fs--2 badge-phoenix-warning"><span class="badge-label">Pending</span><svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock ms-1" style="height:12.8px;width:12.8px;"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></span></td>
                <td class="align-middle text-end time white-space-nowrap">
                  <div class="hover-hide">
                    <h6 class="text-1000 mb-0">Nov 09, 3:23 AM</h6>
                  </div>
                </td>
                <td class="align-middle white-space-nowrap text-end pe-0">
                  <div class="position-relative">
                    <div class="hover-actions">
                      <button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg><!-- <span class="fas fa-check"></span> Font Awesome fontawesome.com --></button>
                      <button class="btn btn-sm btn-phoenix-secondary fs--2"><svg class="svg-inline--fa fa-trash" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"></path></svg><!-- <span class="fas fa-trash"></span> Font Awesome fontawesome.com --></button>
                    </div>
                  </div>
                  <div class="font-sans-serif btn-reveal-trigger position-static">
                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><svg class="svg-inline--fa fa-ellipsis fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path></svg><!-- <span class="fas fa-ellipsis-h fs--2"></span> Font Awesome fontawesome.com --></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </td>
              </tr><tr class="hover-actions-trigger btn-reveal-trigger position-static">
                <td class="fs--1 align-middle ps-0">
                  <div class="form-check mb-0 fs-0">
                    <input class="form-check-input" type="checkbox" data-bulk-select-row="{&quot;product&quot;:&quot;Razer Kraken v3 x Wired 7.1 Surroung Sound Gaming headset&quot;,&quot;productImage&quot;:&quot;/products/60x60/5.png&quot;,&quot;customer&quot;:{&quot;name&quot;:&quot;Kim Carroll&quot;,&quot;avatar&quot;:&quot;/team/40x40/avatar.webp&quot;,&quot;avatarPlaceholder&quot;:true},&quot;rating&quot;:4,&quot;review&quot;:&quot;It performs exactly as expected. There are three of these in the family.&quot;,&quot;status&quot;:{&quot;title&quot;:&quot;Pending&quot;,&quot;badge&quot;:&quot;warning&quot;,&quot;icon&quot;:&quot;clock&quot;},&quot;time&quot;:&quot;Nov 09, 2:15 PM&quot;}">
                  </div>
                </td>
                <td class="align-middle product white-space-nowrap py-0">
                  <div class="rounded-2 border"><img src="{{ asset('assets/img//products/60x60/5.png') }}" alt="" width="53"></div>
                </td>
                <td class="align-middle product white-space-nowrap"><a class="fw-semi-bold" href="apps/e-commerce/landing/product-details.html">Razer Kraken v3 x Wired 7.1 Surroung Sound Gam...</a></td>
                <td class="align-middle customer white-space-nowrap"><a class="d-flex align-items-center" href="#!">
                    <div class="avatar avatar-l"><img class="rounded-circle avatar-placeholder" src="{{ asset('assets/img/team/40x40/avatar.webp') }}" alt="">
                    </div>
                    <h6 class="mb-0 ms-3 text-900">Kim Carroll</h6>
                  </a></td>
                <td class="align-middle rating white-space-nowrap fs--2"><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning-300" aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M287.9 0C297.1 0 305.5 5.25 309.5 13.52L378.1 154.8L531.4 177.5C540.4 178.8 547.8 185.1 550.7 193.7C553.5 202.4 551.2 211.9 544.8 218.2L433.6 328.4L459.9 483.9C461.4 492.9 457.7 502.1 450.2 507.4C442.8 512.7 432.1 513.4 424.9 509.1L287.9 435.9L150.1 509.1C142.9 513.4 133.1 512.7 125.6 507.4C118.2 502.1 114.5 492.9 115.1 483.9L142.2 328.4L31.11 218.2C24.65 211.9 22.36 202.4 25.2 193.7C28.03 185.1 35.5 178.8 44.49 177.5L197.7 154.8L266.3 13.52C270.4 5.249 278.7 0 287.9 0L287.9 0zM287.9 78.95L235.4 187.2C231.9 194.3 225.1 199.3 217.3 200.5L98.98 217.9L184.9 303C190.4 308.5 192.9 316.4 191.6 324.1L171.4 443.7L276.6 387.5C283.7 383.7 292.2 383.7 299.2 387.5L404.4 443.7L384.2 324.1C382.9 316.4 385.5 308.5 391 303L476.9 217.9L358.6 200.5C350.7 199.3 343.9 194.3 340.5 187.2L287.9 78.95z"></path></svg><!-- <span class="fa-regular fa-star text-warning-300"></span> Font Awesome fontawesome.com -->
                </td>
                <td class="align-middle review" style="min-width:350px;">
                  <p class="fs--1 fw-semi-bold text-1000 mb-0">It performs exactly as expected. There are three of these in the family.</p>
                </td>
                <td class="align-middle text-start ps-5 status"><span class="badge badge-phoenix fs--2 badge-phoenix-warning"><span class="badge-label">Pending</span><svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock ms-1" style="height:12.8px;width:12.8px;"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></span></td>
                <td class="align-middle text-end time white-space-nowrap">
                  <div class="hover-hide">
                    <h6 class="text-1000 mb-0">Nov 09, 2:15 PM</h6>
                  </div>
                </td>
                <td class="align-middle white-space-nowrap text-end pe-0">
                  <div class="position-relative">
                    <div class="hover-actions">
                      <button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg><!-- <span class="fas fa-check"></span> Font Awesome fontawesome.com --></button>
                      <button class="btn btn-sm btn-phoenix-secondary fs--2"><svg class="svg-inline--fa fa-trash" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"></path></svg><!-- <span class="fas fa-trash"></span> Font Awesome fontawesome.com --></button>
                    </div>
                  </div>
                  <div class="font-sans-serif btn-reveal-trigger position-static">
                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><svg class="svg-inline--fa fa-ellipsis fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path></svg><!-- <span class="fas fa-ellipsis-h fs--2"></span> Font Awesome fontawesome.com --></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </td>
              </tr><tr class="hover-actions-trigger btn-reveal-trigger position-static">
                <td class="fs--1 align-middle ps-0">
                  <div class="form-check mb-0 fs-0">
                    <input class="form-check-input" type="checkbox" data-bulk-select-row="{&quot;product&quot;:&quot;PlayStation 5 DualSense Wireless Controller&quot;,&quot;productImage&quot;:&quot;/products/60x60/6.png&quot;,&quot;customer&quot;:{&quot;name&quot;:&quot;Barbara Lucas&quot;,&quot;avatar&quot;:&quot;/team/40x40/57.webp&quot;},&quot;rating&quot;:4,&quot;review&quot;:&quot;The controller is quite comfy for me. Despite its increased size, the controller still fits well in my hands.&quot;,&quot;status&quot;:{&quot;title&quot;:&quot;Approved&quot;,&quot;badge&quot;:&quot;success&quot;,&quot;icon&quot;:&quot;check&quot;},&quot;time&quot;:&quot;Nov 08, 8:53 AM&quot;}">
                  </div>
                </td>
                <td class="align-middle product white-space-nowrap py-0">
                  <div class="rounded-2 border"><img src="{{ asset('assets/img//products/60x60/6.png') }}" alt="" width="53"></div>
                </td>
                <td class="align-middle product white-space-nowrap"><a class="fw-semi-bold" href="apps/e-commerce/landing/product-details.html">PlayStation 5 DualSense Wireless Controller</a></td>
                <td class="align-middle customer white-space-nowrap"><a class="d-flex align-items-center" href="#!">
                    <div class="avatar avatar-l"><img class="rounded-circle" src="{{ asset('assets/img/team/40x40/57.webp') }}" alt="">
                    </div>
                    <h6 class="mb-0 ms-3 text-900">Barbara Lucas</h6>
                  </a></td>
                <td class="align-middle rating white-space-nowrap fs--2"><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg><!-- <span class="fa fa-star text-warning"></span> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-star text-warning-300" aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M287.9 0C297.1 0 305.5 5.25 309.5 13.52L378.1 154.8L531.4 177.5C540.4 178.8 547.8 185.1 550.7 193.7C553.5 202.4 551.2 211.9 544.8 218.2L433.6 328.4L459.9 483.9C461.4 492.9 457.7 502.1 450.2 507.4C442.8 512.7 432.1 513.4 424.9 509.1L287.9 435.9L150.1 509.1C142.9 513.4 133.1 512.7 125.6 507.4C118.2 502.1 114.5 492.9 115.1 483.9L142.2 328.4L31.11 218.2C24.65 211.9 22.36 202.4 25.2 193.7C28.03 185.1 35.5 178.8 44.49 177.5L197.7 154.8L266.3 13.52C270.4 5.249 278.7 0 287.9 0L287.9 0zM287.9 78.95L235.4 187.2C231.9 194.3 225.1 199.3 217.3 200.5L98.98 217.9L184.9 303C190.4 308.5 192.9 316.4 191.6 324.1L171.4 443.7L276.6 387.5C283.7 383.7 292.2 383.7 299.2 387.5L404.4 443.7L384.2 324.1C382.9 316.4 385.5 308.5 391 303L476.9 217.9L358.6 200.5C350.7 199.3 343.9 194.3 340.5 187.2L287.9 78.95z"></path></svg><!-- <span class="fa-regular fa-star text-warning-300"></span> Font Awesome fontawesome.com -->
                </td>
                <td class="align-middle review" style="min-width:350px;">
                  <p class="fs--1 fw-semi-bold text-1000 mb-0">The controller is quite comfy for me. Despite its increased size, the controller still fits well in my hands.</p>
                </td>
                <td class="align-middle text-start ps-5 status"><span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">Approved</span><svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check ms-1" style="height:12.8px;width:12.8px;"><polyline points="20 6 9 17 4 12"></polyline></svg></span></td>
                <td class="align-middle text-end time white-space-nowrap">
                  <div class="hover-hide">
                    <h6 class="text-1000 mb-0">Nov 08, 8:53 AM</h6>
                  </div>
                </td>
                <td class="align-middle white-space-nowrap text-end pe-0">
                  <div class="position-relative">
                    <div class="hover-actions">
                      <button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"></path></svg><!-- <span class="fas fa-check"></span> Font Awesome fontawesome.com --></button>
                      <button class="btn btn-sm btn-phoenix-secondary fs--2"><svg class="svg-inline--fa fa-trash" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"></path></svg><!-- <span class="fas fa-trash"></span> Font Awesome fontawesome.com --></button>
                    </div>
                  </div>
                  <div class="font-sans-serif btn-reveal-trigger position-static">
                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><svg class="svg-inline--fa fa-ellipsis fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path></svg><!-- <span class="fas fa-ellipsis-h fs--2"></span> Font Awesome fontawesome.com --></button>
                    <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </td>
              </tr></tbody>
          </table>
        </div>
        <div class="row align-items-center py-1">
          <div class="pagination d-none"></div>
          <div class="col d-flex fs--1">
            <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info">1 to 6 <span class="text-600"> Items of </span>15</p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<svg class="svg-inline--fa fa-angle-right ms-1" data-fa-transform="down-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;"><g transform="translate(128 256)"><g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z" transform="translate(-128 -256)"></path></g></g></svg><!-- <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span> Font Awesome fontawesome.com --></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less</a>
          </div>
          <div class="col-auto d-flex">

            <button class="btn btn-link px-1 me-1 disabled" type="button" title="Previous" data-list-pagination="prev" disabled=""><svg class="svg-inline--fa fa-chevron-left me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z"></path></svg><!-- <span class="fas fa-chevron-left me-2"></span> Font Awesome fontawesome.com -->Previous</button>
            <button class="btn btn-link px-1 ms-1" type="button" title="Next" data-list-pagination="next">Next<svg class="svg-inline--fa fa-chevron-right ms-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path></svg><!-- <span class="fas fa-chevron-right ms-2"></span> Font Awesome fontawesome.com --></button>
          </div>
        </div>
      </div>
    </div>
    <div class="row gx-6">
      <div class="col-12 col-xl-6">
        <div class="mb-5 mt-7">
          <h3>Top regions by revenue</h3>
          <p class="text-700">Where you generated most of the revenue</p>
        </div>
        <div class="table-responsive scrollbar">
          <table class="table fs--2 mb-0">
            <thead>
              <tr>
                <th class="border-top border-200 ps-0 align-middle" scope="col" style="width:32%">COUNTRY</th>
                <th class="border-top border-200 align-middle" scope="col" style="width:17%">USERS</th>
                <th class="border-top border-200 text-end align-middle" scope="col" style="width:16%">TRANSACTIONS</th>
                <th class="border-top border-200 text-end align-middle" scope="col" style="width:20%">REVENUE</th>
                <th class="border-top border-200 text-end pe-0 align-middle" scope="col" style="width:17%">CONV. RATE</th>
              </tr>
            </thead>
            <tbody class="list">
              <tr>
                <td></td>
                <td class="align-middle py-4">
                  <h4 class="mb-0 fw-normal">377,620</h4>
                </td>
                <td class="align-middle text-end py-4">
                  <h4 class="mb-0 fw-normal">236</h4>
                </td>
                <td class="align-middle text-end py-4">
                  <h4 class="mb-0 fw-normal">$15,758</h4>
                </td>
                <td class="align-middle text-end py-4 pe-0">
                  <h4 class="mb-0 fw-normal">10.32%</h4>
                </td>
              </tr>
              <tr>
                <td class="white-space-nowrap ps-0" style="width:32%">
                  <div class="d-flex align-items-center">
                    <h6 class="mb-0 me-3">1. </h6><a href="#!">
                      <div class="d-flex align-items-center"><img src="{{ asset('assets/img/country/india.png') }}" alt="" width="24">
                        <p class="mb-0 ps-3 text-primary fw-bold fs--1">India</p>
                      </div>
                    </a>
                  </div>
                </td>
                <td class="align-middle" style="width:17%">
                  <h6 class="mb-0">92896<span class="text-700 fw-semi-bold ms-2">(41.6%)</span></h6>
                </td>
                <td class="align-middle text-end" style="width:17%">
                  <h6 class="mb-0">67<span class="text-700 fw-semi-bold ms-2">(34.3%)</span></h6>
                </td>
                <td class="align-middle text-end" style="width:17%">
                  <h6 class="mb-0">$7560<span class="text-700 fw-semi-bold ms-2">(36.9%)</span></h6>
                </td>
                <td class="align-middle text-end pe-0" style="width:17%">
                  <h6>14.01%</h6>
                </td>
              </tr>
              <tr>
                <td class="white-space-nowrap ps-0" style="width:32%">
                  <div class="d-flex align-items-center">
                    <h6 class="mb-0 me-3">2. </h6><a href="#!">
                      <div class="d-flex align-items-center"><img src="{{ asset('assets/img/country/china.png') }}" alt="" width="24">
                        <p class="mb-0 ps-3 text-primary fw-bold fs--1">China</p>
                      </div>
                    </a>
                  </div>
                </td>
                <td class="align-middle" style="width:17%">
                  <h6 class="mb-0">50496<span class="text-700 fw-semi-bold ms-2">(32.8%)</span></h6>
                </td>
                <td class="align-middle text-end" style="width:17%">
                  <h6 class="mb-0">54<span class="text-700 fw-semi-bold ms-2">(23.8%)</span></h6>
                </td>
                <td class="align-middle text-end" style="width:17%">
                  <h6 class="mb-0">$6532<span class="text-700 fw-semi-bold ms-2">(26.5%)</span></h6>
                </td>
                <td class="align-middle text-end pe-0" style="width:17%">
                  <h6>23.56%</h6>
                </td>
              </tr>
              <tr>
                <td class="white-space-nowrap ps-0" style="width:32%">
                  <div class="d-flex align-items-center">
                    <h6 class="mb-0 me-3">3. </h6><a href="#!">
                      <div class="d-flex align-items-center"><img src="{{ asset('assets/img/country/usa.png') }}" alt="" width="24">
                        <p class="mb-0 ps-3 text-primary fw-bold fs--1">USA</p>
                      </div>
                    </a>
                  </div>
                </td>
                <td class="align-middle" style="width:17%">
                  <h6 class="mb-0">45679<span class="text-700 fw-semi-bold ms-2">(24.3%)</span></h6>
                </td>
                <td class="align-middle text-end" style="width:17%">
                  <h6 class="mb-0">35<span class="text-700 fw-semi-bold ms-2">(19.7%)</span></h6>
                </td>
                <td class="align-middle text-end" style="width:17%">
                  <h6 class="mb-0">$5432<span class="text-700 fw-semi-bold ms-2">(16.9%)</span></h6>
                </td>
                <td class="align-middle text-end pe-0" style="width:17%">
                  <h6>10.23%</h6>
                </td>
              </tr>
              <tr>
                <td class="white-space-nowrap ps-0" style="width:32%">
                  <div class="d-flex align-items-center">
                    <h6 class="mb-0 me-3">4. </h6><a href="#!">
                      <div class="d-flex align-items-center"><img src="{{ asset('assets/img/country/south-korea.png') }}" alt="" width="24">
                        <p class="mb-0 ps-3 text-primary fw-bold fs--1">South Korea</p>
                      </div>
                    </a>
                  </div>
                </td>
                <td class="align-middle" style="width:17%">
                  <h6 class="mb-0">36453<span class="text-700 fw-semi-bold ms-2">(19.7%)</span></h6>
                </td>
                <td class="align-middle text-end" style="width:17%">
                  <h6 class="mb-0">22<span class="text-700 fw-semi-bold ms-2">(9.54%)</span></h6>
                </td>
                <td class="align-middle text-end" style="width:17%">
                  <h6 class="mb-0">$4673<span class="text-700 fw-semi-bold ms-2">(11.6%)</span></h6>
                </td>
                <td class="align-middle text-end pe-0" style="width:17%">
                  <h6>8.85%</h6>
                </td>
              </tr>
              <tr>
                <td class="white-space-nowrap ps-0" style="width:32%">
                  <div class="d-flex align-items-center">
                    <h6 class="mb-0 me-3">5. </h6><a href="#!">
                      <div class="d-flex align-items-center"><img src="{{ asset('assets/img/country/vietnam.png') }}" alt="" width="24">
                        <p class="mb-0 ps-3 text-primary fw-bold fs--1">Vietnam</p>
                      </div>
                    </a>
                  </div>
                </td>
                <td class="align-middle" style="width:17%">
                  <h6 class="mb-0">15007<span class="text-700 fw-semi-bold ms-2">(11.9%)</span></h6>
                </td>
                <td class="align-middle text-end" style="width:17%">
                  <h6 class="mb-0">17<span class="text-700 fw-semi-bold ms-2">(6.91%)</span></h6>
                </td>
                <td class="align-middle text-end" style="width:17%">
                  <h6 class="mb-0">$2456<span class="text-700 fw-semi-bold ms-2">(10.2%)</span></h6>
                </td>
                <td class="align-middle text-end pe-0" style="width:17%">
                  <h6>6.01%</h6>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="d-flex align-items-center justify-content-between py-2 fs--1 mb-1">
          <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="">1 to 5 <span class="text-600"> Items of </span> 15</p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<svg class="svg-inline--fa fa-angle-right ms-2" data-fa-transform="down-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;"><g transform="translate(128 256)"><g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z" transform="translate(-128 -256)"></path></g></g></svg><!-- <span class="fas fa-angle-right ms-2" data-fa-transform="down-1"></span> Font Awesome fontawesome.com --></a>
        </div>
      </div>
      <div class="col-12 col-xl-6">
        <div class="mx-n4 mx-lg-n6 ms-xl-0 h-100">
          <div class="h-100 w-100 py-5">
            <div class="googlemap revenue-map h-100" style="min-height: 300px; position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div class="gm-err-container"><div class="gm-err-content"><div class="gm-err-icon"><img src="https://maps.gstatic.com/mapfiles/api-3/images/icon_error.png') }}" alt="" draggable="false" style="user-select: none;"></div><div class="gm-err-title">Petit problème... Une erreur s'est produite</div><div class="gm-err-message">Google&nbsp;Maps ne s'est pas chargé correctement sur cette page. Pour plus d'informations techniques sur cette erreur, veuillez consulter la console JavaScript.</div></div></div></div></div>
          </div>
        </div>
      </div>
    </div>
    <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white pt-6 pb-9 border-top border-300">
      <div class="row g-6">
        <div class="col-12 col-xl-6">
          <div class="me-xl-4">
            <div>
              <h3>Projection vs actual</h3>
              <p class="mb-1 text-700">Actual earnings vs projected earnings</p>
            </div>
            <div class="echart-projection-actual" style="height: 300px; width: 100%; user-select: none; position: relative;" data-echart-responsive="data-echart-responsive" _echarts_instance_="ec_1678380653829"><div style="position: relative; width: 509px; height: 300px; padding: 0px; margin: 0px; border-width: 0px;"><canvas style="position: absolute; left: 0px; top: 0px; width: 509px; height: 300px; user-select: none; padding: 0px; margin: 0px; border-width: 0px;" data-zr-dom-id="zr_0" width="1018" height="600"></canvas></div><div class=""></div></div>
          </div>
        </div>
        <div class="col-12 col-xl-6">
          <div>
            <h3>Returning customer rate</h3>
            <p class="mb-1 text-700">Rate of customers returning to your shop over time</p>
          </div>
          <div class="echart-returning-customer" style="height: 300px; user-select: none; position: relative;" data-echart-responsive="data-echart-responsive" _echarts_instance_="ec_1678380653830"><div style="position: relative; width: 533px; height: 300px; padding: 0px; margin: 0px; border-width: 0px;"><canvas style="position: absolute; left: 0px; top: 0px; width: 533px; height: 300px; user-select: none; padding: 0px; margin: 0px; border-width: 0px;" data-zr-dom-id="zr_0" width="1066" height="600"></canvas></div><div class=""></div></div>
        </div>
      </div>
    </div>
    <footer class="footer position-absolute">
      <div class="row g-0 justify-content-between align-items-center h-100">
        <div class="col-12 col-sm-auto text-center">
          <p class="mb-0 mt-2 mt-sm-0 text-900">Thank you for creating with Phoenix<span class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none">2023 ©<a class="mx-1" href="https://themewagon.com">Themewagon</a></p>
        </div>
        <div class="col-12 col-sm-auto text-center">
          <p class="mb-0 text-600">v1.10.0</p>
        </div>
      </div>
    </footer>
@endsection
