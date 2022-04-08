<?php $__env->startSection('content'); ?>
    <section class="grey page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-left">
                    <h1>Your account</h1>
                </div>
                <div class="col-md-6 text-right">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Courses</a></li>
                            <li class="active">Your account</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="white section">
        <div class="container">
            <div class="row">
                <div id="course-left-sidebar" class="col-md-3">
                    <div class="course-image-widget">
                        <img src="<?php echo $this_avatar; ?>" alt="" class="img-responsive">
                    </div>
                    <div class="course-meta">
                        <p><?php echo $this_username; ?></p>

                    </div>
                </div>
                <div id="course-content" class="col-md-9">
                    <div class="course-description">
                        <h3 class="course-title">Edit Profile</h3>
                        <div class="edit-profile">
                            <form method="post" role="form" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="action" value="alter" />
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" id="username" class="form-control"
                                        placeholder="<?php echo $this_username; ?>" <?php if (!$is_admin) {
    echo 'disabled';
} ?>>
                                </div>
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="fullname" id="fullname" class="form-control"
                                        placeholder="<?php echo $this_fullname; ?>" <?php if (!$is_admin) {
    echo 'disabled';
} ?>>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="<?php echo $this_email; ?>" <?php if (!$is_admin && !$owner) {
    echo 'disabled';
} ?>>
                                </div>
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        placeholder="<?php echo $this_phone; ?>" <?php if (!$is_admin && !$owner) {
    echo 'disabled';
} ?>>
                                </div>
                                <?php
                                echo $first_password;
                                echo $second_password;
                                echo $avatar_submit;
                                echo $messages;
                                ?>

                            </form>
                            <?php echo $sent_message; ?>
                        </div>
                    </div>
                    <hr class="invis">
                </div>
            </div>
            <hr class="invis">
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngcaobaolong/week6/resources/views/account.blade.php ENDPATH**/ ?>