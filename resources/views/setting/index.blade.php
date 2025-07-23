@extends('layouts.admin')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

@section('title', 'Settings')
@section('content')
    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light sticky-top">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Key</th>
                        <th scope="col">Value</th>
                        <th scope="col">Description</th>
                        <th scope="col" style="min-width: 100px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($settings as $index => $setting)
                        <tr>
                            <td>{{ $setting->id }}</td>
                            <td>{{ $setting->key }}</td>
                            <td>{{ $setting->value }}</td>
                            <td>{{ $setting->description }}</td>
                            <td class="td-actions text-right">
                                <div class="form-button-action">
                                    <button type="button" class="btn btn-link btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editSettingModal{{ $setting->id }}">
                                        <i class="fa fa-edit data"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editSettingModal{{ $setting->id }}" tabindex="-1"
                            aria-labelledby="editSettingModalLabel{{ $setting->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editSettingModalLabel{{ $setting->id }}">Edit Setting:
                                            {{ $setting->key }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('settings.update', $setting->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="key{{ $setting->id }}" class="form-label">Key</label>
                                                <input type="text" class="form-control" id="key{{ $setting->id }}"
                                                    value="{{ $setting->key }}" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="value{{ $setting->id }}" class="form-label">Value</label>
                                                <input type="text"
                                                    class="form-control @error('value') is-invalid @enderror"
                                                    id="value{{ $setting->id }}" name="value"
                                                    value="{{ old('value', $setting->value) }}">
                                                @error('value')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="description{{ $setting->id }}"
                                                    class="form-label">Description</label>
                                                <textarea class="form-control @error('description') is-invalid @enderror" id="description{{ $setting->id }}"
                                                    name="description">{{ old('description', $setting->description) }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="5">No settings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endpush
@endsection
