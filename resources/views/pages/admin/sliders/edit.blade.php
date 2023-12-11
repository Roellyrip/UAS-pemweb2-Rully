@extends('layouts.admin.app')

@section('title', 'Edit kategori')


@section('content')
    <div class="container">
        <a href="/sliders" class="btn btn-primary mb-3">Kembali</a>
       <div class="row">
        <div class="col-md-12">
            <<form action="{{ route('sliders.update', $slider->id) }}" method="post" enctype="multipart/form-data">

                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="title" placeholder="Judul">
                </div>
                @error('title')
                    <small style="color: red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="">Keterangan User</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Deskripsi"></textarea>
                </div>
                @error('description')
                    <small style="color: red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="">Foto User</label>
                    <input type="file" class="form-control" name="image">
                </div>
                @error('image')
                    <small style="color: red">{{ $message }}</small>
                @enderror
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
