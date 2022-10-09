@extends('AdminPageView.AdminPageViewTemplate.bodyadminpage')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row p-2 bg-light rounded align-items-center justify-content-center mx-0">
        <div class="row">
            <h1 class="my-2 fs-4 fw-bold text-center">LDK Syahid URL Shortener</h1>
            <form action="{{ route('url.shorten') }}" method="POST" class="my-2">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="url" class="form-control" placeholder="URL Shortener">
                    <button class="btn btn-outline-secondary" type="submit">Shorten</button>
                </div>
            </form>
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr class="small">
                        <th scope="col">#</th>
                        <th scope="col">URL Key</th>
                        <th scope="col">URL Destination</th>
                        <th scope="col">Short URL</th>
                        <th scope="col">Visitors</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($urls as $key => $item)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $item->url_key }}</td>
                        <td class="small"><a href="{{ $item->destination_url }}" target="_blank">{{ $item->destination_url }}</a></td>
                        <td><a href="{{ $item->default_short_url }}" target="_blank">{{ $item->default_short_url }}</a></td>
                        <td align="center">{{ $item->visits->count() }}</td>
                        <td>
                            <button type="button" class="btn btn-primary px-2" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $key }}"><i class="fa fa-edit"></i></button>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal-{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('update', $item->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="key" class="form-label">URL Key</label>
                                            <input type="text" name="url" value="{{ $item->url_key }}" class="form-control" id="key">
                                        </div>
                                        <div class="mb-3">
                                            <label for="destination" class="form-label">Destination URL</label>
                                            <input type="text" name="destination" value="{{ $item->destination_url }}" class="form-control" id="destination">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection
