<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Products - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Voluntrack</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('event.create') }}" class="btn btn-md btn-success mb-3">ADD PRODUCT</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Gambar Kegiatan</th>
                                    <th scope="col">Host</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tags</th>
                                    <th scope="col">Tanggal Mulai</th>
                                    <th scope="col">Tanggal Selesai</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Detail Kegiatan</th>
                                    <th scope="col">Kebutuhan Kegiatan</th>
                                    <th scope="col">Target Donasi</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($events as $event)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ asset('/storage/'.$event->event_image) }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $event->user->name}}</td>
                                        <td>{{ $event->nama }}</td>
                                        <td>{{ $event->tags }}</td>
                                        <td>{{ $event->tanggal_mulai }}</td>
                                        <td>{{ $event->tanggal_selesai }}</td>
                                        <td>{{ $event->lokasi }}</td>
                                        <td>{{ strip_tags($event->event_detail) }}</td>
                                        <td>{{ strip_tags($event->requirement) }}</td>
                                        <td>{{ $event->target_donasi }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('event.destroy', $event->id_event) }}" method="POST">
                                                <a href="{{ route('event.show', ['event' => $event->id_event]) }}">Lihat Event</a>
                                                <a href="{{ route('event.edit', ['event' => $event->id_event]) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Products belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $event->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

    </script>

</body>
</html>