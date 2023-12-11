@extends('layouts.admin.app')

@section('title', 'Kategori')


@section('content')
    <div class="container">
        <a href="/sliders/create" class="btn btn-primary mb-3">Tambah Data</a>
       @if ($message = Session::get('message'))
       <div class="alert alert-success">
            <strong>Berhasil</strong>
            <p>{{ $message }}</p>
       </div>
       @endif

       <div class="table-responsive">
        <table class="table table-bordered table-hover table-stripped">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Keterangan User</th>
                    <th>Foto User</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        <tbody>
            @foreach ($sliders as $slider)
                <tr>
                    <td> {{ $loop->iteration }}</td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->description }}</td>
                    <td>
                        <img src="/image/{{ $slider->image }}" alt="" class="img-fluid" width="50">
                    </td>
                    <td>
                        <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('sliders.destroy', $slider->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach
        </tbody>
        </table>

    </div>
    </div>

@endsection
