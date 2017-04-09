@extends('layouts.backend')

@push('plugin_css')
<link href="{{ url('assets') }}/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="{{ url('assets') }}/backend/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('page_css')
@endpush

@section('content')
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Service
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
            <a href="{{ route('backend.transaksi.manage') }}">Transaksi</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Detail Transaksi</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-md-12 ">
            <a href="{{ route('backend.transaksi.invoice',$model->id) }}" class="btn blue btn-circle" target="_blank"><i class="fa fa-print"></i> Print Invoice</a>
        </div>
    </div>
    <br>
    @if($model->status == \App\Models\Transaksi::S_NEW)
        <div class="row">
            <div class="col-md-12 ">
                <a href="javascript:void(0)" class="btn btn-circle green-jungle" id="finish">
                    <i class="fa fa-check"></i> Selesaikan Transaksi
                </a>

                <a href="{{ route('backend.transaksi.cancel',$model->id) }}" class="btn btn-circle red-mint">
                    <i class="fa fa-close"></i> Batalkan Transaksi
                </a>
            </div>
        </div>
        <br>
        @if($model->getDenda()>0)
            <div class="alert alert-block alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert"></button>
                <h4 class="alert-heading">Pelanggan ini mendapatkan denda sebesar Rp. {{ number_format($model->getDenda(),0,',','.') }}</h4>
            </div>
        @endif
    @endif

    <div class="row">
        <div class="col-md-6 ">

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Detail Transaksi</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    <table class="table table-bordered m-n" cellspacing="0">
                        <tbody>
                        <tr>
                            <td>
                                <h4><small>Nama Customer</small></h4>
                                <h4>{{ $model->nama }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Telp Customer</small></h4>
                                <h4>{{ $model->telp }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Alamat Customer</small></h4>
                                <h4>{{ $model->alamat }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Tipe Identitas</small></h4>
                                <h4>{{ $model->getIdType() }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>No Identitas</small></h4>
                                <h4>{{ $model->id_no }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Image Identitas</small></h4>
                                <img src="{{ url('images/transaksi/'.$model->id_image) }}" class="img-responsive">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Tanggal Sewa</small></h4>
                                <h4>{{ date('d/m/Y',strtotime($model->tgl_sewa)) }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Durasi</small></h4>
                                <h4>{{ $model->durasi }} Hari</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Km Start</small></h4>
                                <h4>{{ number_format($model->kmstart,0,',','.') }} km</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Km End</small></h4>
                                <h4>{{ number_format($model->kmend,0,',','.') }} km</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                @if($model->status == \App\Models\Transaksi::S_FINSIH)
                                    <h4><small>Tanggal Dikembalikan</small></h4>
                                    <h4>{{ date('d/m/Y',strtotime($model->tgl_kembali)) }}</h4>
                                @else
                                    <h4><small>Tanggal Dikembalikan</small></h4>
                                    <h4>Belum Dikembalikan</h4>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                @if($model->status == \App\Models\Transaksi::S_NEW)
                                    <h4><small>Denda</small></h4>
                                    <h4>Rp {{ number_format($model->getDenda(),0,',','.') }}</h4>
                                @else
                                    <h4><small>Denda</small></h4>
                                    <h4>Rp {{ number_format($model->denda,0,',','.') }}</h4>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Total</small></h4>
                                <h4>Rp {{ number_format($model->total,0,',','.') }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Status</small></h4>
                                <h4>{{ $model->getStatus() }}</h4>
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
                        <span class="caption-subject bold uppercase"> Detail Kendaraan </span>
                    </div>
                </div>

                <div class="portlet-body form">
                    <table class="table table-bordered m-n" cellspacing="0">
                        <tbody>
                        <tr>
                            <td>
                                <img src="{{ url('images/kendaraan/'.$kendaraan->image) }}" class="img-responsive">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Nama Kendaraan</small></h4>
                                <h4>{{ $kendaraan->nama }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Merek</small></h4>
                                <h4>{{ $kendaraan->merek }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Tipe Kendaraan</small></h4>
                                <h4>{{ $kendaraan->getType() }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Warna Kendaraan</small></h4>
                                <h4>{{ $kendaraan->warna }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Pnat Nomer Kendaraan</small></h4>
                                <h4>{{ $kendaraan->plat_no }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Status Kendaraan</small></h4>
                                <h4>{{ $kendaraan->getStatus() }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Harga Sewa</small></h4>
                                <h4>{{ number_format($kendaraan->harga,0,',','.') }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Km Meter</small></h4>
                                <h4>{{ number_format($kendaraan->kmmeter,0,',','.') }} km</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Tanggal Service</small></h4>
                                <h4>{{ $kendaraan->tgl_service }}</h4>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->

    <form method="post" action="{{ route('backend.transaksi.finish',$model->id) }}" id="frm_finish">
        {{ csrf_field() }}
        <input type="hidden" name="km_end" id="km_end">
    </form>
@endsection

@push('plugin_scripts')
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/backend/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
@endpush

@push('scripts')
<script>
    jQuery(document).ready(function(){

        jQuery().datepicker&&$(".date-picker").datepicker({
            format: 'dd-mm-yyyy',
            orientation:"left",
            autoclose:!0
        });
        $(document).scroll(function(){$(".date-picker").datepicker("place")});

        $("#finish").click(function(){
            bootbox.prompt("Km meter motor", function(result){ $("#km_end").val(result); $("#frm_finish").submit(); });
        });

    });

    $("#durasi").change(function () {

        var total = <?= $kendaraan->harga ?> * $("#durasi").val();
        $("#total").val(total);
    })
</script>
@endpush