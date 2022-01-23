@extends('admin.layouts.main')

@section('title', 'Keluarga')

@section('page_content')

@php
use App\Models\Model\Penduduk;
@endphp

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <a type="button" data-toggle="modal" data-target="#modalBox" class="btn btn-social btn-success btn-flat btn-sm">
                        <i class="fa fa-plus"></i> Tambah Rumah Tangga
                    </a>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Aksi</th>
                                    <th class="text-center">Foto</th>
                                    <th>Nomor Rumah Tangga</th>
                                    <th>Kepala Rumah Tangga</th>
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">Jumlah Anggota</th>
                                    <th class="text-center">Tanggal Terdaftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_rtm as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td class="text-center">
                                        <a href="{{ url('/page/admin/kependudukan/rtm/'.$data->id.'/rincian_rtm') }}" class="btn bg-purple btn-flat btn-sm">
                                            <i class="fa fa-list-ol"></i>
                                        </a>
                                        <a onclick="tambahAnggotaRumahTangga({{ $data->id }})" type="button" data-toggle="modal" data-target="#modal-default-tambah" class="btn btn-success btn-flat btn-sm" title="Tambah Anggota Rumah Tangga">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a type="button" data-toggle="modal" data-target="#modal-default-ubah" class="btn btn-warning btn-flat btn-sm" title="Ubah Data">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="" class="btn btn-danger btn-flat btn-sm" title="Hapus Data">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{ url('/gambar/gambar_kepala_user.png') }}" width="50" >
                                    </td>
                                    <td>{{ $data->getDataPenduduk->id_rtm }}</td>
                                    <td>{{ $data->getDataPenduduk->nama }}</td>
                                    <td class="text-center">{{ $data->getDataPenduduk->nik }}</td>
                                    <td class="text-center">
                                        @php
                                        $jumlah = Penduduk::where("id_rtm", $data->no_kk)->count();
                                        @endphp
                                        {{ $jumlah }}
                                    </td>
                                    <td class="text-center">{{ $data->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tambah Rumah Tangga -->
<div class="modal fade" id="modalBox">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-plus"></i> Tambah Data Rumah Tangga Per Penduduk
                </h4>
            </div>
            <form action="{{ url('/page/admin/kependudukan/rtm/') }}" method="POST" id="formTambahRTM">
                @csrf
                <div class="modal-body" id="isian-modal">
                    <div class="form-group">
                        <label for="nik_kepala"> Kepala Rumah Tangga </label>
                        <select name="nik_kepala" id="nik_kepala" class="form-control input-sm select2" style="width: 100%">
                            <option value="">- Pilih -</option>
                            @php
                            $getDataPenduduk = DB::table("tb_penduduk")
                            ->where("id_rtm", NULL)
                            ->get();
                            @endphp
                            @foreach ($getDataPenduduk as $penduduk)
                            <option value="{{ $penduduk->id }}">
                                NIK : {{ $penduduk->nik }} - {{ $penduduk->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea cols="5" rows="3" class="form-control input-sm" disabled>Silakan cari nama / NIK dari data penduduk yang sudah terinput. Penduduk yang dipilih otomatis berstatus sebagai Kepala Rumah Tangga baru tersebut.
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger btn-flat btn-sm pull-left">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary btn-flat btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Tambah -->
<div class="modal fade" id="modal-default-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-plus"></i> Tambah Anggota Rumah Tangga
                </h4>
            </div>
            <form action="{{ url('/page/admin/kependudukan/rtm/simpan_data_anggota_rumah_tangga') }}" method="POST">
                @csrf
                <div class="modal-body" id="isian-data">

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger btn-flat btn-sm pull-left">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary btn-flat btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Ubah -->

<!-- END -->

@endsection

@section('page_scripts')

<script type="text/javascript">

    function tambahAnggotaRumahTangga(id)
    {
        $.ajax({
            url : "{{ url('/page/admin/kependudukan/rtm/tambah_anggota_rumah_tangga') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#isian-data").html(data);
                return true;
            }
        });
    }

    (function($,W,D) {
        var JQUERY4U = {};
        JQUERY4U.UTIL =
        {
            setupFormValidation: function()
            {
                $("#formTambahRTM").validate({
                    ignore: "",
                    rules: {
                        nik_kepala: {
                            required: true
                        },
                    },

                    messages: {
                        nik_kepala: {
                            required: "Kepala keluarga harap di isi!"
                        },
                    },

                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            }
        }

        $(D).ready(function($) {
            JQUERY4U.UTIL.setupFormValidation();
        });

    })(jQuery, window, document);
</script>

@endsection
