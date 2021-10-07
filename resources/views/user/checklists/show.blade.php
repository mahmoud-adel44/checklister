@extends('layouts.master')

@section('content')

        @livewire('header-total-count' , ['checklist_group_id' =>$checklist->checklist_group_id ])
        @livewire('checklist-show' ,['checklist' => $checklist] )

    <div class="col-md-3">
        <!-- Info Boxes Style 2 -->
        <div class="info-box mb-3 bg-warning">
            <span class="info-box-icon"><i class="fas fa-tag"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Inventory</span>
                <span class="info-box-number">5,200</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box mb-3 bg-success">
            <span class="info-box-icon"><i class="far fa-heart"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Mentions</span>
                <span class="info-box-number">92,050</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Downloads</span>
                <span class="info-box-number">114,381</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box mb-3 bg-info">
            <span class="info-box-icon"><i class="far fa-comment"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Direct Messages</span>
                <span class="info-box-number">163,921</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->



        <!-- PRODUCT LIST -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recently Added Products</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <ul class="products-list product-list-in-card  pr-2">
                    <li class="item">

                        <div class="product-info" style="margin-left: 17px !important;">
                            <a href="javascript:void(0)" class="product-title">Samsung TV
                                <span class="badge badge-warning float-right">$1800</span></a>
                            <span class="product-description">
                        Samsung 32" 1080p 60Hz LED Smart HDTV.
                      </span>
                        </div>
                    </li>
                    <li class="item">

                        <div class="product-info" style="margin-left: 17px !important;">
                            <a href="javascript:void(0)" class="product-title">Samsung TV
                                <span class="badge badge-warning float-right">$1800</span></a>
                            <span class="product-description">
                        Samsung 32" 1080p 60Hz LED Smart HDTV.
                      </span>
                        </div>
                    </li>

                </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Products</a>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>



@endsection

