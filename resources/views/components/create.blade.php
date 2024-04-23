@extends('layouts.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/create.css') }}">
    <div>
        <form action="{{ route('par.store') }}" method="POST">
            @csrf
            <div>
                <label for="partners">الطرف الشريك</label>
                <input type="text" name="partners" id="partners" required>
            </div>
            <div>
                <label for="subject">الموضوع</label>
                <input type="text" name="subject" id="subject" required>
            </div>
            <div>
                <label for="date">التاريخ</label>
                <input type="date" name="date" id="date" required>
            </div>
            <div>
                <label for="status">الحالة:</label>
                <select id="status" name="status" required>
                    <option value="غير قابل للتمديد">غير قابل للتمديد</option>
                    <option value="قابل للتمديد">قابل للتمديد</option>
                </select>
            </div>
            <div id="additionalextension" style="display: none;">
                <label for="extension">عدد مرات التمديد :</label>
                <input type="text" id="extension" name="extension" pattern="[0-9]*">
            </div>
            <div>
                <label for="amount">المبلغ بالدرهم</label>
                <input type="text" name="amount" id="amount" pattern="[0-9]+(\.[0-9]{1,2})?"
                    title="المبلغ يجب أن يكون رقماً مع علامة عشرية واحدة على الأكثر">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">إضافة</button>
                <button type="button" class="btn btn-secondary">إلغاء</button>
            </div>
        </form>
    </div>
    <script src="{{ asset('assets/js/create.js') }}"></script>
@endsection
