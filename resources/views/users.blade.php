@extends('layouts.app')
@section('content')
    <section class="grey page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-left">
                    <h1>User list</h1>
                </div>
                <div class="col-md-6 text-right">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">User list</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="white section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h4>User list</h4>
                    </div>
                </div>
            </div>
            <hr class="invis">
            <div class="row">
                <div class="col-md-12">
                    <div id="bbpress-forums">
                        <ul class="bbp-forums">
                            <li class="bbp-header">

                                <ul class="forum-titles">
                                    <li class="bbp-forum-info">User</li>
                                    <li class="bbp-forum-freshness">Email</li>
                                    <?php if ($is_admin) {
                                        echo '<li><a class="btn btn-primary" href="users/adduser"><i class="fa"></i>Add user</a></li>';
                                    } ?>
                                </ul>
                            </li>
                            <!-- User list -->
                            <?php
                            echo $user_list;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
