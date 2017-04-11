@extends('layouts.frontend')

@section('content')
    <!-- BREADCRUMBS -->
    <section class="page-section breadcrumbs text-right">
        <div class="container">
            <div class="page-header">
                <h1>Daftar Mobil</h1>
            </div>
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">Daftar Mobil</li>
            </ul>
        </div>
    </section>
    <!-- /BREADCRUMBS -->

    <!-- PAGE WITH SIDEBAR -->
    <section class="page-section with-sidebar sub-page">
        <div class="container">
            <div class="row">
                <!-- CONTENT -->
                <div class="col-md-offset-2 col-md-8 content car-listing" id="content">

                    <!-- Car Listing -->

                    @foreach($model as $row)
                    <div class="thumbnail no-border no-padding thumbnail-car-card clearfix">
                        <div class="media">
                            <a class="media-link" data-gal="prettyPhoto" href="{{ url('images/kendaraan') }}/{{ $row->image }}">
                                <img src="{{ url('images/kendaraan') }}/{{ $row->image }}" alt="" style="width:370px; height:220px;"/>
                                <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                            </a>
                        </div>
                        <div class="caption">
                            <h4 class="caption-title"><a href="#">{{ strtoupper($row->nama) }}</a></h4>
                            <h5 class="caption-title-sub">Start from Rp {{ number_format($row->harga,0,',','.') }}/per a day</h5>

                            <table class="table">
                                <tr>
                                    <td><i class="fa fa-car"></i> {{ strtoupper($row->merek) }}</td>
                                    <td><i class="fa fa-dashboard"></i> {{ strtoupper($row->warna) }}</td>
                                    <td><i class="fa fa-road"></i> {{ number_format($row->kmmeter,0,',','.') }} km</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    @endforeach
                    <!-- /Car Listing -->

                    <!-- Pagination -->
                    <div class="pagination-wrapper">
                        <!-- <ul class="pagination">
                            <li class="disabled"><a href="#"><i class="fa fa-angle-double-left"></i> Previous</a></li>
                            <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">Next <i class="fa fa-angle-double-right"></i></a></li>
                        </ul> -->
                        @include('frontend.pagination', ['paginator' => $model])
                    </div>
                    <!-- /Pagination -->

                </div>
                <!-- /CONTENT -->

            </div>
        </div>
    </section>
    <!-- /PAGE WITH SIDEBAR -->
@endsection