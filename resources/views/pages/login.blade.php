@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-10">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>User Login</strong></div>

                    <div class="panel-body" align="center">
                        <p> Login now and begin your search! </p><br>
                        <table>
                            <tr>
                                <td>Username:  </td>
                                <td><input type="text" name="username"/></td>
                            </tr>
                            <tr>
                                <td>Password:  </td>
                                <td><input type="password" name="password"/></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><input type="submit" value="Login"/></td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection



