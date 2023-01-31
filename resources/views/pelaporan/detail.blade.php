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
                <div class="card-header"><b>Detail Laporan</b></div>

                <div class="card-body">
                    <div class="form-group">
                        Nama Siswa :
                        <b>{{$pelaporan->siswa->nama}}</b><br>
                        Nisn : 
                        <b>{{$pelaporan->siswa->nisn}}</b><br>
                        Lokasi : 
                        <b>{{$pelaporan->lokasi}}</b><br>
                        Keterangan : 
                        <b>{{$pelaporan->keterangan}}</b><br>
                        Foto : <br><img src="{{asset('image')}}/{{$pelaporan->foto}}" width="50%">
                        <br>
                        Status : 
                        @if(empty(App\Models\Aspirasi::where('pelaporan_id', $pelaporan->id)->latest()->first()->status))
                        <b></b>
                        @else

                        <b>{{App\Models\Aspirasi::where('pelaporan_id', $pelaporan->id)->latest()->first()->status }}</b>
                        @endif
                    </div>

                    <div class="form-group">
                        Aspirasi :
                            @foreach(App\Models\Aspirasi::where('pelaporan_id', $pelaporan->id)->get() as $aspirasi)

                            <b>{{$aspirasi->created_at}} - {{$aspirasi->feedback}}</b>
                            <br>
                            @endforeach

                        
                        <div class="form-group">
                            <a href="{{route('aspirasi.show',[$pelaporan->id])}}">
                                <button class="btn btn-primary">Beri aspirasi</button>
                            </a>
                    </div>

              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection