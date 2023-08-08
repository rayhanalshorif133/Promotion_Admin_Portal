@extends('layouts.app')

@section('content')
    <div class="w-full mx-auto">
        <h2 class="text-3xl font-bold text-gray-700">Operator</h2>
    </div>

    <div class="w-8/12 mx-auto card">
        <div class="flex justify-between px-4 my-4">
            <h6>Operator's List</h6>
            <button class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#createOperator">
                Add Operator
            </button>
        </div>
        <div class="table-responsive">
            <table class="table px-2 pb-3 mb-0 align-items-center">
                <thead>
                    <tr>
                        <th class="text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($operators as $operator)
                    <tr>
                        <td class="text-center align-middle">
                            <p class="mb-0 text-xs font-weight-bold">{{ $loop->index + 1  }}</p>
                        </td>
                        <td class="text-center align-middle">
                            <p class="mb-0 text-xs font-weight-bold">{{ $operator->name }}</p>
                        </td>
                        <td class="text-sm text-center align-middle">
                            @if($operator->status == 'active')
                            <span class="badge badge-sm bg-gradient-success">
                                {{ $operator->status }}
                            </span>
                            @else
                            <span class="badge badge-sm bg-gradient-danger">
                                {{ $operator->status }}
                            </span>
                            @endif
                        </td>
                        <td class="text-center align-middle">
                            @include('operator.actionBtns',['id' => $operator->id])
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('operator.createAndUpdate')
@endsection

@push('scripts')
@endpush