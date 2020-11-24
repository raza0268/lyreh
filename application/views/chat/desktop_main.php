<?php $this->load->view('includes/chat/header'); ?>

  <!-- <script src="//code.jquery.com/mobile/1.5.0-alpha.1/jquery.mobile-1.5.0-alpha.1.min.js"></script> -->
<style type="text/css">
   .testting{
    background-color: #fff;
    padding: 1rem;
    -webkit-border-radius: .5rem;
    -moz-border-radius: .5rem;
    border-radius: .5rem;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;las
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}
</style>
<?php echo smiley_js(); ?>
<!-- Page loading -->
<style type="text/css">
    
    table{
        display: none;
        position: absolute;
    bottom: 93px;
    background-color: white;
    left: 476px;
    border-radius: 10px;
    padding: 8px;
    }
    .layout .content .chat .chat-body .messages .message-item{
        margin-bottom: 1rem !important;
    }
</style>
<!-- ./ Page loading -->

<!-- Body plate -->
<div class="body-plate" style="display: none;"></div>
<!-- ./ Body plate -->
<?php
if(empty($toId)){
    $toId = "";
}
if(empty($slugs)){
    $slugs = "";
}
if(empty($fromId)){
    $fromId = "";
}
?>
<!-- Disconnected modal -->
<div class="modal fade" id="disconnected" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row mb-5">
                    <div class="col-md-6 offset-md-3">
                        <img src="./dist/media/svg/undraw_warning_cyit.svg" class="img-fluid" alt="image">
                    </div>
                </div>
                <p class="lead text-center">Application disconnected</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-success btn-lg">Reconnect</button>
                <a href="login.html" class="btn btn-link">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- ./ Disconnected modal -->

<!-- Voice call modal -->
<!--<div class="modal call fade" id="call" tabindex="-1" role="dialog" aria-hidden="true">-->
<!--    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-body">-->
<!--                <div class="call">-->
<!--                    <div>-->
<!--                        <figure class="mb-4 avatar avatar-xl">-->
<!--                            <img src="<?php echo base_url() ?>uploads/sample_user.jpg" class="rounded-circle" alt="image">-->
<!--                        </figure>-->
<!--                        <h4>Brietta Blogg <span class="text-success">calling...</span></h4>-->
<!--                        <div class="action-button">-->
<!--                            <button type="button" class="btn btn-danger btn-floating btn-lg" data-dismiss="modal">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>-->
<!--                            </button>-->
<!--                            <button type="button" class="btn btn-success btn-pulse btn-floating btn-lg">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- ./ Voice call modal -->

<!-- voice call modal -->
<div class="modal call fade" id="videoCall" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="call">
                    <div>
                        <figure class="mb-4 avatar avatar-xl">
                            <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar4.png" class="rounded-circle" alt="image">
                        </figure>
                        <h4>Brietta Blogg <span class="text-success">video calling...</span></h4>
                        <div class="action-button">
                            <button type="button" class="btn btn-danger btn-floating btn-lg" data-dismiss="modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                            <button type="button" class="btn btn-success btn-pulse btn-floating btn-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./ voice call modal -->

<!-- Add friends modal -->
<div class="modal fade" id="addFriends" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus mr-2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg> Add Friends
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">Send invitations to friends.</div>
                <form>
                    <div class="form-group">
                        <label for="emails" class="col-form-label">Email addresses</label>
                        <input type="text" class="form-control" id="emails">
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-form-label">Invitation message</label>
                        <textarea class="form-control" id="message"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn_custom">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- ./ Add friends modal -->

<!-- New group modal -->
<div class="modal fade" id="newGroup" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users mr-2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> New Group
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="group_name" class="col-form-label">Group name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="group_name">
                            <div class="input-group-append">
                                <button class="btn btn-light" data-toggle="tooltip" title="" type="button" data-original-title="Emoji">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <p class="mb-2">The group members</p>
                    <div class="form-group">
                        <div class="avatar-group">
                            <figure class="avatar" data-toggle="tooltip" title="" data-original-title="Tobit Spraging">
                                <span class="avatar-title bg-success rounded-circle">T</span>
                            </figure>
                            <figure class="avatar" data-toggle="tooltip" title="" data-original-title="Cloe Jeayes">
                                <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar6.png" class="rounded-circle" alt="image">
                            </figure>
                            <figure class="avatar" data-toggle="tooltip" title="" data-original-title="Marlee Perazzo">
                                <span class="avatar-title bg-warning rounded-circle">M</span>
                            </figure>
                            <figure class="avatar" data-toggle="tooltip" title="" data-original-title="Stafford Pioch">
                                <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar2.png" class="rounded-circle" alt="image">
                            </figure>
                            <figure class="avatar" data-toggle="tooltip" title="" data-original-title="Bethena Langsdon">
                                <span class="avatar-title bg-info rounded-circle">B</span>
                            </figure>
                            <a href="#" title="Add friends">
                                <figure class="avatar">
                                    <span class="avatar-title bg-primary rounded-circle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                    </span>
                                </figure>
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn_custom">Create Group</button>
            </div>
        </div>
    </div>
</div>
<!-- ./ New group modal -->

<!-- Setting modal -->
<div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings mr-2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> Settings
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#notification" role="tab" aria-controls="notification" aria-selected="false">Notification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Security</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="account" role="tabpanel">
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" checked="" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Allow connected contacts</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" checked="" id="customSwitch2">
                            <label class="custom-control-label" for="customSwitch2">Confirm message requests</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" checked="" id="customSwitch3">
                            <label class="custom-control-label" for="customSwitch3">Profile privacy</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch4">
                            <label class="custom-control-label" for="customSwitch4">Developer mode options</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" checked="" id="customSwitch5">
                            <label class="custom-control-label" for="customSwitch5">Two-step security
                                verification</label>
                        </div>
                    </div>
                    <div class="tab-pane" id="notification" role="tabpanel">
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" checked="" id="customSwitch6">
                            <label class="custom-control-label" for="customSwitch6">Allow mobile notifications</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch7">
                            <label class="custom-control-label" for="customSwitch7">Notifications from your
                                friends</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch8">
                            <label class="custom-control-label" for="customSwitch8">Send notifications by email</label>
                        </div>
                    </div>
                    <div class="tab-pane" id="contact" role="tabpanel">
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch9">
                            <label class="custom-control-label" for="customSwitch9">Suggest changing passwords every
                                month.</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" checked="" id="customSwitch10">
                            <label class="custom-control-label" for="customSwitch10">Let me know about suspicious
                                entries to your account</label>
                        </div>
                        <div class="form-item">
                            <p>
                                <a class="btn btn-light" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Security Questions
                                </a>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Question 1">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Answer 1">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Question 2">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Answer 2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn_custom">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- ./ Setting modal -->

