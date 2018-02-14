@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif








                        <table id="example" class="display" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Status</th>
                                <th>CRUD</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>CRUD</th>
                            </tr>
                            </tfoot>
                            <tbody>







                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if ($user->status == 1)
                                            <i class='fa fa-check' style='color: green;'></i>

                                        @else
                                            <i class='fa fa-times' style='color: red;'></i>
                                        @endif
                                    </td>
                                    <td>
                                        <form method="delete" action="delete/$user->id">


                                            <input class="btn btn-danger" type="submit" name="delete" value="Delete" > <!-- onclick="alert('Are you sure?')" -->


                                        </form>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>











                </div>
            </div>
        </div>
    </div>
</div>

@endsection
