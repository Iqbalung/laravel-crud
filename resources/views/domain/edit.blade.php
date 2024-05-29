@extends('layouts.app')
@section('content')

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Alumni</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class=" form-row">
            <div class="col-lg-12">
                <h3>Edit Data Biding</h3>
            </div>
        </div>
        <br>

        @if ($errors->all())
        <?php print_r($errors->all()) ?>;
            <div class="alert alert-danger">
                <strong>Whoops! </strong> Ada permasalahan inputanmu.<br>
                <ul>
                    @foreach ($errors as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{route('domain.update',$mahasiswa->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="namaMahasiswa" class="col-sm-2 col-form-label">Domain</label>
                <div class="col-sm-10">
                    <input type="text" name="namadomain" class="form-control" id="namadomain" value="{{$mahasiswa->namadomain}}" placeholder="Domain">
                </div>
            </div>
            <div class="form-group row">
                <label for="nimMahasiswa" class="col-sm-2 col-form-label">DA</label>
                <div class="col-sm-10">
                    <input type="text" name="da"  class="form-control" id="nimMahasiswa" value="{{$mahasiswa->da}}" >
                </div>
            </div>
            <div class="form-group row">
                <label for="nimMahasiswa" class="col-sm-2 col-form-label">PA</label>
                <div class="col-sm-10">
                    <input type="text" name="pa"  class="form-control" id="nimMahasiswa" value="{{$mahasiswa->pa}}" >
                </div>
            </div>
            <div class="form-group row">
                <label for="nimMahasiswa" class="col-sm-2 col-form-label">QT</label>
                <div class="col-sm-10">
                    <input type="text" name="qt"  class="form-control" id="nimMahasiswa" value="{{$mahasiswa->qt}}" >
                </div>
            </div>
            <div class="form-group row">
                <label for="nimMahasiswa" class="col-sm-2 col-form-label">OS</label>
                <div class="col-sm-10">
                    <input type="text" name="os"  class="form-control" id="nimMahasiswa" value="{{$mahasiswa->os}}" >
                </div>
            </div>
            <div class="form-group row">
                <label for="nimMahasiswa" class="col-sm-2 col-form-label">SS</label>
                <div class="col-sm-10">
                    <input type="text" name="ss"  class="form-control" id="nimMahasiswa" value="{{$mahasiswa->os}}" >
                </div>
            </div>
            <div class="form-group row">
                <label for="pembimbing2" class="col-sm-2 col-form-label">Tanggal Bidding</label>
                <div class="col-sm-10">
                    <input data-date-format="yyyy-mm-dd" id="datepicker" name="biddate" value="{{$mahasiswa->biddate}}">

                </div>
            </div>
            
            <!--<div class="form-group row">
                <label for="gambarMahasiswa" class="col-sm-2 col-form-label">Pilih gambar</label>
                <div class="col-sm-10">
                    <input type="file" name="gambarMahasiswa">
                <p class="text-danger">{{ $errors->first('gambarMahasiswa') }}</p>
                </div>
            </div>-->

             <hr>
                <div class="form-group">
                    <a href="{{route('domain.index')}}" class="btn btn-success">Kembali</a>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
        </form>

    </div>
    </body>
</html>
    
@endsection