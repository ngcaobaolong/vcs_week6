@extends('layouts.app')
@section('content')
    <section class="grey page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-left">
                    <h1>Homework</h1>
                    <?php echo $add_homework; ?>

                </div>
                <div class="col-md-6 text-right">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Courses</a></li>
                            <li class="active">Homework</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="white section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-6">
                    <?php echo $add_answer; ?>
                </div>
            </div>
        </div>
    </section>
@endsection
