@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard<span style="float:right"><a href='/create_user'>Create User</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <table class="table">
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>&nbsp;</th>
                      </tr>
                    <?php
                    foreach ($users as $row) {
                        ?>
                        <tr>
                          <td><?= $row->name ?></td>
                          <td><?= $row->address ?></td>
                          @if ($row->id == $id)
                            <td><a href='edit/{{ $row->id }}'>Edit</a></td>
                          @else
                            <td><a href='edit/{{ $row->id }}'>Edit</a> | <a href='delete/{{ $row->id }}'>Delete</a></td>
                          @endif
                        </tr>
                        <?php
                    }
                    ?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