<!-- Edit profile modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg> Edit Profile
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#social-links" role="tab" aria-controls="social-links" aria-selected="false">Social Links</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="personal" role="tabpanel">
                        <form>
                            <div class="form-group">
                                <label for="fullname" class="col-form-label">Fullname</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="fullname">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Avatar</label>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <figure class="avatar mr-3 item-rtl">
                                            <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar8.png" class="rounded-circle" alt="image">
                                        </figure>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city" class="col-form-label">City</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="city" placeholder="Ex: Columbia">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-form-label">Phone</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="phone" placeholder="(555) 555 55 55">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="website" class="col-form-label">Website</label>
                                <input type="text" class="form-control" id="website" placeholder="https://">
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="about" role="tabpanel">
                        <form>
                            <div class="form-group">
                                <label for="about-text" class="col-form-label">Write a few words that describe
                                    you</label>
                                <textarea class="form-control" id="about-text"></textarea>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked="" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">View profile</label>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="social-links" role="tabpanel">
                        <form>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-facebook">
                                            <i class="ti-facebook"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-twitter">
                                            <i class="ti-twitter"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-instagram">
                                            <i class="ti-instagram"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-linkedin">
                                            <i class="ti-linkedin"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dribbble">
                                            <i class="ti-dribbble"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-youtube">
                                            <i class="ti-youtube"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-google">
                                            <i class="ti-google"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-whatsapp">
                                            <i class="fa fa-whatsapp"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn_custom">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- ./ Edit profile modal -->

<!-- Header -->
<header class="main-header pl-0">
    <div class="row aligncen">
        <div class="col-md-9">
    <div id="logo">
        <a href="http://lyrehtest.lyreh.com/">
            <img src="<?php echo base_url() ?>themes/front/images/logo.png" alt="logo" width="50px" style="margin-left: 2px;">
        </a>
    </div>
</div>
       
        <!-- <div class="row boxshadow "> -->
    <div class="col-lg-3" >
        <?php if(!empty($_GET['status'])){ ?>
        <?php if($_GET['status'] == 'unread'){ 

         ?>
        <a href="<?php echo base_url("Chat/chats"); ?>">
        <img src="<?php echo base_url() ?>uploads/filter.png" width="19px" class="sami">
        </a>
    <?php }
     }else{ ?>
        <a href="<?php echo base_url("Chat/chats?status=unread"); ?>">
        <img src="<?php echo base_url() ?>uploads/filter1.png" width="19px">
        </a>
    <?php } ?>
    </div>
</div>
<!-- </div> -->
    <div class="header-nav">
        <ul class="nav">
<!--             <li><a href="#" data-navigation-target="">Profile</a></li>
            <li><a href="#" data-navigation-target="friends">Friends</a></li>
            <li><a href="#" data-navigation-target="favorites">Favorites</a></li>
            <li><a href="#" data-navigation-target="archived">Archived</a></li> -->

            <!-- <li><a href="#" >Profile</a></li>
            <li><a href="#" >Friends</a></li>
            <li><a href="#">Favorites</a></li>
            <li><a href="#">Archived</a></li> -->
        </ul>
    </div>
    <div class="header-right">
        <div class="navbar-toggler">
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </a>
        </div>
        <?php if(!empty($toId)){ ?>
        <a href="<?php echo base_url("userlisting/").$toId ?>" class="navtognone">
                <span class="mr-2 d-none d-sm-inline-block"><?php 
                                $userNames = getUserName($toId);
                                $lastName = "";
                                $firstName = "";
                                if(!empty($userNames->first_name)){
                                    $firstName = $userNames->first_name;  
                                }
                                if(!empty($userNames->last_name)){
                                    $lastName = $userNames->last_name;  
                                }
                                echo $firstName." ".$lastName; ?></span>
                <figure class="avatar">
                    <img src="<?php echo base_url('uploads/').$userNames->user_image; ?>" class="rounded-circle" alt="image">
                </figure>
            </a>
            <?php } ?>
    </div>
</header>
<!-- ./ Header -->

