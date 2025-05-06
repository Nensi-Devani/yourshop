@extends('layouts.admin')
@section('content')
@section('title')YourShop | Dashboard @endsection

<div class="grey-bg container-fluid">
  <section id="minimal-statistics">
    <div class="row">
      <div class="col-12 mb-1" style="margin-top: -15px">
        <h3 class="">Dashboard</h3>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-xl-3 col-sm-6 col-12 mb-md-0 mb-1">
        <div class="card rounded shadow">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex d-flex justify-content-between">
                <div class="media-body text-left ">
                  <h3 class="primary">{{$users}}</h3>
                  <span>Total Users</span>
                </div>
                <div class="">
                  <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-people text-primary mt-2" viewBox="0 0 16 16">
                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12 mb-md-0 mb-1">
        <div class="card rounded shadow">
          <div class="card-content">
            <div class="card-body ">
              <div class="media d-flex justify-content-between">
                <div class="media-body text-left">
                  <h3 class="warning">{{$products}}</h3>
                  <span>Total Products</span>
                </div>
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-archive text-warning mt-2" viewBox="0 0 16 16">
                        <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5zm13-3H1v2h14zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                    </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12 mb-md-0 mb-1">
        <div class="card rounded shadow">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex justify-content-between ">
                <div class="media-body text-left">
                  <h3 class="success">{{$totalOrders}}</h3>
                  <span>Total Orders</span>
                </div>
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-box-seam text-success mt-2" viewBox="0 0 16 16">
                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/>
                    </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12 mb-md-0 mb-1">
        <div class="card rounded shadow">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex justify-content-between">
                <div class="media-body text-left">
                  <h3 class="danger">&#8377 {{$totalSells}}</h3>
                  <span>Total Sells</span>
                </div>
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-currency-rupee mt-2 text-secondary" viewBox="0 0 16 16">
                        <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4z"/>
                    </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- ord details --}}
    <section id="stats-subtitle">
        <div class="row">
            <div class="col-12 mt-3 mb-1">
            <h4 class="mx-1">Order Details :</h4>
            </div>
        </div>
        <div class="row mb-md-2 mb-0">
            <div class="col-xl-4 col-sm-6 col-12 mb-md-0 mb-1">
                <div class="card rounded shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex d-flex justify-content-between">
                                <div class="media-body text-left ">
                                    <h3 class="primary">{{$inProgressOrdersToday}}</h3>
                                    <span>Latest Products (Ordered)</span>
                                </div>
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-box-seam mt-2 text-info" viewBox="0 0 16 16">
                                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: {{$inProgressOrdersToday}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="1000"></div>
                            </div>
                            <div class="mt-1">
                                <small class="float-end">Total : {{$inProgressOrders}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12 mb-md-0 mb-1">
                <div class="card rounded shadow">
                    <div class="card-content">
                        <div class="card-body ">
                            <div class="media d-flex justify-content-between">
                                <div class="media-body text-left">
                                    <h3 class="warning">{{$pendingOrdersToday}}</h3>
                                    <span>Products (Pending)</span>
                                </div>
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-clock-history text-secondary mt-2" viewBox="0 0 16 16">
                                        <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z"/>
                                        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
                                        <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                <div class="progress-bar bg-secondary" role="progressbar" style="width: {{$pendingOrdersToday}}%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="mt-1">
                                <small class="float-end">Total : {{$pendingOrders}} </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12 mb-md-0 mb-1">
                <div class="card rounded shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex justify-content-between">
                                <div class="media-body text-left">
                                    <h3 class="danger">{{$shippedOrdersToday}}</h3>
                                    <span>Products (Shipped)</span>
                                </div>
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-gift mt-2 text-warning" viewBox="0 0 16 16">
                                        <path d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A3 3 0 0 1 3 2.506zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43zM9 3h2.932l.023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0zM1 4v2h6V4zm8 0v2h6V4zm5 3H9v8h4.5a.5.5 0 0 0 .5-.5zm-7 8V7H2v7.5a.5.5 0 0 0 .5.5z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: {{$shippedOrdersToday}}%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="mt-1">
                                <small class="float-end">Total : {{$shippedOrders}} </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-md-2 mb-0">
            <div class="col-xl-4 col-sm-6 col-12 mb-md-0 mb-1">
                <div class="card rounded shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex justify-content-between">
                                <div class="media-body text-left">
                                <h3 class="success">{{$deleveredOrdersToday}}</h3>
                                <span>Products (Delivered)</span>
                                </div>
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-truck text-success mt-2" viewBox="0 0 16 16">
                                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{$deleveredOrdersToday}}%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="mt-1">
                                <small class="float-end">Total : {{$deleveredOrders}} </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12 mb-md-0 mb-1">
                <div class="card rounded shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex d-flex justify-content-between">
                                <div class="media-body text-left ">
                                    <h3 class="primary">{{$cancelledOrdersToday}}</h3>
                                    <span>Products (Cancelled)</span>
                                </div>
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" fill="currentColor" class="mt-2 text-danger bi bi-x-lg" viewBox="0 0 16 16">
                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                      </svg>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{$cancelledOrdersToday}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="1000"></div>
                            </div>
                            <div class="mt-1">
                                <small class="float-end">Total : {{$cancelledOrders}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12 mb-md-0 mb-1">
                <div class="card rounded shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex d-flex justify-content-between">
                                <div class="media-body text-left ">
                                    <h3 class="primary">{{$returnedOrdersToday}}</h3>
                                    <span>Product (Retured)</span>
                                </div>
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-counterclockwise mt-2 text-danger" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z"/>
                                        <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466"/>
                                      </svg>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{$returnedOrdersToday}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="1000"></div>
                            </div>
                            <div class="mt-1">
                                <small class="float-end">Total : {{$returnedOrders}} </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- other details --}}

    <div class="row mt-2">
        <div class="row">
            <div class="col-12 mt-3 mb-1">
            <h4 class="mx-2">Other Details :</h4>
            </div>
        </div>

        <div class="col-md-5 mx-auto">
            <div class="shadow rounded">
                <div class="d-flex flex-md-row flex-column">
                    <div class="col-md-6 col-12 mb-md-0 mb-1">
                        <div class="card" style="border-radius: 5px 0 0 0">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex justify-content-between">
                                        <div class="media-body text-right">
                                            <h3>{{$categories}}</h3>
                                            <span>Categories</span>
                                        </div>
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" style="color:orangered" class="bi bi-list mt-2" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 mb-md-0 mb-1">
                        <div class="card" style="border-radius: 0 5px 0 0">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex justify-content-between">
                                        <div class="media-body text-right">
                                            <h3>{{$subCategories}}</h3>
                                            <span>Sub-Categories</span>
                                        </div>
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" style="color:darkblue" fill="currentColor" class="bi bi-list-task mt-2" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5zM3 3H2v1h1z"/>
                                                <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1z"/>
                                                <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5zM2 7h1v1H2zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm1 .5H2v1h1z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-md-0 mb-1">
                    <div class="card" style="border-radius:0 0 5px 5px">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex justify-content-between">
                                    <div class="media-body text-right">
                                        <h3>{{$brands}}</h3>
                                        <span>Brands</span>
                                    </div>
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" style="color:deepskyblue" fill="currentColor" class="bi bi-tags mt-2" viewBox="0 0 16 16">
                                            <path d="M3 2v4.586l7 7L14.586 9l-7-7zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586z"/>
                                            <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 mx-auto">
            <div class="shadow rounded">
                <div class="d-flex flex-md-row flex-column">
                    <div class="col-md-6 col-12 mb-md-0 mb-1">
                        <div class="card" style="border-radius: 5px 0 0 0">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex justify-content-between">
                                        <div class="media-body text-right">
                                            <h3>{{$materials}}</h3>
                                            <span>Materials</span>
                                        </div>
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" style="color:deeppink" fill="currentColor" class="bi bi-layers mt-2" viewBox="0 0 16 16">
                                                <path d="M8.235 1.559a.5.5 0 0 0-.47 0l-7.5 4a.5.5 0 0 0 0 .882L3.188 8 .264 9.559a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882L12.813 8l2.922-1.559a.5.5 0 0 0 0-.882zm3.515 7.008L14.438 10 8 13.433 1.562 10 4.25 8.567l3.515 1.874a.5.5 0 0 0 .47 0zM8 9.433 1.562 6 8 2.567 14.438 6z"/>
                                              </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 mb-md-0 mb-1">
                        <div class="card" style="border-radius: 0 5px 0 0">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex justify-content-between">
                                        <div class="media-body text-right">
                                            <h3>{{$sizes}}</h3>
                                            <span>Sizes</span>
                                        </div>
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-arrows-angle-expand mt-2 text-secondary" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707m4.344-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-md-0 mb-1">
                    <div class="card" style="border-radius:0 0 5px 5px">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex justify-content-between">
                                    <div class="media-body text-right">
                                        <h3>{{$colors}}</h3>
                                        <span>Colors</span>
                                    </div>
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" style="color:darkviolet" fill="currentColor" class="bi bi-palette mt-2" viewBox="0 0 16 16">
                                            <path d="M8 5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m4 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M5.5 7a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m.5 6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                                            <path d="M16 8c0 3.15-1.866 2.585-3.567 2.07C11.42 9.763 10.465 9.473 10 10c-.603.683-.475 1.819-.351 2.92C9.826 14.495 9.996 16 8 16a8 8 0 1 1 8-8m-8 7c.611 0 .654-.171.655-.176.078-.146.124-.464.07-1.119-.014-.168-.037-.37-.061-.591-.052-.464-.112-1.005-.118-1.462-.01-.707.083-1.61.704-2.314.369-.417.845-.578 1.272-.618.404-.038.812.026 1.16.104.343.077.702.186 1.025.284l.028.008c.346.105.658.199.953.266.653.148.904.083.991.024C14.717 9.38 15 9.161 15 8a7 7 0 1 0-7 7"/>
                                          </svg>
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
@endsection
