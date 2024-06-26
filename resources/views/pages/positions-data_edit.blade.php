@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'data'])

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
        <h4 class="font-weight-bold">Data Jabatan</h4>
        <hr>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
        <h5 class="text-center font-weight-bold mb-3">Edit Jabatan</h5>
        <form action="{{ route('positions-data.update', ['position' => $position->id ]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="name">Nama:</label>
                  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $position->name }}" placeholder="Enter position name" required>
                </div>
                @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="description">Deskripsi:</label>
                  <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ $position->description }}" placeholder="Enter position description" required>
                </div>
                @error('description')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="min_year_exp_required">Minimal Pengalaman Dibutuhkan:</label>
                  <input type="number" name="min_year_exp_required" id="min_year_exp_required" class="form-control @error('min_year_exp_required') is-invalid @enderror" value="{{ $position->min_year_exp_required }}" placeholder="Enter minimal year experience required" required>
                </div>
                @error('min_year_exp_required')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="salary">Gaji:</label>
                  <input type="number" name="salary" id="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ $position->salary }}" placeholder="Enter position salary" required>
                </div>
                @error('salary')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="form-check">
                  <input type="hidden" name="open_for_recruitment" value="0">
                  <input type="checkbox" class="form-check-input @error('open_for_recruitment') is-invalid @enderror" id="open_for_recruitment" name="open_for_recruitment" value="1"  {{ $position->open_for_recruitment ? 'checked' : '' }}>
                  <label class="form-check-label" for="open_for_recruitment">Buka Lowongan Kerja</label>
                </div>
                @error('open_for_recruitment')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <button type="submit" class="btn btn-primary px-5">Simpan</button>
              </div>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>
@endsection
