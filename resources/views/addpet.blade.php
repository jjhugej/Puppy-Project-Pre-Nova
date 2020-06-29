@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
      <form action="http://puppyproject.test/pets/add" method="POST" enctype="multipart/form-data">
        @csrf
        <h1 class="has-text-centered">Add A Pet</h1>
        <div class="field">
          <label class="label">Name</label>
          <div class="control">
            <input name="name" class="input" type="text" placeholder="e.g Max" />
          </div>
        </div>
        <div class="field">
          <label class="label">Image</label>
          <div class="control">
            <input name="image" class="input" type="file" />
          </div>
        </div>
        <div class="field">
          <p class="control">
            <button type="submit">Submit</button>
          </p>
        </div>
      </form>
    </div>
  </section>
  @endsection