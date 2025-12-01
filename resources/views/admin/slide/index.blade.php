@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')
            <div class="col-md-9">
                <div class="card shadow-lg border-0" style="background: #121212; color: #fff;">
                    <div class="card-header border-bottom border-secondary bg-transparent py-3 d-flex justify-content-between align-items-center">
                        <h5 class="m-0 text-uppercase fw-bold" style="letter-spacing: 2px; color: #00f2ea;">
                            Carousel Slides //
                        </h5>
                        <a href="{{route('slide.create')}}" class="btn btn-sm btn-outline-light rounded-0 text-uppercase fw-bold px-4">
                            + New Slide
                        </a>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-dark table-hover mb-0 align-middle" style="background: transparent;">
                                <thead class="text-uppercase small text-muted border-bottom border-secondary">
                                <tr>
                                    <th class="py-3 ps-4" width="10%">Order</th>
                                    <th class="py-3" width="60%">Banner Preview</th>
                                    <th class="py-3 text-end pe-4">Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse($slides as $item)
                                    <tr>
                                        <td class="ps-4 fw-bold text-secondary">#{{$item->position}}</td>
                                        <td>
                                            <div class="p-1 border border-secondary bg-black d-inline-block">
                                                <img src="/img/slide/{{$item->img}}" class="img-fluid" style="max-width: 200px; height: auto; object-fit: cover;">
                                            </div>
                                            @if($item->phrase)
                                                <div class="small text-muted mt-2">{{ Str::limit($item->phrase, 50) }}</div>
                                            @endif
                                        </td>
                                        <td class="text-end pe-4">
                                            <div class="btn-group" role="group">
                                                <a href="{{route('slide.edit',$item->id)}}" class="btn btn-sm btn-outline-light rounded-0" title="Edit">
                                                    Edit
                                                </a>
                                                <form action="{{ route('slide.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-0 border-start-0" onclick="return confirm('Are you sure you want to delete this slide?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-5 text-muted">
                                            <div class="mb-2" style="font-size: 2rem; opacity: 0.3;">🖼️</div>
                                            No slides found. Add images to your carousel.
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
