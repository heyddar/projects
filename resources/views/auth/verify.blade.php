@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تایید آدرس ایمیل</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('یک لینک به ایمیل شما ارسال شد.') }}
                        </div>
                    @endif

                    {{ __('قبل از ادامه لطفا آدرس ایمیل حود را چک کنید.') }}
                    {{ __('اگر شما ایمیلی دریافت نکردید.') }}, <a href="{{ route('verification.resend') }}">برای درخواست دیگری اینجا کلیک کنید.</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
