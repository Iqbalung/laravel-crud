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
        <div class="row">
            <div class="col-md-10">
                <h3> Domain Bidding</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-success" href="{{ route('domain.create')}}"> Tambah Domain </a>
            </div>
        </div> 
        <br>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>        
        </div>
    @endif

    <table class="table table-striped">
      <thead>
        <tr>
            <th width="400px"><b>Namecheap.</b></th>
            <th width="100px">DA</th>
            <th width="100px">PA</th>
            <th width="100px">QT</th>
            <th width="100px">OS</th>
            <th width="100px">SS</th>
            <th width="100px">Tanggal</th>
            <th width="210px">Action</th>
        </tr>
      </thead>
        @foreach ($mahasiswas as $mahasiswa) 
            <tr>
                <td>{{$mahasiswa->namadomain}}</td>
                <td>{{$mahasiswa->da}}</td>
                <td>{{$mahasiswa->pa}}</td>
                 <td>{{$mahasiswa->qt}}</td>
                <td align="center">{{$mahasiswa->os}}</td>
                <td align="center">{{$mahasiswa->ss}}</td>
                <td>

               



<?php 
 $now = new DateTime();
 $date = new DateTime($mahasiswa->biddate);
echo $now->diff($date)->format("%m month, %d days, %h hours and %i minutes") ?>;
                </td>
                <td>
                    <form action="{{ route('domain.destroy',$mahasiswa->id) }}" method="post">
                    <a class="btn btn-sm btn-success" href="{{ route('domain.show', $mahasiswa->id)}}">Show</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('domain.edit', $mahasiswa->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>    
                </td>
            </tr>
        @endforeach
    </table>

    {!! $mahasiswas->links() !!}
    </div>
    </body>

</html>

@endsection