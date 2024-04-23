@extends('layouts.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/create.css') }}">
    <div>
        <form action="{{ route('par.update', $record->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Use PUT method for updating -->
            <div>
                <label for="partners">الطرف الشريك</label>
                <input type="text" name="partners" id="partners" value="{{ $record->partners }}" required>
            </div>
            <div>
                <label for="subject">الموضوع</label>
                <input type="text" name="subject" id="subject" value="{{ $record->subject }}" required>
            </div>
            <div>
                <label for="date">التاريخ</label>
                <input type="date" name="date" id="date" value="{{ $record->date }}" required>
            </div>
            <div>
                <label for="status">الحالة:</label>
                <select id="status" name="status" required>
                    <option value="غير قابل للتمديد" {{ $record->status === 'غير قابل للتمديد' ? 'selected' : '' }}>
                        غير قابل للتمديد</option>
                    <option value="قابل للتمديد" {{ $record->status === 'قابل للتمديد' ? 'selected' : '' }}>
                        قابل للتمديد
                    </option>
                </select>
            </div>
            <div id="additionalextension"
                style="{{ $record->status === 'قابل للتمديد' ? 'display: block;' : 'display: none;' }}">
                <label for="extension">عدد مرات التمديد :</label>
                <input type="text" id="extension" name="extension" value="{{ $record->extension }}" pattern="[0-9]*">
            </div>
            <div>
                <label for="amount">المبلغ بالدرهم</label>
                <input type="text" name="amount" id="amount" value="{{ $record->amount }}"
                    pattern="[0-9]+(\.[0-9]{1,2})?" title="المبلغ يجب أن يكون رقماً مع علامة عشرية واحدة على الأكثر">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">تحديث</button>
                <a href="{{ route('par.index') }}" class="btn btn-secondary">إلغاء</a>
            </div>
        </form>
    </div>
    <script src="{{ asset('assets/js/create.js') }}"></script>
@endsection
