@extends('layouts.admin')
@section('content')
  <main>
    <!-- MAIN CONTENT -->
    <div class="main-content">

      <!-- content header -->
      @include('admin.partials.content-header')
      <!-- /content header -->

      <!-- CONTENT BODY -->
      <div class="content-body">

        <div class="row  debug">
          <h2>Qui ci potrebbero essere le statistiche</h2>
          @include('admin.partials.content-faq')
        </div>
        <!-- chiusura row -->

      </div>
      <!-- /CONTENT BODY -->

    </div>
    <!-- /MAIN CONTENT -->


  </main>
@endsection
