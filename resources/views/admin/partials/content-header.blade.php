<div class="content-header">
  <div class="row text-white d-flex h-100 align-content-center ">

    <div class="col-6 ">
      <div class="p-3">
        <h3 class="d-inline">Boolpress</h3>
      </div>
    </div>

    <div class="col-3 d-flex align-content-center h-100 py-3">
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


</div>
