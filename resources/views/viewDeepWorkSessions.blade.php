@extends('layouts.app')
@section('content')
    <h1 style="text-align: center">View DeepWork Sessions</h1>
    <div class="table-responsive" style="padding-left: 5%;padding-right: 5%; padding-top: 1%; padding-bottom: 1%">
        <table class="table table-striped table-bordered table-hover dataTables-example" title="Deep Work Sessions">
            <thead>
                <tr>
                    <th>Sn.</th>
                    <th>Session Name</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($deepSessions as $deepSession)
                <tr class="grade-X">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$deepSession->session_name}}</td>
                    <td>{{$deepSession->actual_start_time ?? $deepSession->planned_start_time}}</td>
                    <td>{{$deepSession->actual_end_time ?? $deepSession->planned_end_time}}</td>
                    <td>{{$deepSession->status}}</td>
                    <td>
                        <i class="fa-solid fa-circle-play"></i>
                        <button class="btn-success" style="background-color: #4db61b; border-radius: 25%; width: 70px"; type="button" href="#">
                            Start</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
