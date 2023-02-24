@extends('layouts.app')

@section('title', "Admin")

@section('content')
<div>
    <h3 class="text-center">Admin Panel</h3>
</div>

<div id="successMes" class="container-fluid">
    <div class="px-5">
        @include('components.alert-icon')
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
    Add Game
</button>
@include('components.create-modal')
@include('components.edit-modal')

<div class="px-5 py-5">
    <div class="px-5">
        <table class="table table-info table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Modify</th>
                </tr>
            </thead>
            <tbody id="game_content">
                @foreach ($games as $game)
                    <tr id="row_{{$game->id}}">
                        <td id="name_{{$game->id}}">{{$game->game_name}}</td>
                        <td id="des_{{$game->id}}">{{$game->description}}</td>
                        <td>
                            <button id="editBtn" value="{{$game->id}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                            <button id="deleteBtn" value="{{$game->id}}" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="px-5">
    <div class="px-5">
        {{$games->links()}}
    </div>  
</div>
@endsection

@push('script')
<script src="{{asset('js/ajax.js')}}"></script>
@endpush