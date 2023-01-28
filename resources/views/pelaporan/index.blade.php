@extends('admin.layouts.master')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}</div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">List Pelaporan</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Foto</th>
                                    <th colspan=3 scope="col">Aksi</th>

                                </tr>
                            </thead>

                            <tbody>
                                @if(count($pelaporans)>0)
                                @foreach($pelaporans as $key=>$pelaporan)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$pelaporan->siswa_id}}</td>
                                    <td>{{$pelaporan->kategori_id}}</td>
                                    <td>{{$pelaporan->lokasi}}</td>
                                    <td>{{$pelaporan->keterangan}}</td>
                                    <td>{{$pelaporan->foto}}</td>

                                    <td>

                                    <a href="{{route('pelaporan.edit',[$pelaporan->id])}}"><button
                                                class="btn btn-outline-success" aria-hidden="true"
                                                style="font-size:25px"><i class="fa fa-edit"></i></button></a>
                                    </td>

                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" aria-hidden="true"
                                            style="font-size:25px" data-toggle="modal"
                                            data-target="#exampleModal{{$pelaporan->id}}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$pelaporan->id}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{route('pelaporan.destroy',[$pelaporan->id])}}"
                                                    method="post">
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">

                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda Yakin ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>

                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Delete</button>
                                                        </div>
                                                    </div>
                            
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{route('pelaporan.show',[$pelaporan->id])}}"><button
                                                class="btn btn-outline-danger" aria-hidden="true"
                                                style="font-size:25px"><i class="fa fa-street-view"></i></button></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <td colspan=6 >Tidak Ada Keterangan Yang Dapat Ditampilkan</td>

                                <!-- <td>Tidak ada pengaduan yang dapat ditampilkan.</td> -->
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
