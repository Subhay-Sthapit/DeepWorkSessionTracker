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
                        <button class="btn btn-success btn-submit" style="background-color: #4db61b; border-radius: 25%; width: 70px;" type="button" onclick="startSession({{$deepSession->id}});">
                            Start</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function startSession(id){

            e.preventDefault();

            var name = $("input[name=name]").val();
            var password = $("input[name=password]").val();
            var email = $("input[name=email]").val();

            $.ajax({
                type:'POST',
                url:"{{ route('start.DeepWorkSession') }}",
                data:{name:name, password:password, email:email},
                success:function(data){
                    alert(data.success);
                }
            });
        }
    </script>
@endsection
