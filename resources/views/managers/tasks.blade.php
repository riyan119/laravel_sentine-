<form action="/posts" method="post" >
    {{csrf_field()}}
    <input type="text" name="title" placeholder="Title" >

    <input type="submit" value="Create Post">
</form>

<form action="/logout" method="post" id="logout-form">
    {{csrf_field()}}
    <a href="#" onclick="document.getElementById('logout-form').submit()" >Logout</a>
</form>