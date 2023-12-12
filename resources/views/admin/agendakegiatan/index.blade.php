@extends('layouts.app')

@section('content')
    <h3 class="mt-4 text-center">Agenda Kegiatan Desa Sindangmekar</h3>
    <ol class="breadcrumb mb-4"></ol>
    <div id='calendar'></div>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Agenda Kegiatan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <!-- Nama Awal Input -->
                        <div class="form-group">
                            <label for="jabatan" class="form-label">Nama Agenda Kegiatan</label>
                            <input type="text" class="form-control" id="jabatan" name="nama_agenda"
                                placeholder="Masukkan Jabatan" autofocus required autocomplete="">
                        </div>
                        <div class="form-group">
                            <label for="jabatan" class="form-label">Nama Agenda Kegiatan</label>
                            <input type="text" class="form-control" id="jabatan" name="nama_agenda"
                                placeholder="Masukkan Jabatan" autofocus required autocomplete="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                editable: true,
                selectMirror: true,
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
                events: [{
                        title: 'Event 1',
                        start: '2023-12-01',
                        end: '2023-12-02',
                    },
                    {
                        title: 'Event 2',
                        start: '2023-12-05',
                    },
                    // Add more events as needed
                ]

            });
            calendar.render();
        });
    </script>
@endsection
