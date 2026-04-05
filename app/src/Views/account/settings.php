<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h1 class="h3 mb-4">Account settings</h1>
                <form method="post" action="/account/settings" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="training_level">Training level</label>
                        <select id="training_level" name="training_level" class="form-select">
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="preferred_training_type">Preferred training type</label>
                        <select id="preferred_training_type" name="preferred_training_type" class="form-select">
                            <option value="Strength">Strength</option>
                            <option value="HIIT">HIIT</option>
                            <option value="Mobility">Mobility</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="theme_preference">Theme preference</label>
                        <select id="theme_preference" name="theme_preference" class="form-select">
                            <option value="light">Light</option>
                            <option value="dark">Dark</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-dark">Save preferences</button>
                    </div>
                </form>
                <hr class="my-4">
                <form method="post" action="/account/delete">
                    <button type="submit" class="btn btn-outline-danger">Soft delete account</button>
                </form>
            </div>
        </div>
    </div>
</div>
