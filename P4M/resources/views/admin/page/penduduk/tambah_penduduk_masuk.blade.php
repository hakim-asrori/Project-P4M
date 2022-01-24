@extends('admin.layouts.main')

@section('title', 'Biodata Penduduk')

@section('page_content')

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
    <form action="{{ url('/page/admin/kependudukan/keluarga/tambah_data_penduduk_masuk/') }}" method="POST" enctype="multipart/form-data" id="formTambahPendudukMasuk">
        @csrf

        <div class="row">

            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="gambar-preview img-responsive img-circle profile-user-img" src="{{ url('/gambar/gambar_kepala_user.png') }}" alt="Foto Penduduk">

                        <input type="file" name="foto" id="foto" class="form-control input-sm">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <a href="{{ url('/page/admin/kependudukan/penduduk/') }}" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Data Penduduk">
                            <i class="fa fa-arrow-circle-o-left"></i>Kembali Ke Daftar Penduduk
                        </a>
                    </div>
                    <div class="box-body">
                        <div class="row">

                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for=""> Tanggal Pindah Masuk </label>
                                    <div class="input-group input-group-sm date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input class="form-control input-sm pull-right" id="tgl_6" name="tgl_lapor" type="text" value="20-01-2022">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for=""> Tanggal Lapor </label>
                                    <div class="input-group input-group-sm date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input class="form-control input-sm pull-right" id="tgl_6" name="tgl_lapor" type="text" value="20-01-2022">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group bg-info" style="padding: 5px;">
                                    <label class="text-right"><strong>DATA DIRI :</strong></label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nik"> NIK </label>
                                    <input type="text" name="nik" id="nik" class="form-control input-sm" placeholder="Masukkan NIK">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="nama"> Nama Lengkap </label>
                                    <input type="text" name="nama" id="nama" class="form-control input-sm" placeholder="Masukkan Data Kepala KK">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label for="kk_sebelumnya"> Nomor KK Sebelumnya </label>
                                <input type="text" class="form-control input-sm" name="kk_sebelumnya" id="kk_sebelumnya" placeholder="No. KK Sebelumnya">
                            </div>
                            <div class="col-sm-4">
                                <label for="id_hubungan"> Hubungan Dalam Keluarga </label>
                                <select name="id_hubungan" id="id_hubungan" class="form-control input-sm select2">
                                    <option value="">- Pilih -</option>
                                    @foreach ($data_hubungan as $hubungan)
                                    <option value="{{ $hubungan->id }}">
                                        {{ $hubungan->nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="id_sex"> Jenis Kelamin </label>
                                <select name="id_sex" id="id_sex" class="form-control input-sm">
                                    <option value="">- Pilih -</option>
                                    @foreach ($data_kelamin as $sex)
                                    <option value="{{ $sex->id }}">
                                        {{ $sex->nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-7">
                                <label for="id_agama"> Agama </label>
                                <select name="id_agama" id="id_agama" class="form-control input-sm select2">
                                    <option value="">- Pilih -</option>
                                    @foreach ($data_agama as $agama)
                                    <option value="{{ $agama->id }}">
                                        {{ $agama->nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <label for="contoh"> Status Penduduk </label>
                                <select name="" id="" class="form-control input-sm select2">
                                    <option value="">- Pilih -</option>
                                    <option value="">Tetap</option>
                                </select>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group bg-info" style="padding: 5px; margin-top: 15px;">
                                    <label class="text-right"><strong>DATA KELAHIRAN :</strong></label>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="akta_lahir"> Nomor Akta Kelahiran </label>
                                    <input type="text" name="akta_lahir" id="akta_lahir" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="tempat_lahir"> Tempat Lahir </label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control input-sm">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="tgl_lahir"> Tanggal Lahir </label>
                                    <div class="input-group input-group-sm date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input class="form-control input-sm pull-right datepicker" name="tgl_lahir" id="tgl_lahir" type="text" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="waktu_lahir"> Waktu Kelahiran </label>
                                    <div class="input-group input-group-sm date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input class="form-control input-sm pull-right timepicker" id="waktu_lahir" name="waktu_lahir" type="text" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for=""> Tempat Dilahirkan </label>
                                    <select name="" id="" class="form-control input-sm select2">
                                        <option value="">- Pilih -</option>
                                        <option value="">RS/RB</option>
                                        <option value="">PUSKESMAS</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="jenis_kelahiran"> Jenis Kelahiran </label>
                                    <select name="jenis_kelahiran" id="jenis_kelahiran" class="form-control input-sm">
                                        <option value="">- Pilih -</option>
                                        <option value="1">TUNGGAL</option>
                                        <option value="2">KEMBAR 2</option>
                                        <option value="3">KEMBAR 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="kelahiran_ke"> Anak Ke </label>
                                    <input type="text" name="kelahiran_ke" id="kelahiran_ke" class="form-control input-sm" min="1">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="berat_lahir"> Berat Lahir </label>
                                    <input type="text" name="berat_lahir" id="berat_lahir" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="panjang_lahir"> Panjang Lahir </label>
                                    <input type="text" name="panjang_lahir" id="panjang_lahir" class="form-control input-sm">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group bg-info" style="padding: 5px;">
                                    <label class="text-right"><strong>Pendidikan dan Pekerjaan :</strong></label>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="id_pendidikan"> Pendidikan Dalam KK </label>
                                    <select name="id_pendidikan" id="id_pendidikan" class="form-control input-sm select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_pendidikan_kk as $pendidikan_kk)
                                        <option value="{{ $pendidikan_kk->id }}">
                                            {{ $pendidikan_kk->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="id_pendidikan_sedang"> Pendidikan Sedang Ditempuh </label>
                                    <select name="id_pendidikan_sedang" id="id_pendidikan_sedang" class="form-control input-sm select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_pendidikan as $pendidikan)
                                        <option value="{{ $pendidikan->id }}">
                                            {{ $pendidikan->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="id_pekerjaan"> Pekerjaan </label>
                                    <select name="id_pekerjaan" id="id_pekerjaan" class="form-control input-sm select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_pekerjaan as $pekerjaan)
                                        <option value="{{ $pekerjaan->id }}">
                                            {{ $pekerjaan->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group bg-info" style="padding: 5px;">
                                    <label class="text-right"><strong>DATA KEWARGANEGARAAN</strong></label>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="id_warga_negara"> Status Warga Negara </label>
                                    <select name="id_warga_negara" id="id_warga_negara" class="form-control input-sm select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_warganegara as $warganegara)
                                        <option value="{{ $warganegara->id }}">
                                            {{ $warganegara->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group bg-info" style="padding: 5px;">
                                    <label class="text-right"><strong>DATA ORANG TUA</strong></label>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nik_ayah"> NIK Ayah </label>
                                    <input type="text" name="nik_ayah" id="nik_ayah" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nama_ayah"> Nama Ayah </label>
                                    <input type="text" name="nama_ayah" id="nama_ayah" class="form-control input-sm">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nik_ibu"> NIK Ibu </label>
                                    <input type="text" name="nik_ibu" id="nik_ibu" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nama_ibu"> Nama Ibu </label>
                                    <input type="text" name="nama_ibu" id="nama_ibu" class="form-control input-sm">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group bg-info" style="padding: 5px;">
                                    <label class="text-right"><strong>Alamat</strong></label>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="alamat_sekarang"> Alamat KK </label>
                                    <input type="text" name="alamat_sekarang" id="alamat_sekarang" class="form-control input-sm">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="id_dusun"> Dusun KK </label>
                                    <select name="id_dusun" id="id_dusun" class="form-control input-sm select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_dusun as $dusun)
                                        <option value="{{ $dusun->id }}">
                                            {{ $dusun->dusun }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="id_rw"> RW KK </label>
                                    <select name="id_rw" id="id_rw" class="form-control input-sm select2">

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="id_rt"> RT KK </label>
                                    <select name="id_rt" id="id_rt" class="form-control input-sm select2">

                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="telepon"> Nomor Telepon </label>
                                    <input type="text" name="telepon" id="telepon" class="form-control input-sm">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email"> Alamat Email </label>
                                    <input type="email" name="email" id="email" class="form-control input-sm">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="alamat_sebelumnya"> Alamat Sebelumnya </label>
                                    <input type="text" name="alamat_sebelumnya" id="alamat_sebelumnya" class="form-control input-sm">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group bg-info" style="padding: 5px;">
                                    <label class="text-right"><strong>STATUS PERKAWINAN</strong></label>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for=""> Status Perkawinan </label>
                                    <select name="" id="" class="form-control input-sm">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_kawin as $kawin)
                                        <option value="{{ $kawin->id }}">
                                            {{ $kawin->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="akta_perkawinan"> No. Akta Nikah </label>
                                    <input type="text" name="akta_perkawinan" id="akta_perkawinan" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="tanggal_perkawinan"> Tanggal Perkawinan </label>
                                    <div class="input-group input-group-sm date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input class="form-control input-sm pull-right datepicker" name="tanggal_perkawinan" id="tanggal_perkawinan" type="text" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="akta_perceraian"> Akta Perceraian </label>
                                    <input type="text" name="akta_perceraian" id="akta_perceraian" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="tanggal_perceraian"> Tanggal Perceraian </label>
                                    <div class="input-group input-group-sm date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input class="form-control input-sm pull-right datepicker" name="tanggal_perceraian" id="tanggal_perceraian" type="text" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group bg-info" style="padding: 5px;">
                                    <label class="text-right"><strong>DATA KESEHATAN</strong></label>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="id_golongan_darah"> Golongan Darah </label>
                                    <select name="id_golongan_darah" id="id_golongan_darah" class="form-control input-sm select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_darah as $darah)
                                        <option value="{{ $darah->id }}">
                                            {{ $darah->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="id_cacat"> Cacat </label>
                                    <select name="id_cacat" id="id_cacat" class="form-control input-sm select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_cacat as $cacat)
                                        <option value="{{ $cacat->id }}">
                                            {{ $cacat->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="id_sakit_menahun"> Sakit Menahun </label>
                                    <select name="id_sakit_menahun" id="id_sakit_menahun" class="form-control input-sm select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_sakit_menahun as $sakit_menahun)
                                        <option value="{{ $sakit_menahun->id }}">
                                            {{ $sakit_menahun->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-right">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

@endsection

@section('page_scripts')

<script src="{{ url('backend/template/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ url('backend/template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('backend/template/plugins/timepicker/bootstrap-datetimepicker.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#id_rw').hide();
        $('#id_rt').hide();
    });

    function loadRw()
    {
        $("#id_dusun").change(function() {
            let getDusun = $("#id_rw").val();

        });
    }

</script>

<script>
    $(function() {
        $('.datepicker').datetimepicker({
            locale:'id',
            format: 'YYYY-MM-DD'
        });

        $('.timepicker').datetimepicker({
            format: 'HH:mm',
            locale:'id'
        });
    })

    !function(a,i,r){var e={};e.UTIL={setupFormValidation:function(){a("#formTambahPendudukMasuk").validate({ignore:"",rules:{foto:{accept:!0},tgl_lapor:{required:!0},nik:{required:!0},nama:{required:!0},kk_level:{required:!0},id_sex:{required:!0},id_agama:{required:!0},tempat_lahir:{required:!0},tgl_lahir:{required:!0},waktu_lahir:{required:!0},kelahiran_ke:{required:!0},berat_lahir:{required:!0},panjang_lahir:{required:!0},id_pendidikan:{required:!0},id_pendidikan_sedang:{required:!0},id_pekerjaan:{required:!0},id_warga_negara:{required:!0},nik_ayah:{required:!0},nama_ayah:{required:!0},nik_ibu:{required:!0},nama_ibu:{required:!0},alamat_sekarang:{required:!0},id_dusun:{required:!0},id_rw:{required:!0},id_rt:{required:!0},alamat_sebelumnya:{required:!0}},messages:{foto:{accept:"Upload format gambar!"},tgl_lapor:{required:"Tanggal lapor harap di isi!"},nik:{required:"NIK harap di isi!"},nama:{required:"Nama harap di isi!"},kk_level:{required:"Hubungan keluarga harap di isi!"},id_sex:{required:"Jenis kelamin harap di isi!"},id_agama:{required:"Agama harap di isi!"},tempat_lahir:{required:"Tempat lahir harap di isi!"},tgl_lahir:{required:"Tanggal lahir harap di isi!"},waktu_lahir:{required:"Waktu lahir harap di isi!"},kelahiran_ke:{required:"Anak ke harap di isi!"},berat_lahir:{required:"Berat lahir harap di isi!"},panjang_lahir:{required:"Panjang lahir harap di isi!"},id_pendidikan:{required:"Pendidikan harap di isi!"},id_pendidikan_sedang:{required:"Pendidikan harap di isi!"},id_pekerjaan:{required:"Pekerjaan harap di isi!"},id_warga_negara:{required:"Warga negara harap di isi!"},nik_ayah:{required:"NIK ayah harap di isi!"},nama_ayah:{required:"Nama ayah harap di isi!"},nik_ibu:{required:"NIK ibu harap di isi!"},nama_ibu:{required:"Nama ibu harap di isi!"},alamat_sekarang:{required:"Alamat kk harap di isi!"},id_dusun:{required:"Dusun harap di isi!"},id_rw:{required:"RW harap di isi!"},id_rt:{required:"RT harap di isi!"},alamat_sebelumnya:{required:"Alamat sebelumnya harap di isi!"}},submitHandler:function(a){a.submit()}})}},a(r).ready(function(a){e.UTIL.setupFormValidation()})}(jQuery,window,document);
</script>

@endsection
