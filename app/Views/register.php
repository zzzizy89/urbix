<div class="card">
<div class="card-body">
<form method="post" action="<?= base_url("register");?>">
<h1>Register</h1>
<div class="mb-3">
  <label for="name" class="form-label">Name</label>
  <input name="name" required type="text"class="form-control" id="name" placeholder="Your name">
</div>
<div class="mb-3">
  <label for="email" class="form-label">Email address</label>
  <input name="email" required type="email"class="form-control" id="email" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="password" class="form-label">Password</label>
  <input name="password" required type="password" class="form-control" id="password" placeholder="password">
</div>
<div class="mb-3"><input type="submit" value="Register" class="btn btn-primary"></div>
</form>
</div>
</div>