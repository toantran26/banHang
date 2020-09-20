@extends('backend.layout.app')

@section('title', 'Thêm  Loại sản phẩm')
@section('content')
    <h2><b>Thêm mới Loại sản phẩm</b></h2>
    @if (session('error'))
        <div class="alert alert-success" role="alert">
            <p style="color: red">{{ session('error') }}</p>
        </div>
    @endif
    <div class="form-row">
        <div class="col-sm-9" style="margin-left: 5%">
            <form action="{{route('loai-sanpham-store')}}" method="post" name="myForm">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="form-group">
                    <label for="inputAddress">Hãng / Nhà sản xuất </label>
                    <input type="text" class="form-control" name="nametypeproduct"  placeholder="Hãng / nhà sản xuất" value="{{ old('nametypeproduct') }}" required>
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('nametypeproduct') )
                            <span style="color: red">{{$errors->first('nametypeproduct')}}</span>
                        @endif
                    </small>
                </div>
                <button type="submit" class="btn btn-primary">Thêm Loại sản phẩm </button>
            </form>
        </div>
    </div>
@endsection
