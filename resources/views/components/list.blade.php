@extends('layouts.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/list.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <button onclick="window.location='{{ route('par.create') }}'" class="btn btn-primary mb-3 mb-md-0"
                    style="margin-top: 40px">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                        </svg> شراكة جديدة
                    </span>
                </button>
            </div>

            <h2 class="mb-0" style="font-weight: bold">شراكات أكاديمية جهة الداخلة وادي الذهب</h2>
            <div class="mt-12">
                <form action="" class="d-flex">
                    <input type="text" name="recherche" placeholder="تاريخ التوقيع" class="form-control me-2">
                    <button type="submit" class="btn btn-primary">بحث</button>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <caption></caption>
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col" class="align-middle text-center text-nowrap">رقم&nbsp;الشراكة</th>
                        <th scope="col" class="align-middle text-center text-nowrap">الطرف الشريك</th>
                        <th scope="col" class="align-middle text-center text-nowrap">الموضوع</th>
                        <th scope="col" class="align-middle text-center text-nowrap">تاريخ&nbsp;التوقيع</th>
                        <th scope="col" class="align-middle text-center text-nowrap">الحالة</th>
                        <th scope="col" class="align-middle text-center text-nowrap">المبلغ&nbsp;بالدرهم</th>
                        <th scope="col" class="align-middle text-center text-nowrap">خيارات</th>
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
                                    <span class="badge bg-danger">{{ $record->status }}</span>
                                @elseif ($record->status === 'قابل للتمديد')
                                    <span class="badge bg-success">{{ $record->status }} ({{ $record->extension }})</span>
                                @endif
                            </td>
                            <td>{{ $record->amount }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('par.edit', $record->id) }}" class="btn btn-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form id="deleteForm{{ $record->id }}"
                                        action="{{ route('par.destroy', $record->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete('{{ $record->id }}')"
                                            class="btn btn-danger ms-2"> <!-- Added margin-left -->
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
    <script>
        function confirmDelete(recordId) {
            if (confirm("هل أنت متأكد أنك تريد حذف هذا السجل؟")) {
                document.getElementById("deleteForm" + recordId).submit();
            }
        }
    </script>
@endsection
