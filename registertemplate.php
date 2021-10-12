<h2 style="text-align:center;">Register</h2>
<p></p>
<form action='register.php' method='POST'>
<div style="text-align:center;">
<br>
<input type='text' minlength="1" required placeholder="Username" id="textboxes"name='username'>
<br>

<br> 
<input type='password'placeholder="Password"  required minlength="7"id="textboxes"name='userpassword' >
<br>
<br>
<select placeholder=" Type" required name="type"id="textboxes" id="type">
  <option value="User">User</option>
  <option value="Reviewer">Reviewer</option>
</select>

<br>
<div style="text-align:center; padding:10px;">
<input type='submit' id="loginbutton" value='Register'>
</div>
</div>
</form>