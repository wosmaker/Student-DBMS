@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in! Your RoleID is {{ $role }}
                    @if ($role === 1)
                        <div>
                            <button onclick="window.location.href = 'regissubject';">REGISTER</button>
                        </div>
                    @endif

                    @if ($role === 2)
                    <div>
                            <button onclick="window.location.href = 'editsubject';">EDIT SUBJECT</button>
                    </div>
                    @endif
                    
                    <div>
                        <button onclick="window.location.href = 'problemreport';">PROBLEM REPORT</button>
                    </div>

                    <div>
                        <button onclick="window.location.href = 'confirmreceipt';">CONFIRM RECEIPT</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
