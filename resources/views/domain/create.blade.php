@extends('layouts.app')
@section('content')

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Alumni</title>
       
<style type="text/css">
        // solution 1:
        .datepicker {
            font-size: 0.875em;
        }
        /* solution 2: the original datepicker use 20px so replace with the following:*/
        
        .datepicker td, .datepicker th {
            width: 1.5em;
            height: 1.5em;
        }
        
    </style>

    </head>
    <body>
    <div class="container">
        <div class=" form-row">
            <div class="col-lg-12">
                <h3>Tambah Domain</h3>
            </div>
        </div>
        <br>

        @if ($errors->all())
            <?php dd($errors->all());?>
            <div class="alert alert-danger">
                <strong>Whoops! </strong> Ada permasalahan inputanmu.<br>
                <ul>
                    @foreach ($errors as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{route('domain.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="namaMahasiswa" class="col-sm-2 col-form-label">Nama Domain</label>
                <div class="col-sm-10">
                    <input type="text" name="namadomain" class="form-control" id="namaMahasiswa" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="nimMahasiswa" class="col-sm-2 col-form-label">DA</label>
                <div class="col-sm-10">
                    <input type="text" name="da" class="form-control" id="nimMahasiswa" placeholder="NIM Mahasiswa">
                </div>
            </div>
           
            <div class="form-group row">
                <label for="judulskripsiMahasiswa" class="col-sm-2 col-form-label">PA</label>
                    <div class="col-sm-10">
                    <input type="text" name="pa" class="form-control" id="nimMahasiswa" placeholder="">
                    </div>
            </div>
            <div class="form-group row">
                <label for="pembimbing1" class="col-sm-2 col-form-label">QA</label>
                <div class="col-sm-10">
                    <input type="text" name="qt" class="form-control" id="pembimbing1" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="pembimbing2" class="col-sm-2 col-form-label">OS</label>
                <div class="col-sm-10">
                    <input type="text" name="os" class="form-control" id="pembimbing2" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="pembimbing2" class="col-sm-2 col-form-label">SS</label>
                <div class="col-sm-10">
                    <input type="text" name="ss" class="form-control" id="pembimbing2" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="pembimbing2" class="col-sm-2 col-form-label">Tanggal Bidding</label>
                <div class="col-sm-10">
                    <input data-date-format="dd/mm/yyyy" id="datepicker" name="biddate">

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
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
        </form>

    </div>
    </body>
</html>
    
@endsection