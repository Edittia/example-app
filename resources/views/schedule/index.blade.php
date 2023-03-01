@extends('home')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @elseif (session()->has('error'))
        toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif


    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Schedule</div>
                    <div class="card-body">
                        <a href="{{ url('/schedule/create') }}" class="btn btn-success btn-sm" title="Add New schedule">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {{-- <form method="GET" action="{{ url('/schedule') }}" accept-charset="UTF-8"
                            class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..."
                                    value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form> --}}

                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kelas</th>
                                        <th>Nama Ustadz</th>
                                        <th>Catatan</th>
                                        <th>Mulai</th>
                                        <th>Berakhir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schedule as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->group->name }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->note }}</td>
                                            <td>{{ $item->time_start_at }}</td>
                                            <td>{{ $item->time_end_at }}</td>
                                            <td>
                                                <a href="{{ url('/schedule/' . $item->id) }}" title="View schedule"><button
                                                        class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                            aria-hidden="true"></i> View</button></a>
                                                <a href="{{ url('/schedule/' . $item->id . '/edit') }}"
                                                    title="Edit schedule"><button class="btn btn-primary btn-sm"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Edit</button></a>

                                                <form method="POST" action="{{ url('/schedule' . '/' . $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete schedule"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $sch->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
