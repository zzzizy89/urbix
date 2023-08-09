<div class="card">
<div class="card-body">
<form method="post" action="<?= base_url("login");?>">
<h1>Login Page</h1>
<div class="mb-3">
  <label for="email" class="form-label">Email address</label>
  <input name="email" type="email"class="form-control" id="email" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="password" class="form-label">Password</label>
  <input name="password" type="password" class="form-control" id="password" placeholder="password">
</div>
<div class="mb-3"><input type="submit" value="Login" class="btn btn-primary"></div>
</form>
</div>
</div>