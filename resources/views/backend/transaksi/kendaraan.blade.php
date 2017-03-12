@extends('layouts.backend')

@push('plugin_css')
<link href="{{ url('assets') }}/backend/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('assets') }}/backend/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
@endpush

@push('page_css')
@endpush

@section('content')
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-md-12">
            <!-- Begin: life time stats -->
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">Pilih Kendaraan</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="table-container">
                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                            <tr>
                                <th> No </th>
                                <th> Nama Kendaraan </th>
                                <th> Merek </th>
                                <th> Tipe </th>
                                <th> Warna </th>
                                <th> Harga Sewa </th>
                                <th> Status </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no =1 ?>
                            @foreach($model as $row)
                                <tr>
                                    <td> {{ $no }} </td>
                                    <td> {{ $row->nama }} - {{ $row->plat_no }}</td>
                                    <td> {{ $row->merek }} </td>
                                    <td> {{ $row->getType() }} </td>
                                    <td> {{ $row->warna }} </td>
                                    <td> {{ number_format($row->harga,0,',','.') }} </td>
                                    <td> {{ $row->getStatus() }} </td>
                                    <td class="center" width="130">
                                        <a href="{{ route('backend.kendaraan.detail',$row->id) }}" class="btn green-steel btn-xs"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('backend.transaksi.create',$row->id) }}" class="btn blue btn-xs"><i class="fa fa-check"></i> Sewa</a>
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
<script src="{{ url('assets') }}/backend/global/scripts/datatable.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/backend/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/backend/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
@endpush

@push('scripts')
<script>
    a=function(){
        var e=$("#sample_3"),
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
        $("#sample_3_tools > li > a.tool-action").on("click",function(){
            var e=$(this).attr("data-action");
            t.DataTable().button(e).trigger()
        })
    };
    jQuery(document).ready(function(){
        jQuery().dataTable&&(a());
    });
</script>
@endpush