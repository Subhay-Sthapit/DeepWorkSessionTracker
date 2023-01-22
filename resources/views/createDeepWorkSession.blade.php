@extends('layouts.app')

@section('content')
    <div>
        <h1 style="text-align: center">Create a Deep work Session</h1>
        <form class="form-control" style="border-style: none; padding-left: 50px;padding-right: 50px;" action="{{route('create.DeepWorkSession')}}" method="post">
            @csrf
            @method('post')
            <div class="row">
                <div class="col-6" style="padding: 5px;">
                    <label for="planned_start_time">Select Start Time:</label>
                    <input type="datetime-local" name="planned_start_time" class="form-control" required>
                </div>
                <div class="col-6" style="padding: 5px">
                    <label for="planned_end_time">Select End Time:</label>
                    <input type="datetime-local" name="planned_end_time" class="form-control" required>
                </div>
                <div class="col-6" style="padding: 5px">
                    <label for="session_name">Enter Session Name:</label>
                    <input type="text" name="session_name" class="form-control" required>
                </div>
                <div class="col-12" style="padding: 5px">
                    <label for="notes">Notes for the session (optional):</label>
                    <textarea name="notes" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="col-12" style="padding: 5px; text-align: center">
                    <button type="submit" class="btn-success" style="border-radius: 10px; width: 200px">CREATE</button>
                </div>
            </div>
        </form>
    </div>
@endsection

