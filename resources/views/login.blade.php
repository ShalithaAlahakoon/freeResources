<h1>User Login</h1>

<form action="user" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Insert Email"><br>
    <span style="color:red;"> @error('user'){{$message}} @enderror</span><br>
    <input type="password" name="password" placeholder="Insert Password"><br>
    <span style="color:red;"> @error('password'){{$message}} @enderror</span><br>
    <button type="submit"> Login</button>
</form>

<a href="signUp">Sign Up</a>