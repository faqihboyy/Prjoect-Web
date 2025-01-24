@extends('layouts/app')
@section('content')
    {{-- Menampilkan error jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form edit Anggota --}}
    <form action="{{ url('anggota/' . $data->nia) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6>Formulir Edit Anggota</h6>
                    </div>
                    <div class="card-body">
                        {{-- Field NIA (readonly jika tidak boleh diubah) --}}
                        <div class="form-group">
                            <label for="nia">NIA</label>
                            <input type="text" class="form-control" name="nia" value="{{ old('nia', $data->nia) }}" readonly>
                        </div>

                        {{-- Nama Anggota --}}
                        <div class="form-group">
                            <label for="nama_anggota">Nama Anggota</label>
                            <input type="text" class="form-control" name="nama_anggota" value="{{ old('nama_anggota', $data->nama_anggota) }}">
                        </div>

                        {{-- Buku Yang Dibaca --}}
                        <div class="form-group">
                            <label for="buku_yang_dibaca"> Buku Yang Dibaca</label>
                            <input type="number" class="form-control" name="buku_yang_dibaca" value="{{ old('buku_yang_dibaca', $data->buku_yang_dibaca) }}">
                        </div>

                        {{-- Alamat --}}
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat">{{ old('alamat', $data->alamat) }}</textarea>
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin">
                                <option value="" disabled hidden>--Pilih Jenis Kelamin--</option>
                                <option value="Pria" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Pria' ? 'selected' : '' }}>Pria</option>
                                <option value="Wanita" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                            </select>
                        </div>

                      @if($data->foto)
                      <div class="form-group">
                      <img style="max: width 100px; max-height:100px"  src="{{url('foto').'/'.$data->foto}}">
                      </div>
                    @endif
                    <div class="form-group">
                            <label for="foto" >Upload Foto Anggota</label>
                            <input type="file" id="foto" class="form-control-file" name="foto">
                        </div>

                        <div class="form-group">
                            <label for="buku_id">Buku Yang Dipinjam</label>
                            <select name="buku_id" class="form-control" required>
                                <option value="" disabled selected>-- Pilih Buku --</option>

                                @foreach ($buku as $item)

                                <option value="{{$item->id}}" {{ $data->buku_id == $item->id ? 'selected' : ''}}>{{$item->nama_buku}}</option>
                                @endforeach
                            </select>
                        </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
