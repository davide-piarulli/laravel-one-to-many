@extends('layouts.admin')
@section('content')
  @include('admin.partials.content-header')

  {{-- stampo box con errori relativi ai campi --}}
  @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>
            {{ $error }}
          </li>
        @endforeach
      </ul>
    </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger" role="alert">
      {{ session('error') }}
    </div>
  @endif

  @if (session('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif

  <!-- card prossimi progetti -->
  <div class="card my-4 mx-2">
    <div class="card-header">
      <h2>Progetti</h2>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nome Progetto</th>
          <th scope="col">Link</th>
          <th scope="col">Tipo</th>
          <th scope="col">Descrizione</th>
          <th scope="col">Azioni</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($projects as $project)
          <tr>
            <form action="{{ route('admin.projects.update', $project) }}" method="POST"
              id="form-edit-{{ $project->id }}">
              @csrf
              @method('PUT')
              <th scope="row"><input type="text" value="{{ $project->title }}" name="title"></th>
              <td><input type="text" value="{{ $project->link }}" name="link"></td>
              <td><input type="text" value="{{ $project->type }}" name="type"></td>
              <td><input type="text" value="{{ $project->description }}" name="description"></td>
            </form>

            <td class="icons d-flex ">

              <button class="btn btn-warning me-3 " onclick="submitForm({{ $project->id }})">
                <i class="fa-solid fa-pencil"></i>
              </button>

              <form action="{{ route('admin.projects.destroy', $project) }}" method="post"
                onsubmit="return confirm('Sei sicuro di voler eliminare il progetto?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                  <i class="fa-solid fa-trash-can"></i>
                </button>
              </form>

            </td>
          </tr>
        @endforeach

      </tbody>
    </table>
    <div class="paginator">
      {{ $projects->links() }}

    </div>

  </div>
  <script>
    function submitForm(id) {
      const form = document.getElementById(`form-edit-${id}`);
      form.submit();
    }
  </script>
@endsection
