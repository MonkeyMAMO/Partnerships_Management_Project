@extends('layouts.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/list.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
            <button onclick="window.location='{{ route('par.create') }}'" class="btn btn-primary mb-3 mb-md-0"
                style="margin-top: 40px">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                    </svg> شراكة جديدة
                </span>
            </button>
            <h2 class="mb-0" style="font-weight: bold">شراكات مع أكاديمية جهة الداخلة وادي الذهب</h2>
        </div>
        <div class="table-responsive">
            <table class="table custom-table">
                <caption></caption>
                <thead class="custom-thead">
                    <tr>
                        <th scope="col">رقم الشراكة</th>
                        <th scope="col">الطرف الشريك</th>
                        <th scope="col">الموضوع</th>
                        <th scope="col">تاريخ التوقيع</th>
                        <th scope="col">الحالة</th>
                        <th scope="col">المبلغ بالدرهم</th>
                        <th scope="col">خيارات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>{{ $record->partners }}</td>
                            <td>{{ $record->subject }}</td>
                            <td>{{ $record->date }}</td>
                            <td>
                                @if ($record->status === 'غير قابل للتمديد')
                                    {{ $record->status }}
                                @elseif ($record->status === 'قابل للتمديد')
                                    ({{ $record->extension }})
                                    {{ $record->status }}
                                @endif
                            </td>
                            <td>{{ $record->amount }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('par.edit', $record->id) }}" class="btn btn-link">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('par.destroy', $record->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{ asset('assets/js/list.js') }}"></script>
@endsection
