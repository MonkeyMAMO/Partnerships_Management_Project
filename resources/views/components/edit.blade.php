@extends('layouts.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/create.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10" style="margin-top: 30px">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">تحديث الشراكة</h5>
                        <form action="{{ route('par.update', $record->id) }}" method="POST">
                            @csrf
                            @method('PUT') <!-- Use PUT method for updating -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="partners" class="form-label">الطرف الشريك</label>
                                    <input type="text" class="form-control" id="partners" name="partners"
                                        value="{{ $record->partners }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="subject" class="form-label">الموضوع</label>
                                    <input type="text" class="form-control" id="subject" name="subject"
                                        value="{{ $record->subject }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="date" class="form-label">التاريخ</label>
                                    <input type="date" class="form-control" id="date" name="date"
                                        value="{{ $record->date }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="status" class="form-label">الحالة:</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="غير قابل للتمديد"
                                            {{ $record->status === 'غير قابل للتمديد' ? 'selected' : '' }}>
                                            غير قابل للتمديد</option>
                                        <option value="قابل للتمديد"
                                            {{ $record->status === 'قابل للتمديد' ? 'selected' : '' }}>
                                            قابل للتمديد
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="extension" class="form-label">عدد مرات التمديد :</label>
                                    <input type="text" class="form-control" id="extension" name="extension"
                                        value="{{ $record->extension }}" pattern="[0-9]*">
                                </div>
                                <div class="col-md-6">
                                    <label for="amount" class="form-label">المبلغ بالدرهم</label>
                                    <input type="text" class="form-control" id="amount" name="amount"
                                        value="{{ $record->amount }}" pattern="[0-9]+(\.[0-9]{1,2})?"
                                        title="المبلغ يجب أن يكون رقماً مع علامة عشرية واحدة على الأكثر">
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary w-100">تحديث</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('par.index') }}" class="btn btn-secondary w-100">إلغاء</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/create.js') }}"></script>
@endsection