<!-- Layout -->
<div class="layout">

    <!-- Content -->
    <div class="content">

        <!-- Chats sidebar -->
        <div id="chats" class="sidebar chat-list active">
            <header>
                <span>Chats</span>
            </header>
            <form>
                <input type="text" class="form-control searchChat" placeholder="Search">
            </form>
            <div class="sidebar-body" tabindex="2" style="overflow: hidden; outline: none;">
                <ul class="list-group list-group-flush sideChat">
                    <!-- <li class="list-group-item">
                        <figure class="avatar avatar-state-success">
                            <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar1.png" class="rounded-circle" alt="image">
                        </figure>
                        <div class="users-list-body">
                            <div>
                                <h5 class="text-primary">Townsend Seary</h5>
                                <p>What's up, how are you?</p>
                            </div>
                            <div class="users-list-action">
                                <div class="new-message-count">3</div>
                                <small class="text-primary">03:41 PM</small>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <figure class="avatar avatar-state-warning">
                            <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar2.png" class="rounded-circle" alt="image">
                        </figure>
                        <div class="users-list-body">
                            <div>
                                <h5 class="text-primary">Forest Kroch</h5>
                                <p>
                                    <i class="fa fa-camera mr-1"></i> Photo
                                </p>
                            </div>
                            <div class="users-list-action">
                                <div class="new-message-count">1</div>
                                <small class="text-primary">Yesterday</small>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item active-chat">
                        <div>
                            <figure class="avatar">
                                <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar3.png" class="rounded-circle" alt="image">
                            </figure>
                        </div>
                        <div class="users-list-body">
                            <div>
                                <h5>Byrom Guittet</h5>
                                <p>I sent you all the files. Good luck with =</p>
                            </div>
                            <div class="users-list-action">
                                <small class="text-muted">11:05 AM</small>
                                <div class="action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item btn-open-chat">Open</a>
                                            <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li> -->
                    <?php if(!empty($allConversation)){
                        foreach ($allConversation as $sideBar) {
                            
                            $userNames = getUserName($this->session->userdata('auth_user')[0]->id);
                            
                                $firstName = "";
                                $lastName = "";
                                
                                if(!empty($userNames->first_name)){
                                    $firstName = $userNames->first_name;
                                }
                                if(!empty($userNames->last_name)){
                                    $lastName = $userNames->last_name;
                                }
                            
                            
                               $fullName =  $firstName." ".$lastName;
                               $lastMessage = getLastMessage($sideBar->chatStartId);

 
           
                                   if(!empty($_GET['status'])){
                                       if($this->session->userdata('auth_user')[0]->id == $sideBar->userId && $sideBar->changeStatus == "unread"){ 

                                            $style = ""; 
                                         
                                        }else if($lastMessage->receiveId == $this->session->userdata('auth_user')[0]->id && $lastMessage->status == "unread"){ 
                                            $style = "";
                                        
                                        }else{ 
                                            $style = "style='display:none;'"; 
                                       } 
                                }else{
                                    $style = "";
                                }


                     ?>
                   <div class="fullName getParentUrl" fullName="<?php echo $fullName ?>" <?php echo $style; ?> > 
                 <?php //if(!empty($toId)){ 
                $lastMessage = getLastMessage($sideBar->chatStartId);
           if($this->session->userdata('auth_user')[0]->id == $sideBar->userId && $sideBar->changeStatus == "unread"){ $active = 1; 
          
        }else if($lastMessage->receiveId == $this->session->userdata('auth_user')[0]->id && $lastMessage->status == "unread"){ $active = 1; 
        
        }else{ $active = 0; 
        }     
                     
                     
                 if($active == 1 ){
    $status = "Read";
}else{
    $status = "Unread";
}
                 
                 ?>
                   <div class="action-toggle" style="">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            
                                            <a status='<?php echo $status; ?>' chatStartedId='<?php echo $sideBar->chatStartId ?>' href="javascript:;" class="dropdown-item changeChat"><?php echo $status; ?></a>
                                            
                                            <div class="dropdown-divider"></div>
                                            
                                            <a chatStartedId = '<?php echo $sideBar->chatStartId ?>' href="javascript:;" class="dropdown-item text-danger deleteChat">Delete</a>
                                            
                                        </div>
                                    </div>
                    </div>
                    <?php // } ?>
                    <li class="list-group-item getParentUrl" style="border-bottom: 1px solid rgba(0,0,0,.125) !important;border-top: none !important;">
                        <?php if(!empty($sideBar->productSlug)){
                            if($this->session->userdata('auth_user')[0]->id == $sideBar->fromId){
                                $toIds = $sideBar->toId;
                            }else{
                                $toIds = $sideBar->fromId;
                            }
                         ?>
                        <input type="hidden" class="chatUrl" value="<?php echo base_url('chat/').$sideBar->productSlug.'/'.$toIds; ?>">
                    <?php }else{ 
                        if($this->session->userdata('auth_user')[0]->id == $sideBar->fromId){
                                $toIds = $sideBar->toId;
                            }else{
                                $toIds = $sideBar->fromId;
                            }


                        ?>
                        <input type="hidden" class="chatUrl" value="<?php echo base_url('chat/profile').'/'.$toIds; ?>">
                    <?php } ?>
                        <input type="hidden" class="chatProductSlug" value="">

           <?php 
           
           if($this->session->userdata('auth_user')[0]->id == $sideBar->userId && $sideBar->changeStatus == "unread"){ $active = 1; ?>
           <i class="fa fa-circle" style="font-size:14px;"></i>
       <?php }else if($lastMessage->receiveId == $this->session->userdata('auth_user')[0]->id && $lastMessage->status == "unread"){ $active = 1; ?>
        <i class="fa fa-circle" style="font-size:14px;"></i>
       <?php }else{ $active = 0; ?>
       <?php } 
     $userNames = getUserName($toIds);
       ?>
                            <figure class="avatar getParentUrl">
                                <img src="<?php echo base_url('uploads/').$userNames->user_image; ?>" class="rounded-circle getParentUrl" alt="image">
                            </figure>
                        
                        <div class="users-list-body getParentUrl">
                            <div class="chatDiv getParentUrl">
                                <h5 class="chatName getParentUrl"><?php 
                                if($this->session->userdata('auth_user')[0]->id == $sideBar->fromId){
                                    $userId = $sideBar->toId;
                                }else{
                                    $userId = $sideBar->fromId;
                                }
                                // $userNames = getUserName($userId);
                                $lastName = "";
                                
                                if(!empty($userNames->first_name)){
                                    $firstName = $userNames->first_name;
                                }
                                if(!empty($userNames->last_name)){
                                    $lastName = $userNames->last_name;
                                }
                                echo $firstName." ".$lastName; 
                                 ?></h5>
                                <p class="getParentUrl" >
                                    <?php
                                    if (strpos($lastMessage->message, 'offer-sent') !== false) {
                                        echo "New Offer!!!";
                                    }else{  
                                        echo parse_smileys($lastMessage->message,base_url().'smileys');
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="users-list-action getParentUrl">
                                <?php if(!empty($sideBar->productSlug)){
                                     $imageDataSlug = getImageUrl($sideBar->productSlug);  
                                 ?>
                                <img class="getParentUrl" width="50" src="<?php if(!empty($imageDataSlug->item_image)){ echo base_url('uploads/item/').unserialize($imageDataSlug->item_image)[0]; } ?>">
                                <?php } ?>
                                <small class="text-muted getParentUrl"><?php echo time_elapsed_string($lastMessage->time); ?></small>

                                <!-- <div class="action-toggle" style="z-index: 9999999;position: absolute;">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-danger">Delete</a>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    
                    
                    </li>
               
<?php 


if($active == 1 ){
    $status = "Read";
}else{
    $status = "Unread";
}

 ?>
                    <!--<div class="action-toggle" style="">-->
                    <!--                <div class="dropdown">-->
                    <!--                    <a data-toggle="dropdown" href="#">-->
                    <!--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>-->
                    <!--                    </a>-->
                    <!--                    <div class="dropdown-menu dropdown-menu-right">-->
                    <!--                        <a status='<?php echo $status; ?>' chatStartedId='<?php echo $sideBar->chatStartId ?>' href="javascript:;" class="dropdown-item changeChat"><?php echo $status; ?></a>-->
                    <!--                        <div class="dropdown-divider"></div>-->
                    <!--                        <a chatStartedId = '<?php echo $sideBar->chatStartId ?>' href="javascript:;" class="dropdown-item text-danger deleteChat">Delete</a>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                </div>


          <?php } }else{ ?>
                  <?php if(!empty($_GET['status'])){  ?><b style="color: #808080a6;margin: 75px;">You have no unread messages.</b>
                  <?php } } ?>
                </ul>
            </div>
            <!-- <div class="p-3">
                <button  class="btn btn-block btn_custom" style="padding: 10px 10px 13px 10px;">New Chat</button>
                
            </div> -->
        </div>
        <input type="hidden" class="statusChat" value="<?php if(!empty($_GET['status'])){ echo "0"; }else{ echo "1"; } ?>">
        <!-- ./ Chats sidebar -->

        <!-- Friends sidebar -->
        <div id="friends" class="sidebar">
            <header>
                <span>Friends</span>
                <ul class="list-inline">
                    <li class="list-inline-item" data-toggle="tooltip" title="" data-original-title="Add friends">
                        <a class="btn btn-outline-light" href="#" data-toggle="modal" data-target="#addFriends">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-danger sidebar-close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </a>
                    </li>
                </ul>
            </header>
            <form>
                <input type="text" class="form-control" placeholder="Search">
            </form>
            <div class="sidebar-body" tabindex="3" style="overflow: hidden; outline: none;">
                <p>137 Friends</p>
                <div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar3.png" class="rounded-circle" alt="image">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Harrietta Souten</h5>
                                    <p>Dental Hygienist</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar avatar-state-warning">
                                    <span class="avatar-title bg-success rounded-circle">A</span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Aline McShee</h5>
                                    <p>Marketing Assistant</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar avatar-state-success">
                                    <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar8.png" class="rounded-circle" alt="image">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Brietta Blogg</h5>
                                    <p>Actuary</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar avatar-state-success">
                                    <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar6.png" class="rounded-circle" alt="image">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Karl Hubane</h5>
                                    <p>Chemical Engineer</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar5.png" class="rounded-circle" alt="image">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Jillana Tows</h5>
                                    <p>Project Manager</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar avatar-state-success">
                                    <span class="avatar-title bg-info rounded-circle">AD</span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Alina Derington</h5>
                                    <p>Nurse</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar avatar-state-secondary">
                                    <span class="avatar-title bg-warning rounded-circle">S</span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Stevy Kermeen</h5>
                                    <p>Associate Professor</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar1.png" class="rounded-circle" alt="image">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Stevy Kermeen</h5>
                                    <p>Senior Quality Engineer</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar7.png" class="rounded-circle" alt="image">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Gloriane Shimmans</h5>
                                    <p>Web Designer</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar avatar-state-warning">
                                    <span class="avatar-title bg-secondary rounded-circle">B</span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Bernhard Perrett</h5>
                                    <p>Software Engineer</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        <div id="ascrail2002" class="nicescroll-rails nicescroll-rails-vr" style="width: 4px; z-index: 999; cursor: default; position: absolute; top: 0px; left: -4px; height: 0px; display: none;"><div class="nicescroll-cursors" style="position: relative; top: 0px; float: right; width: 4px; height: 0px; background-color: rgba(66, 66, 66, 0.2); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div><div id="ascrail2002-hr" class="nicescroll-rails nicescroll-rails-hr" style="height: 4px; z-index: 999; top: -4px; left: 0px; position: absolute; cursor: default; display: none;"><div class="nicescroll-cursors" style="position: absolute; top: 0px; height: 4px; width: 0px; background-color: rgba(66, 66, 66, 0.2); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div></div>
        <!-- ./ Friends sidebar -->

        <!-- New chat sidebar -->
        <div id="new-chat" class="sidebar">
            <header>
                <span>New Chat</span>
                <ul class="list-inline">
                    <li class="list-inline-item" data-toggle="tooltip" title="" data-original-title="Create Group">
                        <a class="btn btn-outline-light" href="#" data-toggle="modal" data-target="#newGroup">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-danger sidebar-close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </a>
                    </li>
                </ul>
            </header>
            <form>
                <input type="text" class="form-control" placeholder="Search">
            </form>
            <div class="sidebar-body" tabindex="4" style="overflow: hidden; outline: none;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div>
                            <figure class="avatar">
                                <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar1.png" class="rounded-circle" alt="image">
                            </figure>
                        </div>
                        <div class="users-list-body">
                            <div>
                                <h5>Harrietta Souten</h5>
                                <p>Dental Hygienist</p>
                            </div>
                            <div class="users-list-action">
                                <div class="action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">New chat</a>
                                            <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-danger">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div>
                            <figure class="avatar avatar-state-warning">
                                <span class="avatar-title bg-success rounded-circle">A</span>
                            </figure>
                        </div>
                        <div class="users-list-body">
                            <div>
                                <h5>Aline McShee</h5>
                                <p>Marketing Assistant</p>
                            </div>
                            <div class="users-list-action">
                                <div class="action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">New chat</a>
                                            <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-danger">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div>
                            <figure class="avatar avatar-state-success">
                                <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar10.png" class="rounded-circle" alt="image">
                            </figure>
                        </div>
                        <div class="users-list-body">
                            <div>
                                <h5>Brietta Blogg</h5>
                                <p>Actuary</p>
                            </div>
                            <div class="users-list-action">
                                <div class="action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">New chat</a>
                                            <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-danger">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div>
                            <figure class="avatar avatar-state-success">
                                <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar5.png" class="rounded-circle" alt="image">
                            </figure>
                        </div>
                        <div class="users-list-body">
                            <div>
                                <h5>Karl Hubane</h5>
                                <p>Chemical Engineer</p>
                            </div>
                            <div class="users-list-action">
                                <div class="action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">New chat</a>
                                            <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-danger">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div>
                            <figure class="avatar">
                                <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar8.png" class="rounded-circle" alt="image">
                            </figure>
                        </div>
                        <div class="users-list-body">
                            <div>
                                <h5>Jillana Tows</h5>
                                <p>Project Manager</p>
                            </div>
                            <div class="users-list-action">
                                <div class="action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">New chat</a>
                                            <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-danger">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div>
                            <figure class="avatar avatar-state-success">
                                <span class="avatar-title bg-info rounded-circle">AD</span>
                            </figure>
                        </div>
                        <div class="users-list-body">
                            <div>
                                <h5>Alina Derington</h5>
                                <p>Nurse</p>
                            </div>
                            <div class="users-list-action">
                                <div class="action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">New chat</a>
                                            <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-danger">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div>
                            <figure class="avatar avatar-state-secondary">
                                <span class="avatar-title bg-warning rounded-circle">S</span>
                            </figure>
                        </div>
                        <div class="users-list-body">
                            <div>
                                <h5>Stevy Kermeen</h5>
                                <p>Associate Professor</p>
                            </div>
                            <div class="users-list-action">
                                <div class="action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">New chat</a>
                                            <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-danger">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div>
                            <figure class="avatar">
                                <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar7.png" class="rounded-circle" alt="image">
                            </figure>
                        </div>
                        <div class="users-list-body">
                            <div>
                                <h5>Stevy Kermeen</h5>
                                <p>Senior Quality Engineer</p>
                            </div>
                            <div class="users-list-action">
                                <div class="action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">New chat</a>
                                            <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-danger">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div>
                            <figure class="avatar">
                                <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar3.png" class="rounded-circle" alt="image">
                            </figure>
                        </div>
                        <div class="users-list-body">
                            <div>
                                <h5>Gloriane Shimmans</h5>
                                <p>Web Designer</p>
                            </div>
                            <div class="users-list-action">
                                <div class="action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">New chat</a>
                                            <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-danger">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div>
                            <figure class="avatar avatar-state-warning">
                                <span class="avatar-title bg-secondary rounded-circle">B</span>
                            </figure>
                        </div>
                        <div class="users-list-body">
                            <div>
                                <h5>Bernhard Perrett</h5>
                                <p>Software Engineer</p>
                            </div>
                            <div class="users-list-action">
                                <div class="action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">New chat</a>
                                            <a href="#" data-navigation-target="" class="dropdown-item">Profile</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-danger">Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        <div id="ascrail2003" class="nicescroll-rails nicescroll-rails-vr" style="width: 4px; z-index: 999; cursor: default; position: absolute; top: 147px; left: 316px; height: 390px; display: none; opacity: 0;"><div class="nicescroll-cursors" style="position: relative; top: 0px; float: right; width: 4px; height: 188px; background-color: rgba(66, 66, 66, 0.2); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div><div id="ascrail2003-hr" class="nicescroll-rails nicescroll-rails-hr" style="height: 4px; z-index: 999; top: 533px; left: 0px; position: absolute; cursor: default; display: none; width: 316px; opacity: 0;"><div class="nicescroll-cursors" style="position: absolute; top: 0px; height: 4px; width: 320px; background-color: rgba(66, 66, 66, 0.2); border: 0px; background-clip: padding-box; border-radius: 5px; left: 0px;"></div></div></div>
        <!-- ./ New chat sidebar -->

        <!-- Favorites sidebar -->
        <div id="favorites" class="sidebar">
            <header>
                <span>Favorites</span>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-danger sidebar-close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </a>
                    </li>
                </ul>
            </header>
            <form>
                <input type="text" class="form-control" placeholder="Search">
            </form>
            <div class="sidebar-body" tabindex="5" style="overflow: hidden; outline: none;">
                <ul class="list-group list-group-flush users-list">
                    <li class="list-group-item">
                        <div class="users-list-body">
                            <div>
                                <h5>Jennica Kindred</h5>
                                <p>I know how important this file is to you. You can trust me ;)</p>
                            </div>
                            <div class="users-list-action">
                                <div class="action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item btn-open-chat">Open</a>
                                            <a href="#" class="dropdown-item">Remove favorites</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="users-list-body">
                            <div>
                                <h5>Marvin Rohan</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                            </div>
                            <div class="users-list-action">
                                <div class="action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item btn-open-chat">Open</a>
                                            <a href="#" class="dropdown-item">Remove favorites</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="users-list-body">
                            <div>
                                <h5>Frans Hanscombe</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                            </div>
                            <div class="users-list-action">
                                <div class="action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item btn-open-chat">Open</a>
                                            <a href="#" class="dropdown-item">Remove favorites</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="users-list-body">
                            <div>
                                <h5>Karl Hubane</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                            </div>
                            <div class="users-list-action">
                                <div class="action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item btn-open-chat">Open</a>
                                            <a href="#" class="dropdown-item">Remove favorites</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        <div id="ascrail2004" class="nicescroll-rails nicescroll-rails-vr" style="width: 4px; z-index: 999; cursor: default; position: absolute; top: 0px; left: -4px; height: 0px; display: none;"><div class="nicescroll-cursors" style="position: relative; top: 0px; float: right; width: 4px; height: 0px; background-color: rgba(66, 66, 66, 0.2); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div><div id="ascrail2004-hr" class="nicescroll-rails nicescroll-rails-hr" style="height: 4px; z-index: 999; top: -4px; left: 0px; position: absolute; cursor: default; display: none;"><div class="nicescroll-cursors" style="position: absolute; top: 0px; height: 4px; width: 0px; background-color: rgba(66, 66, 66, 0.2); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div></div>
        <!-- ./ Stars sidebar -->

        <!-- Archived sidebar -->
        <div id="archived" class="sidebar">
            <header>
                <span>Archived</span>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-danger sidebar-close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </a>
                    </li>
                </ul>
            </header>
            <form>
                <input type="text" class="form-control" placeholder="Search">
            </form>
            <div class="sidebar-body" tabindex="6" style="overflow: hidden; outline: none;">
                <ul class="list-group list-group-flush users-list">
                    <li class="list-group-item">
                        <figure class="avatar">
                            <span class="avatar-title bg-danger rounded-circle">M</span>
                        </figure>
                        <div class="users-list-body">
                            <div>
                                <h5>Mercedes Pllu</h5>
                                <p>I know how important this file is to you. You can trust me ;)</p>
                            </div>
                            <div class="users-list-action">
                                <div class="action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item btn-open-chat">Open</a>
                                            <a href="#" class="dropdown-item">Restore</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <figure class="avatar">
                            <span class="avatar-title bg-secondary rounded-circle">R</span>
                        </figure>
                        <div class="users-list-body">
                            <div>
                                <h5>Rochelle Golley</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                            </div>
                            <div class="users-list-action">
                                <div class="action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item btn-open-chat">Open</a>
                                            <a href="#" class="dropdown-item">Restore</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        <div id="ascrail2005" class="nicescroll-rails nicescroll-rails-vr" style="width: 4px; z-index: 999; cursor: default; position: absolute; top: 0px; left: -4px; height: 0px; display: none;"><div class="nicescroll-cursors" style="position: relative; top: 0px; float: right; width: 4px; height: 0px; background-color: rgba(66, 66, 66, 0.2); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div><div id="ascrail2005-hr" class="nicescroll-rails nicescroll-rails-hr" style="height: 4px; z-index: 999; top: -4px; left: 0px; position: absolute; cursor: default; display: none;"><div class="nicescroll-cursors" style="position: absolute; top: 0px; height: 4px; width: 0px; background-color: rgba(66, 66, 66, 0.2); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div></div>
        <!-- ./ Archived sidebar -->

        <!-- Profile sidebar -->
        <div id="" class="sidebar">
            <header>
                <span>Profile</span>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-outline-light" data-toggle="modal" data-target="#editProfileModal" title="Edit profile">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-danger sidebar-close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </a>
                    </li>
                </ul>
            </header>
            <div class="sidebar-body" tabindex="7" style="overflow: hidden; outline: none;">
                <div class="text-center">
                    <figure class="avatar avatar-xl mb-4">
                        <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar3.png" class="rounded-circle" alt="image">
                    </figure>
                    <h5 class="mb-1">Mirabelle Tow</h5>
                    <small class="text-muted font-italic">Last seen: Today</small>
                    <ul class="nav nav-tabs justify-content-center mt-5" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Media</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <p class="text-muted">Lorem ipsum is a pseudo-Latin text used in web design, typography,
                            layout, and printing in place of English to emphasise design elements over content.
                            It's also called placeholder (or filler) text. It's a convenient tool for
                            mock-ups.</p>
                        <div class="mt-4 mb-4">
                            <h6>Phone</h6>
                            <p class="text-muted">(555) 555 55 55</p>
                        </div>
                        <div class="mt-4 mb-4">
                            <h6>City</h6>
                            <p class="text-muted">Germany / Berlin</p>
                        </div>
                        <div class="mt-4 mb-4">
                            <h6>Website</h6>
                            <p>
                                <a href="#">www.franshanscombe.com</a>
                            </p>
                        </div>
                        <div class="mt-4 mb-4">
                            <h6 class="mb-3">Social media accounts</h6>
                            <ul class="list-inline social-links">
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-sm btn-floating btn-facebook" data-toggle="tooltip" title="" data-original-title="Facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-sm btn-floating btn-twitter" data-toggle="tooltip" title="" data-original-title="Twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-sm btn-floating btn-whatsapp" data-toggle="tooltip" title="" data-original-title="Whatsapp">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-sm btn-floating btn-linkedin" data-toggle="tooltip" title="" data-original-title="Linkedin">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-sm btn-floating btn-google" data-toggle="tooltip" title="" data-original-title="Google">
                                        <i class="fa fa-google"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-sm btn-floating btn-instagram" data-toggle="tooltip" title="" data-original-title="Instagram">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-4 mb-4">
                            <h6 class="mb-3">Settings</h6>
                            <div class="form-group">
                                <div class="form-item custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch11">
                                    <label class="custom-control-label" for="customSwitch11">Block</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-item custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" checked="" id="customSwitch12">
                                    <label class="custom-control-label" for="customSwitch12">Mute</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-item custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch13">
                                    <label class="custom-control-label" for="customSwitch13">Get
                                        notification</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h6 class="mb-3 d-flex align-items-center justify-content-between">
                            <span>Recent Files</span>
                            <a href="#" class="btn btn-link small">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload mr-2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Upload
                            </a>
                        </h6>
                        <div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item pl-0 pr-0 d-flex align-items-center">
                                    <a href="#">
                                        <i class="fa fa-file-pdf-o text-danger mr-2"></i> report4221.pdf
                                    </a>
                                </li>
                                <li class="list-group-item pl-0 pr-0 d-flex align-items-center">
                                    <a href="#">
                                        <i class="fa fa-image text-muted mr-2"></i> avatar_image.png
                                    </a>
                                </li>
                                <li class="list-group-item pl-0 pr-0 d-flex align-items-center">
                                    <a href="#">
                                        <i class="fa fa-file-excel-o text-success mr-2"></i>
                                        excel_report_file2020.xlsx
                                    </a>
                                </li>
                                <li class="list-group-item pl-0 pr-0 d-flex align-items-center">
                                    <a href="#">
                                        <i class="fa fa-file-text-o text-warning mr-2"></i> articles342133.txt
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <div id="ascrail2006" class="nicescroll-rails nicescroll-rails-vr" style="width: 4px; z-index: 999; cursor: default; position: absolute; top: 0px; left: -4px; height: 0px; display: none;"><div class="nicescroll-cursors" style="position: relative; top: 0px; float: right; width: 4px; height: 0px; background-color: rgba(66, 66, 66, 0.2); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div><div id="ascrail2006-hr" class="nicescroll-rails nicescroll-rails-hr" style="height: 4px; z-index: 999; top: -4px; left: 0px; position: absolute; cursor: default; display: none;"><div class="nicescroll-cursors" style="position: absolute; top: 0px; height: 4px; width: 0px; background-color: rgba(66, 66, 66, 0.2); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div></div>
        <!-- Profile sidebar -->

        <!-- Chat -->
        <div class="chat">
            <div class="chat-body" tabindex="1" style="overflow: hidden; outline: none;">
            <?php if(!empty($itemsData)){ ?> 
                <div class="row aligncen" style="background-color: whitesmoke;padding: 10px;border-radius: 7px;margin-bottom: 18px;">
                    <div class="col-lg-2">
                        <?php if(!empty($imageDataSlug->item_image)){ ?>
                      <img src="<?php  echo base_url('uploads/item/').unserialize($itemsData->item_image)[0] ?>" width="130" height="100">  
                      <?php } ?>
                    </div>
                    <div class="col-lg-10">
                        <?php echo $itemsData->description; ?>
                    </div>
                </div>
            <?php } ?>

                <!-- .no-message -->
                <!--
                <div class="no-message-container">
                    <div class="row mb-5">
                        <div class="col-md-4 offset-md-4">
                            <img src="./dist/media/svg/undraw_empty_xct9.svg" class="img-fluid" alt="image">
                        </div>
                    </div>
                    <p class="lead">Select a chat to read messages</p>
                </div>
                -->
                <div class="messages">
                    <?php if(!empty($chatData)){
                        // echo "<pre>";print_r($chatData);exit;
                        $totalMessage = count($chatData);
                        ?>
                        <input type="hidden" class="totalMessages" value="<?php if(!empty($totalMessage)){ echo $totalMessage; } ?>">
                        <?php 
                        
                        foreach ($chatData as $chat) {
                            
                            // echo "<pre>";
                            // print_r($chat);
                            // echo "</pre>";
                           if($this->session->userdata('auth_user')[0]->id == $chat->fromId){ 
                               $userName = getUserName($chat->fromId);
                     ?>

                    <div class="message-item outgoing-message" id="<?php echo $chat->message; ?>">
                        <div class="message-avatar">
                            <figure class="avatar" >
                                <img src="<?php  echo base_url('uploads/').$userName->user_image; ?>" class="rounded-circle" alt="image">
                            </figure>
                        </div>
                        <div>
                            <?php if (strpos($chat->message, 'offer-sent') !== false) { ?>
                                          <div class="row">
                                        <div class="message-content colorback" >
                                            <?php $offerData = getOfferData($chat->message); ?>
                                            <h5>Offer Price : €<?php if(!empty($offerData->offerPrice)){ echo $offerData->offerPrice; } ?></h5> 
                                            <p><?php  
                                            if(!empty($offerData->offerMessage)){
                                                echo $offerData->offerMessage;
                                            }

                                            ?>
                                            </p>
                                            <p>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <?php if($offerData->offerStatus == "pending"){ ?>

                                                    <?php if($this->session->userdata('auth_user')[0]->id == $offerData->toId && $offerData->offerStatus != "accepted"){ ?>
  <button type="button" offerUniqueId="<?php echo $offerData->offerUniqueId; ?>" class="btn btn-success accept">Accept</button>
<?php  } ?>
  <button type="button" offerUniqueId="<?php echo $offerData->offerUniqueId; ?>" class="btn btn-danger decline">Decline</button>
<?php }else if($offerData->offerStatus == "accepted"){ ?>
<button type="button" class="btn btn-success accept" disabled="disabled">Accepted</button>
<?php
}else{ ?>

<button type="button" class="btn btn-danger decline" disabled="disabled">Declined</button>

<?php }

 ?>
</div>
                                            </p>
                                        </div>
                                    </div>          
                                   <?php }else{ 
                                ?>
                            <div class="message-content colorback" >
                                <?php echo parse_smileys($chat->message,base_url().'smileys'); ?>
                            </div>
                            <?php } ?>
                            <div class="time"><?php echo time_elapsed_string($chat->time); ?> </div>
                        </div>
                    </div>
                <?php }else{ 
                $userNamess = getUserName($chat->fromId);
                ?>
                    <div class="message-item" id="<?php echo $chat->message; ?>">
                        <div class="message-avatar">
                            <figure class="avatar" title="Byrom Guittet">
                                <img src="<?php echo base_url('uploads/').$userNamess->user_image; ?>" class="rounded-circle" alt="image">
                            </figure>
                        </div>
                        <div>
                            <?php if (strpos($chat->message, 'offer-sent') !== false) { ?>
                                    <div class="row">
                                        <div class="message-content colorback" >
                                            <?php $offerData = getOfferData($chat->message); ?>
                                            <h5>Offer Price : €<?php if(!empty($offerData->offerPrice)){ echo $offerData->offerPrice; } ?></h5> 
                                            <p><?php  
                                            if(!empty($offerData->offerMessage)){
                                                echo $offerData->offerMessage;
                                            }

                                            ?>
                                                


                                            </p>
                                            <p>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <?php if($offerData->offerStatus == "pending"){ ?>

                                                    <?php if($this->session->userdata('auth_user')[0]->id == $offerData->toId && $offerData->offerStatus != "accepted"){ ?>
  <button type="button" offerUniqueId="<?php echo $offerData->offerUniqueId; ?>" class="btn btn-success accept">Accept</button>
<?php  } ?>
  <button type="button" offerUniqueId="<?php echo $offerData->offerUniqueId; ?>" class="btn btn-danger decline">Decline</button>
<?php }else if($offerData->offerStatus == "accepted"){ ?>
<button type="button" class="btn btn-success accept" disabled="disabled">Accepted</button>
<?php
}else{ ?>

<button type="button" class="btn btn-danger decline" disabled="disabled">Declined</button>

<?php }

 ?>
 
</div>
                                            </p>
                                        </div>
                                    </div>                   
                                   <?php }else{ 
                                ?>

                            <div class="message-content colorback">
                                <?php echo parse_smileys($chat->message,base_url().'smileys'); ?>
                            </div>
                            <?php } ?>
                            <div class="time"><?php echo time_elapsed_string($chat->time); ?></div>
                        </div>
                    </div>
                <?php
                        }
                       $conversationId = $chat->chatStartId;
                    }                   
                }else{
                    ?>
                    <input type="hidden" class="totalMessages" value="0">
                    
                    <?php
                } 
                if(empty($fromId)){
                  $fromId = "";      
                }
                if(empty($toId)){
                  $toId = "";      
                }
                if(empty($slugs)){
                  $slugs = "";      
                }
                if(!empty($slugs)){
                    $type = 1;
                }else{
                    $type = 0;
                }
                if(empty($conversationId)){
                    $conversationId = "";
                }
                ?> 
                </div>
            </div>
            <?php echo $smiley_table; ?>
            <div class="chat-footer">
                <?php if(!empty($toId)){ ?>
                <div class="testting">
                    <div>
                        
                        <button class="btn btn-light mr-3 d-none d-sm-inline-block smileysButton" data-toggle="tooltip" title="" type="button" data-original-title="Emoji">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                        </button>
                        <button class="btn btn-danger mr-3 d-inline d-sm-none btn-close-chat" data-toggle="tooltip" title="" type="button" data-original-title="Emoji">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                        </button>
                    </div>
                    <input type="hidden" class="fromId" value="<?php echo $fromId; ?>">
                    <input type="hidden" class="toId" value="<?php echo $toId; ?>">
                    <input type="hidden" class="productSlug" value="<?php echo $slugs; ?>">
                    <input type="hidden" class="type" value="<?php echo $type; ?>">
                    <input type="hidden" class="conversationId" value="<?php echo $conversationId; ?>">
                    <input type="text" class="form-control height11 messagebox" id="messagebox" placeholder="Write a message." value="">
                    <div class="form-buttons ml-2">

                        <button class="btn btn_custom sendMsgButton" type="button">
                            <svg class="sendMsgButton" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon class="sendMsgButton" points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                        </button>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- ./ Chat -->

    
    <!-- ./ Content -->

<!-- ./ Layout -->

<!-- Bundle -->
<?php 
$loginUser = getUserName($this->session->userdata('auth_user')[0]->id);

?>

<!-- 
<div id="ascrail2000" class="nicescroll-rails nicescroll-rails-vr" style="width: 4px; z-index: auto; cursor: default; position: absolute; top: 60px; left: 1596px; height: 314px; opacity: 0; display: block;"><div class="nicescroll-cursors" style="position: relative; top: 0px; float: right; width: 4px; height: 42px; background-color: rgba(66, 66, 66, 0.2); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div><div id="ascrail2000-hr" class="nicescroll-rails nicescroll-rails-hr" style="height: 4px; z-index: auto; top: 370px; left: 450px; position: absolute; cursor: default; opacity: 0; display: none; width: 1146px;"><div class="nicescroll-cursors" style="position: absolute; top: 0px; height: 4px; width: 1150px; background-color: rgba(66, 66, 66, 0.2); border: 0px; background-clip: padding-box; border-radius: 5px; left: 0px;"></div></div><div id="ascrail2001" class="nicescroll-rails nicescroll-rails-vr" style="width: 4px; z-index: auto; cursor: default; position: absolute; top: 215px; left: 446px; height: 211px; opacity: 0; display: block;"><div class="nicescroll-cursors" style="position: relative; top: 0px; float: right; width: 4px; height: 46px; background-color: rgba(66, 66, 66, 0.2); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div><div id="ascrail2001-hr" class="nicescroll-rails nicescroll-rails-hr" style="height: 4px; z-index: auto; top: 422px; left: 0px; position: absolute; cursor: default; display: none; width: 446px; opacity: 0;"><div class="nicescroll-cursors" style="position: absolute; top: 0px; height: 4px; width: 450px; background-color: rgba(66, 66, 66, 0.2); border: 0px; background-clip: padding-box; border-radius: 5px; left: 0px;"></div></div> -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function(){
       
       <?php if(!empty($_GET["offer"])){ ?>
                var offer = "<?php echo $_GET["offer"] ?>";
                setTimeout(function(){ 
                    $(".chat-body").animate({ scrollTop: $("#"+offer)[0].scrollHeight-100}, 400);
                }, 400);
            <?php } ?>  

        // $("body").swiperight(function() {
        //     alert();    
        // });
        $("body").keypress(function(e){
            if($(e.target).is(".messagebox")){
                 var keycode = e.keyCode || e.which;
                    if(keycode == '13') {
                        var fromId = $(".fromId").val();
                var toId = $(".toId").val();
                var productSlug = $(".productSlug").val();
                var type = $(".type").val();
                var conversationId = $(".conversationId").val();
                var message = $(".messagebox").val();
                $(".messagebox").val(""); 
                if(message !== ""){ 
                    // var o = '<div class="message-item outgoing-message"><div class="message-avatar"> <figure class="avatar" title="Mirabelle Tow"> <img src="<?php echo base_url() ?>themes/chat/dist/images/avatar3.png" class="rounded-circle" alt="image"> </figure></div><div><div class="message-content">'+message+'</div><div class="time"><?php echo date("Y-m-d H:i:s"); ?></div></div></div>';

                    var sendMessage = '<div class="message-item outgoing-message"><div class="message-avatar"> <figure class="avatar" title="Mirabelle Tow"> <img src="<?php echo base_url('uploads/').$loginUser->user_image; ?>" class="rounded-circle" alt="image"> </figure></div><div><div class="message-content colorback" > '+message+'</div><div class="time"><?php echo time_elapsed_string(date("Y-m-d H:i:s")); ?></div></div></div>';
                    $(".messages").append(sendMessage);
                    $(".chat-body").animate({ scrollTop: $(".chat-body")[0].scrollHeight}, 1000);
                    $("table").hide();
                    var totalMessages = $(".totalMessages").val();
                     totalMessages = parseInt(totalMessages);
                     $(".totalMessages").val(totalMessages+1);
                 $.ajax({
                    url: '<?php echo base_url('Chat/insertChat'); ?>',
                    type: 'POST',
                    data: {
                        fromId : fromId,
                        toId : toId,
                        productSlug : productSlug,
                        type : type,
                        conversationId : conversationId,
                        message : message
                    },
                    
                    success: function(data) {
                       $(".conversationId").val(data);
                       sideChat();
                        // console.log(data);
                    }
                });
             }   
                    }
            }
        });
        $("body").click(function (e){
            if($(e.target).is(".getParentUrl")){
                //.children(".chatUrl").val()
                var chatUrl = $(e.target).closest(".list-group-item").children(".chatUrl").val();
                window.location.href = chatUrl;
            }
            if($(e.target).is(".changeChat")){
                status = $(e.target).attr("status");
                chatStartedId = $(e.target).attr("chatStartedId");
                statusChat = $(".statusChat").val(); 
                $.ajax({
                    url: '<?php echo base_url('Chat/changeStatus'); ?>',
                    type:'post',
                    data:{
                        status:status,
                        chatId:chatStartedId,
                        statusChat:statusChat
                    },

                    success: function(data) {
                        $(".sideChat").html(data);
                    }
                });
            }
            if($(e.target).is(".deleteChat")){
                chatStartedId = $(e.target).attr("chatStartedId");
                statusChat = $(".statusChat").val(); 
               $.ajax({
                    url: '<?php echo base_url('Chat/deleteChat'); ?>',
                    type:'post',
                    data:{
                        chatId:chatStartedId,
                        statusChat:statusChat
                    },

                    success: function(data) {
                        $(".sideChat").html(data);
                    }
                });
            }
            if($(e.target).is(".accept")){
                offerUniqueId = $(e.target).attr("offerUniqueId");
            if(offerUniqueId !== ""){
                $.LoadingOverlay("show");
            $.ajax({
                    url: '<?php echo base_url('Chat/offerStatus'); ?>',
                    type: 'POST',
                    data: {
                        offerUniqueId : offerUniqueId,
                        offerStatus : "accepted"
                    },
                    
                    success: function(data) {
                        $.LoadingOverlay("hide");
                        // window.location.href = "http://localhost/lyreh/cart";
                    }
                });
            }
            }
            if($(e.target).is(".decline")){
                 offerUniqueId = $(e.target).attr("offerUniqueId");
            if(offerUniqueId !== ""){
                $.LoadingOverlay("show");
            $.ajax({
                    url: '<?php echo base_url('Chat/offerStatus'); ?>',
                    type: 'POST',
                    data: {
                        offerUniqueId : offerUniqueId,
                        offerStatus : "declined"
                    },
                    
                    success: function(data) {
                        $.LoadingOverlay("hide");
                    }
                });
            }
            }
            <?php // echo base_url("Chat/changeStatus/").$status."/".$sideBar->chatStartId; ?>
            // if($(e.target).is(".sendMsgButton")){
            //     var fromId = $(".fromId").val();
            //     var toId = $(".toId").val();
            //     var productSlug = $(".productSlug").val();
            //     var type = $(".type").val();
            //     var conversationId = $(".conversationId").val();
            //     var message = $(".messagebox").val();
            //     $(".messagebox").val(""); 
            //     if(message !== ""){ 

            //         var sendMessage = '<div class="message-item outgoing-message"><div class="message-avatar"> <figure class="avatar" title="Mirabelle Tow"> <img src="<?php echo base_url() ?>uploads/sample_user.jpg" class="rounded-circle" alt="image"> </figure></div><div><div class="message-content"> '+message+'</div><div class="time"><?php echo time_elapsed_string(date("Y-m-d H:i:s")); ?></div></div></div>';
            //         $(".messages").append(sendMessage);
            //         $(".chat-body").animate({ scrollTop: $(".chat-body")[0].scrollHeight}, 1000);
            //         $("table").hide();
            //      $.ajax({
            //         url: '<?php echo base_url('Chat/insertChat'); ?>',
            //         type: 'POST',
            //         data: {
            //             fromId : fromId,
            //             toId : toId,
            //             productSlug : productSlug,
            //             type : type,
            //             conversationId : conversationId,
            //             message : message
            //         },
                    
            //         success: function(data) {
            //           $(".conversationId").val(data);
            //           sideChat();
            //             // console.log(data);
            //         }
            //     });
            //  }
            // }
        });
        // $(".accept").click(function(){
        //     offerUniqueId = $(this).attr("offerUniqueId");
        //     if(offerUniqueId !== ""){
        //         $.LoadingOverlay("show");
        //     $.ajax({
        //             url: '<?php echo base_url('Chat/offerStatus'); ?>',
        //             type: 'POST',
        //             data: {
        //                 offerUniqueId : offerUniqueId,
        //                 offerStatus : "accepted"
        //             },
                    
        //             success: function(data) {
        //                 $.LoadingOverlay("hide");
        //             }
        //         });
        //     }
        // });
        // $(".decline").click(function(){
        //     offerUniqueId = $(this).attr("offerUniqueId");
        //     if(offerUniqueId !== ""){
        //         $.LoadingOverlay("show");
        //     $.ajax({
        //             url: '<?php echo base_url('Chat/offerStatus'); ?>',
        //             type: 'POST',
        //             data: {
        //                 offerUniqueId : offerUniqueId,
        //                 offerStatus : "declined"
        //             },
                    
        //             success: function(data) {
        //                 $.LoadingOverlay("hide");
        //             }
        //         });
        //     }
        // });
        $(".sendMsgButton").click(function(){
                var fromId = $(".fromId").val();
                var toId = $(".toId").val();
                var productSlug = $(".productSlug").val();
                var type = $(".type").val();
                var conversationId = $(".conversationId").val();
                var message = $(".messagebox").val();
                $(".messagebox").val(""); 
                if(message !== ""){ 

                    var sendMessage = '<div class="message-item outgoing-message"><div class="message-avatar"> <figure class="avatar" title="Mirabelle Tow"> <img src="<?php echo base_url('uploads/').$loginUser->user_image; ?>" class="rounded-circle" alt="image"> </figure></div><div><div class="message-content"> '+message+'</div><div class="time"><?php echo time_elapsed_string(date("Y-m-d H:i:s")); ?></div></div></div>';
                    $(".messages").append(sendMessage);
                    $(".chat-body").animate({ scrollTop: $(".chat-body")[0].scrollHeight}, 1000);
                    $("table").hide();
                     var totalMessages = $(".totalMessages").val();
                     totalMessages = parseInt(totalMessages);
                     $(".totalMessages").val(totalMessages+1);
                 $.ajax({
                    url: '<?php echo base_url('Chat/insertChat'); ?>',
                    type: 'POST',
                    data: {
                        fromId : fromId,
                        toId : toId,
                        productSlug : productSlug,
                        type : type,
                        conversationId : conversationId,
                        message : message
                    },
                    
                    success: function(data) {
                       $(".conversationId").val(data);
                       sideChat();
                        // console.log(data);
                    }
                });
             }
           
        });
        setInterval(function(){ 
            var fromId = $(".fromId").val();
            var toId = $(".toId").val();
            var productSlug = $(".productSlug").val();
            var type = $(".type").val();
            var conversationId = $(".conversationId").val();
            var totalMessages = $(".totalMessages").val();
            // console.log(totalMessages);
            $.ajax({
                    url: '<?php echo base_url('Chat/receiveChat'); ?>',
                    type: 'POST',
                    data: {
                        fromId : fromId,
                        toId : toId,
                        productSlug : productSlug,
                        type : type,
                        conversationId : conversationId,
                        totalMessages: totalMessages
                    },
                    success: function(data) {
                   
                        if(data !== ""){
                            $(".messages").html(data);
                            $(".chat-body").animate({ scrollTop: $(".chat-body")[0].scrollHeight}, 1000);
                        }
                    }
                });
         }, 3000);
        
        
        // $(".list-group-item").on( "click", function() {
        //   var chatUrl = $(this).children(".chatUrl").val();
        //   window.location.href = chatUrl;
        // });
       
        setInterval(function(){
        var statusChat = $(".statusChat").val(); 
            $.ajax({
                    url: '<?php echo base_url('Chat/sideChat'); ?>',
                    type:'post',
                    data:{statusChat, statusChat},
                    success: function(data) {
                        $(".sideChat").html(data);
                    }
                });
         }, 6000);

    $(".searchChat").keyup(function() {
      var data = this.value.toLowerCase();
      var rows = $("div.fullName");
      if (data == '') {
        rows.show();
      } else {
        rows.hide();
        rows.filter(function () {
            return $(this).find('.chatName').text().toLowerCase().indexOf(data) > -1
        }).show();
      }
    });
    $(".smileysButton").click(function(){
        $("table").toggle();
        // if($("table").hasClass("tableHIde")){
        //     $("table").removeClass("tableHide");
        //     $("table").show();
        //     alert("if");
        // }else{
        //     alert("else");
        //     $("table").addClass("tableHide");
        //     $("table").hide();
        // }
    });

    });


    function sideChat(){
         var statusChat = jQuery(".statusChat").val();
        jQuery.ajax({
                    url: '<?php echo base_url('Chat/sideChat'); ?>',
                    data:{statusChat, statusChat},
                    type:"post",
                    success: function(data) {
                        $(".sideChat").html(data);
                    }
                });
    }


    // function getTotalCount(){
    //    jQuery.ajax({
    //                 url: '<?php echo base_url('Chat/totalConut'); ?>',
    //                 type: 'POST',
    //                 success: function(data) {
                        
    //                 }
    //             }); 
    // }


</script>