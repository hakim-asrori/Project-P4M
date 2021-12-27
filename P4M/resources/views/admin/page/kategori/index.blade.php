@extends('admin.layouts.main')

@section('page_content')

<section class="content-header">
    <h1>
        Kategori
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li class="active">Data Kategori</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <form action="{{ url('/page/admin/kategori/') }}" method="POST">
                    @csrf
                    <div class="box-header">
                        <h3 class="box-title">
                            <i class="fa fa-plus"></i> Form Tambah Kategori
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama"> Nama Kategori </label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Kategori">
                        </div>
                        <div class="form-group">
                            <label for="slug"> Slug </label>
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="Masukkan Slug">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        Data Kategori
                    </h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Nama Kategori</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_kategori as $kategori)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $kategori->nama }}</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ url('/kategori') }}/{{ $kategori->slug }}" method="POST" style="display: inline;">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    nama.addEventListener('change', function() {
        fetch('/page/admin/kategori/checkSlug?nama=' + nama.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })

</script>

@endsection
