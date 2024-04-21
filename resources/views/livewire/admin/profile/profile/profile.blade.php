<div>
<!-- murag wtf -->
    <div class="page-content">     
        <div class="container">
            <div class="row justify-content-between">
                <!-- Profile Card -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Profile</h2>
                            <div class="profile-info text-center">
                                <div class="mb-3">
                                    <img src="{{url('assets')}}/logo/wmsu-logo.png" alt="Profile Image" style="border-radius: 50%;" class="img-fluid">
                                </div>
                                <div class="mb-3">
                                    <button id="modifyButtonProfile" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modifyModal">Edit Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Profile Details Card -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Profile Details</h2>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-white text-black border"><strong>First Name:</strong> John</li>
                                <li class="list-group-item bg-white text-black border"><strong>Middle Name:</strong> Doe</li>
                                <li class="list-group-item bg-white text-black border"><strong>Last Name:</strong> Smith</li>
                                <li class="list-group-item bg-white text-black border"><strong>Suffix:</strong> Jr.</li>
                                <li class="list-group-item bg-white text-black border"><strong>Gender:</strong> Male</li>
                                <li class="list-group-item bg-white text-black border"><strong>Age:</strong> 30</li>
                                <li class="list-group-item bg-white text-black border"><strong>Home Address:</strong> 123 Main St, City</li>
                                <li class="list-group-item bg-white text-black border"><strong>Phone Number:</strong> +1234567890</li>
                                <li class="list-group-item bg-white text-black border"><strong>Email:</strong> john@example.com <a href="#">Change Email</a></li>
                                <li class="list-group-item bg-white text-black border"><strong>Birthdate:</strong> January 1, 1990</li>
                                <li class="list-group-item bg-white text-black border"><strong>Account Created:</strong> January 15, 2022</li>
                            </ul>
                            <button id="modifyButtonDetails" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#modifyModalDetails">Edit Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modify Profile Modal -->
    <div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content">
                <div class="modal-header text-white">
                    <h5 class="modal-title" id="modifyModalLabel">Modify Profile</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-white text-black">
                    <!-- Tab navigation -->
                    <ul class="nav nav-tabs" id="accountSettingsTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="modifyInfo-tab" data-bs-toggle="tab" href="#modifyInfo" role="tab" aria-controls="modifyInfo" aria-selected="true">Modify Info</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="changePassword-tab" data-bs-toggle="tab" href="#changePassword" role="tab" aria-controls="changePassword" aria-selected="false">Change Password</a>
                        </li>
                    </ul>
                    <!-- Tab content -->
                    <div class="tab-content mt-3" id="accountSettingsTabContent">
                        <!-- Modify Info Tab -->
                        <div class="tab-pane fade show active" id="modifyInfo" role="tabpanel" aria-labelledby="modifyInfo-tab">
                            <form>
                                <div class="mb-3">
                                    <label for="newProfileImage" class="form-label text-black">Change profile picture:</label>
                                    <input type="file" class="form border" id="newProfileImage" accept="image/png, image/jpeg">
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                        <!-- Change Password Tab -->
                        <div class="tab-pane fade" id="changePassword" role="tabpanel" aria-labelledby="changePassword-tab">
                            <form >
                                <div class="mb-3">
                                    <label for="currentPassword" class="form-label text-black">Current Password<span style="color:red;">*</span>:</label>
                                    <input type="password" class="form-control" id="currentPassword" placeholder="Current Password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label text-black">New Password<span style="color:red;">*</span>:</label>
                                    <input type="password" class="form-control" id="newPassword" placeholder="New Password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label text-black">Confirm Password<span style="color:red;">*</span>:</label>
                                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- profile modify details -->
    <div class="modal fade" id="modifyModalDetails" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabelDetails" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="modifyModalLabelDetails">Modify Profile Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-white">
                    <fieldset>
                        <!-- Full Name -->
                        <form>
                            <div class="form-group row mb-2">
                                <label  class="col-sm-4 col-form-label">First name<span style="color:red;">*</span> :</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Enter firstname" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-4 col-form-label">Middle name<span style="color:red;"></span> :</label>
                                <div class="col-sm-8">
                                <input type="text"  class="form-control" placeholder="Enter middlename" >
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-4 col-form-label">Last name<span style="color:red;">*</span> :</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Enter lastname" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-4 col-form-label">Suffix<span style="color:red;"></span> :</label>
                                <div class="col-sm-8">
                                    <select class="form-control">
                                        <option value="">
                                        <option value="">Select suffix</option>
                                        <option value="Jr.">Jr.</option>
                                        <option value="Sr.">Sr.</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="form-group row mb-2">
                                <label class="col-sm-4 col-form-label">Gender<span style="color:red;">*</span>:</label>
                                <div class="col-sm-8">
                                    <select class="form-control">
                                        <option value="">
                                        <option value="">Select gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="form-group row mb-2">
                                <label class="col-sm-4 col-form-label">Phone number<span style="color:red;"></span> :</label>
                                <div class="col-sm-8">
                                <input type="text"  required ="user_details.user_phone" class="form-control" placeholder="Enter phone number"  oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 11);">
                                </div>
                            </div>
    
                            <div class="form-group row mb-2">
                                <label class="col-sm-4 col-form-label">Birthdate<span style="color:red;">*</span> :</label>
                                <div class="col-sm-8">
                                <input type="date"  class="form-control" placeholder="Enter birthdate" required>
                                </div>
                            </div>
    
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>

