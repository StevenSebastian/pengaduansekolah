@extends ('admin.layouts.master')

@section ('content')
<div class="container">
    @if(Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message')}}</div>
    @endif
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">

            <div class="card">
                <div class="card-header"><b>Detail Pelaporan</b></div>

                <div class="card-body">
                    <div class="form-group">
                        Nama Siswa :
                        @foreach(App\Models\Siswa::all() as $siswa)
                        <b>{{$siswa->nama}}</b><br>
                        @endforeach 

                        
                        Kategori : 
                        @foreach(App\Models\Kategori::all() as $kategori)
                        <b>{{$kategori->keterangan}}</b><br>
                        @endforeach 

                        Tanggal Pengaduan : <b>{{$pelaporan->created_at}}</b><br>
                        
                        @foreach(App\Models\Aspirasi::where('pelaporan_id', $pelaporan->id)->get() as $aspirasi)
                        <b>{{$aspirasi->created_at}} - {{$aspirasi->feedback}}</b>
                        @endforeach

                        Foto : <br><img src="{{asset('image')}}/{{$pelaporan->foto}}" width="50%">
                        <a href="{{route('pelaporan.show', [$pelaporan->id])}}"><button class="btn btn-outline-success"><i class="fas fa-fw fa-eye"></i>
                        </button></a>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
