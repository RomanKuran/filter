@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col s12">
      <div class="text-center">
        <h4 class="title-container">Apartments</h4>
      </div>
      <div class="alert alert-warning js-apartment-not-found d-none">
        <strong>Apartment not found!</strong>.
      </div>
      <apartment-filter></apartment-filter>
    </div>
  </div>
@endsection
