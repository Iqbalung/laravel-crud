@extends('layouts.app')
@section('content')
 

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Sumber</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-success" href="{{ route('source.create')}}"> Tambah Sumber </a>
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
            <th width="400px"><b>Sumber</b></th>
        </tr>
      </thead>
        @foreach ($mahasiswas as $mahasiswa) 
            <tr>
                <td>{{$mahasiswa->sumber}}</td>
            </tr>
        @endforeach
    </table>

    {!! $mahasiswas->links() !!}
    </div>
   

@endsection