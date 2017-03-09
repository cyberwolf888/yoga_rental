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
                        <span class="caption-subject bold uppercase"> Add New Data</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    {!! Form::open(['route' => isset($update) ? ['backend.kendaraan.update', $model->id] : 'backend.kendaraan.store', 'files' => true]) !!}
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

                            <div class="form-group form-md-line-input {{ $errors->has('nama') ? ' has-error' : '' }}">
                                {!! Form::text('nama', $model->nama, ['id'=>'nama','placeholder'=>'','class'=>'form-control', 'required']) !!}
                                <label for="nama">Nama Kendaraan</label>
                            </div>

                            <div class="form-group form-md-line-input {{ $errors->has('merek') ? ' has-error' : '' }}">
                                {!! Form::text('merek', $model->merek, ['id'=>'merek','placeholder'=>'','class'=>'form-control', 'required']) !!}
                                <label for="merek">Merek Kendaraan</label>
                            </div>

                            <div class="form-group form-md-line-input {{ $errors->has('warna') ? ' has-error' : '' }}">
                                {!! Form::text('warna', $model->warna, ['id'=>'warna','placeholder'=>'','class'=>'form-control', 'required']) !!}
                                <label for="warna">Warna Kendaraan</label>
                            </div>

                            <div class="form-group form-md-line-input {{ $errors->has('type') ? ' has-error' : '' }}">
                                {!! Form::select('type', ['1' => 'Speda Motor', '2' => 'Mobil'], $model->type,['id'=>'type','placeholder'=>'','class'=>'form-control', 'required']) !!}
                                <label for="type">Type Kendaraan</label>
                            </div>

                            <div class="form-group form-md-line-input {{ $errors->has('plat_no') ? ' has-error' : '' }}">
                                {!! Form::text('plat_no', $model->plat_no, ['id'=>'plat_no','placeholder'=>'','class'=>'form-control', 'required']) !!}
                                <label for="plat_no">Plat Nomer Kendaraan</label>
                            </div>

                            <div class="form-group form-md-line-input {{ $errors->has('status') ? ' has-error' : '' }}">
                                {!! Form::select('status', ['1'=>'Tersedia','2'=>'Sedang disewa'], $model->status,['id'=>'status','placeholder'=>'','class'=>'form-control', 'required']) !!}
                                <label for="status">Status Kendaraan</label>
                            </div>

                            <div class="form-group form-md-line-input {{ $errors->has('harga') ? ' has-error' : '' }}">
                                {!! Form::number('harga', $model->harga, ['id'=>'harga','placeholder'=>'','class'=>'form-control', 'required']) !!}
                                <label for="harga">Harga Sewa /Hari</label>
                            </div>

                            <div class="form-group form-md-line-input {{ $errors->has('tgl_service') ? ' has-error' : '' }}">
                                {!! Form::select('tgl_service', $model->getTglService(), $model->tgl_service,['id'=>'tgl_service','placeholder'=>'','class'=>'form-control', 'required']) !!}
                                <label for="tgl_service">Tanggal Service</label>
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
    </div>
    <!-- END PAGE BASE CONTENT -->
@endsection

@push('plugin_scripts')
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
@endpush

@push('scripts')
@endpush