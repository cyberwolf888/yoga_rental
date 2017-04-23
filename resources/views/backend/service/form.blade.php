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
            <a href="{{ route('backend.service.manage') }}">Service</a>
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
                        <span class="caption-subject bold uppercase"> Add New Data</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    {!! Form::open(['route' => ['backend.service.store', $kendaraan->id], 'files' => true]) !!}
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

                        <div class="form-group form-md-line-input {{ $errors->has('service_date') ? ' has-error' : '' }}">
                            {!! Form::text('service_date', $model->service_date, ['id'=>'service_date','placeholder'=>'','class'=>'form-control date-picker', 'required', 'readonly']) !!}
                            <label for="nama">Tanggal Service</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('total') ? ' has-error' : '' }}">
                            {!! Form::number('total', $model->total, ['id'=>'total','min'=>0,'placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="harga">Total Service</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('pic') ? ' has-error' : '' }}">
                            {!! Form::text('pic', $model->pic, ['id'=>'pic','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="nama">Penanggung Jawab</label>
                        </div>

                        <div class="form-group last">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="{{ url('assets') }}/backend/global/img/no_image.png" alt="" /> </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new"> Select image </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file" name="image" required> </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue">Submit</button>
                    </div>
                    </form>
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