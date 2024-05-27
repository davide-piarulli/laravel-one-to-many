@extends('layouts.admin')
@section('content')

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
    <div class="card-header d-flex">
      <div class="col align-content-center h-100 py-3">
        <h2>Progetti</h2>
      </div>
      <form action="{{ route('admin.projects.index') }}" method="GET" role="search">
        <div class="input-group w-100">
          <input type="search" name="toSearch" class="form-control" placeholder="Cerca progetto...">
          <button type="submit" class="input-group-text">Cerca</button>
        </div>
        </form>
      <div class="col d-flex align-content-center justify-content-center h-100 py-3">
        <p>Nuovo Progetto</p>
        <button class="dp-btn btn-primary" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
          <i class="fa-solid fa-plus"></i>
        </button>

        <!-- offcanvas -->
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
          aria-labelledby="offcanvasWithBothOptionsLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Inserisci un nuovo progetto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">



            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="title" class="form-label">Titolo Progetto (*)</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                      name="title" value="{{ old('title') }}">
                    @error('title')
                      <small class="text-danger">
                        {{ $message }}
                      </small>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="link" class="form-label">Link (*)</label>
                    <input type="text" class="form-control @error('link') is-invalid @enderror" id="link"
                      name="link" value="{{ old('link') }}">
                    @error('link')
                      <small class="text-danger">
                        {{ $message }}
                      </small>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="type" class="form-label">Tipo (*)</label>
                    <input type="text" class="form-control @error('type') is-invalid @enderror" id="type"
                      name="type" value="{{ old('type') }}">
                    @error('type')
                      <small class="text-danger">
                        {{ $message }}
                      </small>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                      name="image" value="{{ old('image') }}">
                    @error('image')
                      <small class="text-danger">
                        {{ $message }}
                      </small>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="5" value="">{{ old('description') }}</textarea>
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-primary">Aggiungi</button>
              <button type="reset" class="btn btn-warning">Svuota</button>
            </form>
          </div>
        </div>

      </div>

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
              <td><input type="text" value="{{ $project->type->name }}" name="type"></td>
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
