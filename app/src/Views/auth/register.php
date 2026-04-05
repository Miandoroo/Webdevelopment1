<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h1 class="h3 mb-4">Register</h1>
                <form method="post" action="/register" class="d-grid gap-3">
                    <div>
                        <label for="name" class="form-label">Name</label>
                        <input id="name" name="name" type="text" class="form-control" required>
                    </div>
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="email" class="form-control" required>
                    </div>
                    <div>
                        <label for="password" class="form-label">Password</label>
                        <input id="password" name="password" type="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-dark">Create account</button>
                </form>
            </div>
        </div>
    </div>
</div>
