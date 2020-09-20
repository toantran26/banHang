@extends('backend.layout.app')

@section('title', 'sửa sản phẩm')
@section('content')
    <h2><b>Sửa  sản phẩm</b></h2>
    @if (session('error'))
        <div class="alert alert-success" role="alert">
            <p style="color: red">{{ session('error') }}</p>
        </div>
    @endif
    <div class="form-row">
        <div class="col-sm-9" style="margin-left: 3%">
            <form action="{{route('sanpham-store')}}" method="post" name="myForm" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="form-group">
                    <label for="inputAddress">Mã sản phẩm </label>
                    <input type="text" class="form-control" name="id_sp" placeholder="mã sản phẩm" value="{{ old('id_sp') }}" required>
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('id_sp') )
                            <span style="color: red">{{$errors->first('id_sp')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="inputAddress"> Tên Sản Phẩm </label>
                    <input type="text" class="form-control" name="nameproduct"  placeholder="Tên sản phẩm"  value="{{ old('nameproduct', $getProductById['name']) }}" required>
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('nameproduct') )
                            <span style="color: red">{{$errors->first('nameproduct')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="inputState">Nhãn Hàng</label>
                    <select id="inputState" class="form-control" name="type_product_id">
                        <option selected>chọn hãng ...</option>
                        <?php foreach ($typeProducts as $typeProduct): ?>
                        <option value="{{$typeProduct['id']}}">{{$typeProduct['name_type_product']}}</option>
                        <?php endforeach ?>
                    </select>
                    <small class="form-text text-muted">
                        @if ($errors->has('type_product_id') )
                            <span style="color: red">{{$errors->first('type_product_id')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="inputState">loại sản phẩm</label>
                    <select id="inputState" class="form-control" name="category" required>
                        <option selected>chọn loại sản phẩm ...</option>
                        <option value="laptop">LapTop</option>
                        <option value="telephone">Điện Thoại</option>
                        <option value="camera">Máy Ảnh</option>
                    </select>
                    <small class="form-text text-muted">
                        @if ($errors->has('category') )
                            <span style="color: red">{{$errors->first('category')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="inputAddress"> Mô tả  Sản Phẩm </label>
                    <textarea type="text" class="form-control" name="description"  placeholder="mô tả sản phẩm" value="{{ old('description') }}" required>
                    </textarea>
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('description') )
                            <span style="color: red">{{$errors->first('description')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="inputAddress">giá </label>
                    <input type="number" class="form-control" min="0" name="price" placeholder="giá sản phẩm" value="{{ old('price') }}" required >
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('price') )
                            <span style="color: red">{{$errors->first('price')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group   mb-3 ">
                    <label for="inputAddress validationServer03"> giảm giá chiết khấu  </label>
                    <input type="text" class="form-control is-invalid" min="0" name="discount"  placeholder="lưu chiết khấu /giảm giá"  value="{{ old('discount') }}" required>
                    <div class="invalid-feedback">
                        @if ($errors->has('discount') )
                            <span style="color: red">{{$errors->first('discount')}}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress"> Số lượng sản phẩm  </label>
                    <input type="text" class="form-control" min="0" name="quantity"  placeholder=" số lượng sản phẩm"  value="{{ old('quantity') }}" required>
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('quantity') )
                            <span style="color: red">{{$errors->first('quantity')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1"> chọn ảnh sản phẩm </label>
                    <input type="file" name="img_link" class="form-control-file" id="exampleFormControlFile1" value="{{old('img_link')}}" required>
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('img_link') )
                            <span style="color: red">{{$errors->first('img_link')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="inputAddress"> lượt xem </label>
                    <input type="number" class="form-control" placeholder="lượt xem" min="0" name="views"  value="{{ old('views') }}" required>
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('views') )
                            <span style="color: red">{{$errors->first('views')}}</span>
                        @endif
                    </small>
                </div>
                <button type="submit" class="btn btn-primary">Thêm sản phẩm </button>
            </form>
        </div>
    </div>
@endsection
