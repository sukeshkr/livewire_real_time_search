@extends('layouts.app')

@section('content')

<div>
    @livewire('student')
</div>

@endsection

@push('script')

<script>
    $(document).ready(function(){
        $('#studentModal').modal({
        backdrop: 'static',
        keyboard: false
        });
        $('#editStudentModal').modal({
        backdrop: 'static',
        keyboard: false
        });
    });
    </script>

<script>
    window.addEventListener('close-model', event => {
        $('#studentModal').modal('hide');
        $('#editStudentModal').modal('hide');
        $('#deleteStudentModal').modal('hide');

    })
</script>

@endpush
