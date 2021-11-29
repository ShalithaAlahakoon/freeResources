<h1>This is sign  up page</h1>

<form action="signup" method="POST">
    @csrf
    <input type="text" name="firstName" placeholder="First Name"><br>
    <span style="color:red;"> @error('firstName'){{$message}} @enderror</span><br><br>

    <input type="text" name="lastName" placeholder="Last Name"><br>
    <span style="color:red;"> @error('lastName'){{$message}} @enderror</span><br><br>

    <input type="text" name="email" placeholder="Email"><br>
    <span style="color:red;"> @error('email'){{$message}} @enderror</span><br><br>

    <input type="password" name="password" placeholder="Password"><br>
    <span style="color:red;"> @error('password'){{$message}} @enderror</span><br><br>

    <button type="submit"> Sign Up</button>
</form>