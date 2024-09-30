<?php
@extends ("base")

@section("content")

    <h1> Se connecter </h1>
<div class="card">
    <div class="card-body">
    <form action="{{ route('auth.login') }}"method="post"class="vstack gap-3">

@endsection
