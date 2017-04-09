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
        <a href="{{ route('backend.laporan.priod') }}">Laporan</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Periode Laporan</span>
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
                    <span class="caption-subject bold uppercase"> Pilih Periode Laporan</span>
                </div>
            </div>

            <div class="portlet-body form">
                {!! Form::open(['route' => ['backend.laporan.result'], 'files' => true]) !!}
                <div class="form-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-block alert-danger fade in">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <h4 class="alert-heading">Ooppss ada error.</h4>
                        @foreach ($errors->all() as $error)
                        <p><i class="fa fa-close font-red-mint"></i>&nbsp;{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif

                    <div class="form-group form-md-line-input ">
                        {!! Form::select('bulan', [1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'Nopember',12=>'Desember'], null,['id'=>'bulan','class'=>'form-control', 'required']) !!}
                        <label for="tgl_service">Bulan</label>
                    </div>
                </div>
                <div class="form-actions noborder">
                    <button type="submit" class="btn blue">Submit</button>
                </div>
                </form>
            </div>
        </div>

    </div>

</div>
<!-- END PAGE BASE CONTENT -->
@endsection

@push('plugin_scripts')
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
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
    });
</script>
@endpush