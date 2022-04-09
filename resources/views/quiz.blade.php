@extends('layouts.app')
@section('content')
<section class="grey page-title">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-left">
          <h1>Course Quiz Page</h1>
          <?php echo $add_quiz ?? ''?>
        </div>
        <div class="col-md-6 text-right">
          <div class="bread">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#">Courses</a></li>
              <li class="active">Course Quiz Page</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="white section">
    <div class="container">
      <div class="row">
        <div id="course-content" class="col-md-8">
          <div class="course-description">
            <h3 class="course-title">Quiz</h3>
            <div class="quiz-wrapper">
              <h4>Guess the Litery</h4>
              <?php echo session('alert');echo $submit; ?>
            </div>
            <hr class="invis">
          </div>
          <hr class="invis">
        </div>
      </div>
  </section>
@endsection
