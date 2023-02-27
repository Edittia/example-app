@extends('home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Group {{ $group->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/group') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $group->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Dosen Id </th>
                                        <td> {{ $group->user->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $group->name }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>


    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Absensi</div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student</th>
                                        <th>Absensi</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form method="POST" action="{{ route('presence.store') }}" accept-charset="UTF-8"
                                        class="form-horizontal" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        @foreach ($group->member as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $item->student->name }}
                                                    <input type="hidden" name="item[{{ $loop->iteration }}][student_id]"
                                                        value="{{ $item->student_id }}">
                                                </td>
                                                <td>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="item[{{ $loop->iteration }}][absensi]"
                                                            value="Hadir" checked> Hadir
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="item[{{ $loop->iteration }}][absensi]"
                                                            value="Sakit"> Sakit
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="item[{{ $loop->iteration }}][absensi]"
                                                            value="Izin"> Izin
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="item[{{ $loop->iteration }}][absensi]"
                                                            value="Alpha"> Alpha
                                                    </label>
                                                </td>

                                                <td>
                                                    <input type="text" class="form-control"
                                                        name="item[{{ $loop->iteration }}][note]">
                                                </td>
                                            </tr>
                                        @endforeach

                                </tbody>
                            </table>

                            <div class="form-group">
                                <input type="hidden" name="group_id" value="{{ $group->id }}">
                                <label for="name" class="control-label">{{ 'Note' }}</label>
                                <input type="text" class="form-control" name="note">
                                <input type="hidden" name="user_id" value="{{ $group->user->id }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Save">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
