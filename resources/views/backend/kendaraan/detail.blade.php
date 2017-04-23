@extends('layouts.backend')

@push('plugin_css')
<link href="{{ url('assets') }}/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
@endpush

@push('page_css')
@endpush

@section('content')
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Kendaraan
                <small>Add New Data</small>
            </h1>
        </div>
        <!-- END PAGE TITLE -->
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('backend.dashboard') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('backend.kendaraan.manage') }}">Kendaraan</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Add New Data</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-md-6 ">

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Detail Kendaraan </span>
                    </div>
                </div>

                <div class="portlet-body form">
                    <table class="table table-bordered m-n" cellspacing="0">
                        <tbody>
                        <tr>
                            <td>
                                <img src="{{ url('images/kendaraan/'.$model->image) }}" class="img-responsive">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Nama Kendaraan</small></h4>
                                <h4>{{ $model->nama }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Merek</small></h4>
                                <h4>{{ $model->merek }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Tipe Kendaraan</small></h4>
                                <h4>{{ $model->getType() }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Warna Kendaraan</small></h4>
                                <h4>{{ $model->warna }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Pnat Nomer Kendaraan</small></h4>
                                <h4>{{ $model->plat_no }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Status Kendaraan</small></h4>
                                <h4>{{ $model->getStatus() }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Harga Sewa</small></h4>
                                <h4>{{ number_format($model->harga,0,',','.') }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Km Meter</small></h4>
                                <h4>{{ number_format($model->kmmeter,0,',','.') }} km</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Tanggal Service</small></h4>
                                <h4>{{ $model->tgl_service }}</h4>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="col-md-6 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Riwayat Pemesanan Kendaraan </span>
                    </div>
                </div>

                <div class="portlet-body form">
                    <table class="table table-bordered m-n" cellspacing="0">
                        <th>Tgl Sewa</th>
                        <th>Durasi</th>
                        <th>Jarak Tempuh</th>
                        <th>Status</th>
                        <th></th>
                        <tbody>
                        <?php $no =1 ?>
                        @foreach(\App\Models\Transaksi::where('kendaraan_id',$model->id)->get() as $transaksi)
                            <tr>
                                <td>{{ date('d/m/Y',strtotime($transaksi->tgl_sewa)) }}</td>
                                <td>{{ $transaksi->durasi }} hari</td>
                                <td>{{ $transaksi->status == \App\Models\Transaksi::S_FINSIH ? $transaksi->kmend-$transaksi->kmstart : '-'}} km</td>
                                <td>{{ $transaksi->getStatus() }}</td>
                                <td><a href="{{ route('backend.transaksi.detail',$transaksi->id) }}" class="btn green-steel btn-xs"><i class="fa fa-eye"></i></a></td>
                            </tr>
                            <?php $no++ ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- Begin: life time stats -->
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">Manage Service</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                <i class="fa fa-share"></i>
                                <span class="hidden-xs"> Export Tools </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right" id="sample_3_tools">
                                <li>
                                    <a href="javascript:;" data-action="0" class="tool-action">
                                        <i class="icon-printer"></i> Print</a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-action="1" class="tool-action">
                                        <i class="icon-check"></i> Copy</a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-action="2" class="tool-action">
                                        <i class="icon-doc"></i> PDF</a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-action="3" class="tool-action">
                                        <i class="icon-paper-clip"></i> Excel</a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-action="4" class="tool-action">
                                        <i class="icon-cloud-upload"></i> CSV</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-container">
                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                            <tr>
                                <th> No </th>
                                <th> Nama Kendaraan </th>
                                <th> Tanggal Service </th>
                                <th> Penanggung Jawab </th>
                                <th> Total </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no =1 ?>
                            @foreach($service as $_row)
                                <tr>
                                    <td> {{ $no }} </td>
                                    <td> {{ $_row->kendaraan->nama }} - {{ $_row->kendaraan->plat_no }}</td>
                                    <td> {{ date('d/m/Y',strtotime($_row->service_date)) }} </td>
                                    <td> {{ $_row->pic }} </td>
                                    <td> {{ number_format($_row->total,0,',','.') }} </td>
                                    <td class="center" width="130">
                                        <a href="{{ route('backend.service.detail',$_row->id) }}" class="btn green-steel btn-xs"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                <?php $no++ ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End: life time stats -->
        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->
@endsection

@push('plugin_scripts')
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
@endpush

@push('scripts')
@endpush