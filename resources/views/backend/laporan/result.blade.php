@extends('layouts.backend')

@push('plugin_css')
<link href="{{ url('assets') }}/backend/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('assets') }}/backend/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
@endpush

@push('page_css')
@endpush

@section('content')
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Laporan
                <small>Result</small>
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
            <a href="{{ route('backend.laporan.priod') }}">Laporan</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Result</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 bordered">
                <div class="display">
                    <div class="number">
                        <h3 class="font-green-sharp">
                            <span data-counter="counterup" data-value="{{ $total_profit }}">{{ number_format($total_profit,0,',','.') }}</span>
                        </h3>
                        <small>TOTAL TRANSAKSI</small>
                    </div>
                    <div class="icon">
                        <i class="icon-pie-chart"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                                        <span style="width: {{ $persen }}%;" class="progress-bar progress-bar-success green-sharp">
                                            <span class="sr-only">{{ $persen }}% progress</span>
                                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> Total </div>
                        <div class="status-number"> {{ $persen }}% </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 bordered">
                <div class="display">
                    <div class="number">
                        <h3 class="font-blue-sharp">
                            <span data-counter="counterup" data-value="{{ $total_service }}">{{ number_format($total_service,0,',','.') }}</span>
                        </h3>
                        <small>TOTAL SERVICE</small>
                    </div>
                    <div class="icon">
                        <i class="icon-basket"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                                        <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                                            <span class="sr-only">45% grow</span>
                                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> transaksi </div>
                        <div class="status-number"> 100% </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 bordered">
                <div class="display">
                    <div class="number">
                        <h3 class="font-green-sharp">
                            <span data-counter="counterup" data-value="{{ $total_profit-$total_service }}">{{ number_format($total_profit-$total_service,0,',','.') }}</span>
                        </h3>
                        <small>TOTAL PROFIT</small>
                    </div>
                    <div class="icon">
                        <i class="icon-pie-chart"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                                        <span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
                                            <span class="sr-only">100% progress</span>
                                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> Total </div>
                        <div class="status-number"> 100% </div>
                    </div>
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
                        <span class="caption-subject font-green sbold uppercase">Laporan Transaksi Bulan {{ $periode }}</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                <i class="fa fa-share"></i>
                                <span class="hidden-xs"> Export Tools </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right" id="sample_1_tools">
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
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th> No </th>
                                <th> Transaksi </th>
                                <th> Nama Kendaraan </th>
                                <th> Nama Customer </th>
                                <th> Telp </th>
                                <th> Total </th>
                                <th> Denda </th>
                                <th> Tgl Sewa </th>
                                <th> Durasi </th>
                                <th> Status </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no =1 ?>
                            @foreach($model as $row)
                                <tr>
                                    <td> {{ $no }} </td>
                                    <td> {{ date('d/m/Y',strtotime($row->created_at)) }}</td>
                                    <td> {{ $row->kendaraan->nama }} - {{ $row->kendaraan->plat_no }}</td>
                                    <td> {{ $row->nama }} </td>
                                    <td> {{ $row->telp }} </td>
                                    <td> {{ number_format($row->total,0,',','.') }} </td>
                                    <td> {{ number_format($row->denda,0,',','.') }} </td>
                                    <td> {{ date('d/m/Y',strtotime($row->tgl_sewa)) }} </td>
                                    <td> {{ $row->durasi }} Hari </td>
                                    <td> {{ $row->getStatus() }} </td>
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

    <div class="row">
        <div class="col-md-12">
            <!-- Begin: life time stats -->
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">Laporan Service Bulan {{ $periode }}</span>
                    </div>
                    <div class="actions" style="display: none;">
                        <div class="btn-group">
                            <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                <i class="fa fa-share"></i>
                                <span class="hidden-xs"> Export Tools </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right" id="sample_4_tools">
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
                        <table class="table table-striped table-bordered table-hover" id="sample_4">
                            <thead>
                            <tr>
                                <th> No </th>
                                <th> Nama Kendaraan </th>
                                <th> Tanggal Service </th>
                                <th> Total </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $_no =1 ?>
                            @foreach($service as $_row)
                                <tr>
                                    <td> {{ $_no }} </td>
                                    <td> {{ $_row->kendaraan->nama }} - {{ $_row->kendaraan->plat_no }}</td>
                                    <td> {{ date('d/m/Y',strtotime($_row->service_date)) }} </td>
                                    <td> {{ number_format($_row->total,0,',','.') }} </td>
                                </tr>
                                <?php $_no++ ?>
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
<script src="{{ url('assets') }}/backend/global/scripts/datatable.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/backend/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/backend/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
@endpush

@push('scripts')
<script>
    a=function(){
        var e=$("#sample_1"),
                t=e.dataTable({
                    language:{
                        aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},
                        emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ entries",infoEmpty:"No entries found",
                        infoFiltered:"(filtered1 from _MAX_ total entries)",
                        lengthMenu:"_MENU_ entries",
                        search:"Search:",
                        zeroRecords:"No matching records found"
                    },
                    buttons:[
                        {extend:"print",className:"btn dark btn-outline"},
                        {extend:"copy",className:"btn red btn-outline"},
                        {extend:"pdf",className:"btn green btn-outline"},
                        {extend:"excel",className:"btn yellow btn-outline "},
                        {extend:"csv",className:"btn purple btn-outline "},
                        {extend:"colvis",className:"btn dark btn-outline",text:"Columns"}
                    ],
                    responsive:!0,
                    order:[[0,"asc"]],
                    lengthMenu:[[5,10,15,20,-1],[5,10,15,20,"All"]],
                    pageLength:10
                });
        $("#sample_1_tools > li > a.tool-action").on("click",function(){
            var e=$(this).attr("data-action");
            t.DataTable().button(e).trigger()
        })
    };

    b=function(){
        var e=$("#sample_4"),
                t=e.dataTable({
                    language:{
                        aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},
                        emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ entries",infoEmpty:"No entries found",
                        infoFiltered:"(filtered1 from _MAX_ total entries)",
                        lengthMenu:"_MENU_ entries",
                        search:"Search:",
                        zeroRecords:"No matching records found"
                    },
                    buttons:[
                        {extend:"print",className:"btn dark btn-outline"},
                        {extend:"copy",className:"btn red btn-outline"},
                        {extend:"pdf",className:"btn green btn-outline"},
                        {extend:"excel",className:"btn yellow btn-outline "},
                        {extend:"csv",className:"btn purple btn-outline "},
                        {extend:"colvis",className:"btn dark btn-outline",text:"Columns"}
                    ],
                    responsive:!0,
                    order:[[0,"asc"]],
                    lengthMenu:[[5,10,15,20,-1],[5,10,15,20,"All"]],
                    pageLength:10
                });
        $("#sample_4_tools > li > b.tool-action").on("click",function(){
            var e=$(this).attr("data-action");
            t.DataTable().button(e).trigger()
        })
    };
    jQuery(document).ready(function(){
        jQuery().dataTable&&(a());
        jQuery().dataTable&&(b());
    });
</script>
@endpush