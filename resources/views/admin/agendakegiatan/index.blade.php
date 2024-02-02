@extends('layouts.app')

@section('content')
    <h3 class="mt-4 text-center">Agenda Kegiatan Desa Sindangmekar</h3>
    <ol class="breadcrumb mb-4"></ol>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div id='calendar'></div>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white" style="max-height: 40px">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Agenda Kegiatan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('agendakegiatan.store') }}">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_agenda" class="form-label">Nama Agenda Kegiatan</label>
                            <input type="text" class="form-control" id="nama_agenda" name="nama_agenda"
                                placeholder="Masukkan Nama Agenda Kegiatan" autofocus required autocomplete="">
                        </div>
                        <div class="form-group">
                            <label for="tempat" class="form-label">Tempat</label>
                            <input type="text" class="form-control" id="tempat" name="tempat"
                                placeholder="Masukkan Tempat" autofocus required autocomplete="">
                        </div>
                        <div class="form-group">
                            <label for="_mulai" class="form-label">Tanggal Kegiatan Mulai</label>
                            <input type="date" class="form-control" id="tgl_kegiatan_mulai" name="tgl_kegiatan_mulai"
                                placeholder="Masukkan Tanggal Kegiatan Mulai" autofocus required autocomplete="">
                        </div>
                        <div class="form-group">
                            <label for="_mulai" class="form-label">Tanggal Kegiatan selesai</label>
                            <input type="date" class="form-control" id="_mulai_selesai" name="tgl_kegiatan_selesai"
                                placeholder="Masukkan Tanggal Kegiatan Mulai" autofocus required autocomplete="">
                        </div>
                        <div class="form-group">
                            <label for="jam_mulai" class="form-label">Jam Mulai</label>
                            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai"
                                placeholder="Masukkan Jam Mulai" autofocus required autocomplete="">
                        </div>
                        <div class="form-group">
                            <label for="jam_selesai" class="form-label">Jam Selesai</label>
                            <input type="time" class="form-control" id="jam_selesai" name="jam_selesai"
                                placeholder="Masukkan Jam Selesai">
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success w-100">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @foreach ($agenda as $item)
        <div class="modal fade" id="modalAgenda{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail {{ $item->nama_agenda }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-borderless">
                            <tr>
                                <td>Nama Agenda</td>
                                <td>:</td>
                                <td>{{ $item->nama_agenda }}</td>
                            </tr>
                            <tr>
                                <td>Tempat</td>
                                <td>:</td>
                                <td>{{ $item->tempat }}</td>
                            </tr>
                            <tr>
                                <td>Tgl Kegiatan Mulai</td>
                                <td>:</td>
                                <td>{{ $item->tgl_kegiatan_mulai }}</td>
                            </tr>
                            <tr>
                                <td>Tgl Kegiatan Selesai</td>
                                <td>:</td>
                                <td>{{ $item->tgl_kegiatan_selesai }}</td>
                            </tr>
                            <tr>
                                <td>Jam Mulai</td>
                                <td>:</td>
                                <td>{{ $item->jam_mulai }}</td>
                            </tr>
                            <tr>
                                <td>Jam Selesai</td>
                                <td>:</td>
                                <td>
                                    @if ($item->jam_selesai == '23:59:59')
                                        selesai
                                    @else
                                        {{ $item->jam_selesai }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td>
                                    @if ($item->keterangan == null)
                                        -
                                    @else
                                        {{ $item->keterangan }}
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="{{ route('agendakegiatan.destroy', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                handleWindowResize: true,
                windowResizeDelay: 200,
                height: 700,
                selectable: true,
                themeSystem: 'bootstrap',
                locale: 'id',
                customButtons: {
                    myCustomButton: {
                        text: 'Tambah Agenda',
                        click: function() {
                            $('#myModal').modal('show');
                        }
                    }
                },
                headerToolbar: {
                    left: 'prev,next today myCustomButton',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    @foreach ($agenda as $item)
                        {
                            title: '{{ $item->nama_agenda }}',
                            start: '{{ $item->tgl_kegiatan_mulai }}T{{ $item->jam_mulai }}',
                            end: '{{ $item->tgl_kegiatan_selesai }}T{{ $item->jam_selesai }}',
                            extendedProps: {
                                id: '{{ $item->id }}',
                                tempat: '{{ $item->tempat }}',
                                description: '{{ $item->keterangan }}',
                            }
                        },
                    @endforeach
                ],
                eventClick: function(info) {
                    // get event id
                    eventObj = info.event.extendedProps;
                    eventId = eventObj.id
                    $('#modalAgenda' + eventId).modal('show');
                },
            });
            calendar.render();
        });
    </script>
@endsection
