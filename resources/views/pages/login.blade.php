@extends('layouts.app')

@section('title')
        {{$title}}
@endsection

@section('content')
 <div class="container">
                <div class="row">
                        <div class="col-md-12 col-md-offset-10">
                                <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Login page</strong></div>

                                        <div class="panel-body" align="center">
                                                <p> Founded in 2019 by a group of 4 to help people looking for the right job suited best suited for you!</p><br>
<table>
    <tr><td>Username</td>
    <td><input type="text" name="username" /></td></tr>
    <tr><td>Password</td>
    <td><input type="password" name="password" /></td></tr>
    <tr><td>&nbsp;</td>
    <td><input type="submit" value = "Login" />
    <input type ="button" value = "Logout" onclick = "location = 'logout.php'"/></td></tr> 
    
    
</table>
                                        
										
										</div>
                                </div>
						</div>
				</div>
	  </div>


@endsection



