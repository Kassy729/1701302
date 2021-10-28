<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('자동차정보 수정') }}
        </h2>
    </x-slot>
    <div class="m-4 p-4">
        <form class="row g-3"
            action="{{ route('posts.update', ['post' => $post->id]) }}"
            method="POST"
            enctype="multipart/form-data">

        @method('patch')
        @csrf

            <div class="col-12 m-2">
                <div class="flex">
                    <img src="{{ '/storage/images/'.$post->image }}" class="card-img-top" alt="my post image" style="width: 18rem;">
                </div>
            </div>

            <div class="col-12 m-2">
                <label for="image" class="form-label">첨부 이미지</label>
                <input name="image" type="file" class="form-control" id="image">
            </div>

            <div class="col-12 m-2">
                <label for="company" class="form-label">제조회사</label>
                <input name="company" type="text" class="form-control" id="company" placeholder="제조회사 입력"
                value="{{ old('company') ? old('company') : $post->company}}">
                @error('company')
                <div class="text-red-500">
                    <span>{{ $message }}</span>
                </div>
                @enderror
                <!--validate 지정한것을 error 처리한다-->
            </div>

            <div class="col-12 m-2">
                <label for="car_name" class="form-label">자동차명</label>
                <input name="car_name" type="text" class="form-control" id="car_name" placeholder="자동차명 입력"
                value="{{ old('car_name') ? old('car_name') : $post->car_name}}">  <!--전에 작성한 정보 저장을 위해-->
                @error('car_name')
                <div class="text-red-500">
                    <span>{{ $message }}</span>
                </div>
                @enderror
                <!--validate 지정한것을 error 처리한다-->
            </div>

            <div class="col-12 m-2">
                <label for="year" class="form-label">제조년도</label>
                <input name="year" type="text" class="form-control" id="year" placeholder="제조년도 입력"
                value="{{ old('year') ? old('year') : $post->year}}">  <!--전에 작성한 정보 저장을 위해-->
                @error('year')
                <div class="text-red-500">
                    <span>{{ $message }}</span>
                </div>
                @enderror
                <!--validate 지정한것을 error 처리한다-->
            </div>

            <div class="col-12 m-2">
                <label for="price" class="form-label">가격</label>
                <input name="price" type="text" class="form-control" id="price" placeholder="가격 입력"
                value="{{ old('price') ? old('price') : $post->price}}">  <!--전에 작성한 정보 저장을 위해-->
                @error('price')
                <div class="text-red-500">
                    <span>{{ $message }}</span>
                </div>
                @enderror
                <!--validate 지정한것을 error 처리한다-->
            </div>

            <div class="col-12 m-2">
                <label for="car_kind" class="form-label">차종</label>
                <input name="car_kind" type="text" class="form-control" id="title" placeholder="차종 입력"
                value="{{ old('car_kind') ? old('car_kind') : $post->car_kind}}">  <!--전에 작성한 정보 저장을 위해-->
                @error('car_kind')
                <div class="text-red-500">
                    <span>{{ $message }}</span>
                </div>
                @enderror
                <!--validate 지정한것을 error 처리한다-->
            </div>

            <div class="col-12 m-2">
                <label for="car_appearnce" class="form-label">외형</label>
                <input name="car_appearnce" type="text" class="form-control" id="title" placeholder="외형 입력"
                value="{{ old('car_appearnce') ? old('car_appearnce') : $post->car_appearnce}}">  <!--전에 작성한 정보 저장을 위해-->
                @error('title')
                <div class="text-red-500">
                    <span>{{ $message }}</span>
                </div>
                @enderror
                <!--validate 지정한것을 error 처리한다-->
            </div>

            <div class="col-12 m-2">
            <button type="submit" class="btn btn-primary">작성</button>
            </div>
        </form>
    </div>
</x-app-layout>
