@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Applicants</h1>
    <div class="row">
        <div class="col-ml-12">
            @foreach($applicants as $applicant)
            <div class="card">
                <div class="card-header"><a href="{{route('jobs.show',[$applicant->id,$applicant->slug])}}"> {{$applicant->title}}</a></div>
                <div class="card-body">
                    @foreach($applicant->users as $user)
                    <table class="table" style="width: 100%;">
                        <thead class="thead-dark">
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    @if($user->profile->avatar)
                                    <img src="{{asset('upload/avatar/'.$user->profile->avatar)}}" width="80">
                                    @else
                                    <img src="{{asset('avatar/man.jpg')}}" width="80">
                                    @endif
                                    <br>Applied on:{{ date('F d, Y', strtotime($applicant->created_at)) }}
                                </td>
                                <td>Name:{{$user->name}}</td>
                                <td>Email{{$user->email}}</td>
                                <td>Address:{{$user->profile->address}}</td>
                                <td>Gender{{$user->profile->gender}}</td>
                                <td>Experience:{{$user->profile->experience}}</td>
                                <td>Bio:{{$user->profile->bio}}</td>
                                <td>Phone:{{$user->profile->phone_number}}</td>
                                <td><a href="{{Storage::url($user->profile->resume)}}">Resume</a></td>
                                <td><a href="{{Storage::url($user->profile->cover_letter)}}">Cover letter</a></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div><br><br>
                @endforeach
            </div>
            <br>
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection
