@extends('layouts.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/list.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <div class="container">
        <h2>قائمة الشراكات</h2>
        <div></div>
        <div>
            <table class="table">
                <caption></caption>
                <thead>
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
                                    <a href="{{ route('par.edit', $record->id) }}" class="btn btn-link"
                                        style="padding: 0;"><i class="bi bi-pencil"></i></a>

                                    <form action="{{ route('par.destroy', $record->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link" style="padding: 0;"><i
                                                class="bi bi-trash"></i></button>
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
