@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'salaries'])
@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
        <h4 class="font-weight-bold">Salaries</h4>
        <hr>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12 mb-3">
      <div class="bg-light text-dark card p-3 overflow-auto">
        <div class="d-flex justify-content-between">
          @if (collect($accesses)->where('menu_id', 7)->first()->status == 2)
            <a href="{{ route('salaries.create') }}" class="btn btn-outline-dark mb-3 w-25">
              <i class="fas fa-plus mr-1"></i>
                <span> Create</span>
            </a>
          @endif
          <a href="{{ route('salaries.print') }}" class="btn btn-outline-dark mb-3 w-25" target="_blank">
            <i class="fas fa-print mr-1"></i>
              <span> Print</span>
          </a>
        </div>

        @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif

        <table class="table table-light table-striped table-hover table-bordered text-center">
          <thead>
            <tr>
              <th scope="col" class="table-dark">#</th>
              <th scope="col" class="table-dark">Employee ID</th>
              <th scope="col" class="table-dark">Salary</th>
              <th scope="col" class="table-dark">Status</th>
              <th scope="col" class="table-dark">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($salaries as $salary)
            <tr>
              <th scope="row">{{ $loop->iteration + $salaries->firstItem() - 1 }}</th>
              <td class="w-25">{{ $salary->employee_id }}</td>
              <td class="w-25">{{ $salary->salary }}</td>
              <td class="w-25">{{ $salary->status }}</td>
              <td>
                <form action="{{ route('salaries.send', [$salary->id]) }}" method="POST" class="d-inline">
                  @csrf
                  @method('POST')
                  <button type="submit" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-paper-plane mr-1"></i>
                     Send
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $salaries->links() }}  
      </div>
    </div>
  </div>
</div>
@endsection
