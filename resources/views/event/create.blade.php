<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Products - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Users</label>
                                <select class="form-select @error('host') is-invalid @enderror" name="host">
                                    @foreach ( $users as $user )
                                        <option value="{{$user->id}}">{{$user->id}}</option>
                                    @endforeach
                                  </select>
                            
                                <!-- error message untuk title -->
                                @error('host')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Gambar Event</label>
                                <input type="file" class="form-control @error('event_image') is-invalid @enderror" name="event_image">
                            
                                <!-- error message untuk image -->
                                @error('event_image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Judul Kegiatan">
                            
                                <!-- error message untuk title -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Tags</label>
                                <select class="form-select @error('tags') is-invalid @enderror" aria-label="tags field" name="tags">
                                    <option selected>Pilih tag untuk kegiatan mu!</option>
                                    <option value="kemanusiaan">Kemanusiaan</option>
                                    <option value="lingkungan">Lingkungan</option>
                                    <option value="olahraga">Olahraga</option>
                                  </select>
                            
                                <!-- error message untuk title -->
                                @error('tags')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Lokasi Kegiatan</label>
                                <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ old('lokasi') }}" placeholder="Masukkan Lokasi Kegiatan">
                            
                                <!-- error message untuk title -->
                                @error('lokasi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Tanggal Mulai</label>
                                <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai" min="@php echo date('Y-m-d'); @endphp" value="{{ old('tanggal_mulai') }}">
                            
                                <!-- error message untuk title -->
                                @error('tanggal_mulai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Tanggal Selesai</label>
                                <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" name="tanggal_selesai" min="@php $date = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")); echo date("Y-m-d",$date); @endphp" value="{{ old('tanggal_selesai') }}">
                            
                                <!-- error message untuk title -->
                                @error('tanggal_selesai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Detail Kegiatan</label>
                                <textarea class="form-control @error('event_detail') is-invalid @enderror" name="event_detail" rows="5" placeholder="Masukan detail kegiatan yang akan berlansung">{{ old('event_detail') }}</textarea>
                            
                                <!-- error message untuk description -->
                                @error('event_detail')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Kebutuhan Kegiatan</label>
                                <textarea class="form-control @error('requirement') is-invalid @enderror" name="requirement" rows="5" placeholder="Masukan detail kebutuhan kegiatan yang akan berlansung">{{ old('requirement') }}</textarea>
                            
                                <!-- error message untuk description -->
                                @error('requirement')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Target Donasi</label>
                                <input type="number" class="form-control @error('target_donasi') is-invalid @enderror" name="target_donasi" value="{{ old('target_donasi') }}" placeholder="Masukkan Target Donasi Kegiatan">
                            
                                <!-- error message untuk title -->
                                @error('target_donasi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'event_detail');
        CKEDITOR.replace( 'requirement');
    </script>
</body>
</html>