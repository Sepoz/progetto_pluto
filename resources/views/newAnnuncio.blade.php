<x-layout pageTitle="{{ $titlePage }}">

    <h1 class="text-center">{{__('ux.annuncioTitleMain')}}</h1>

	<div class="container">
		<div class="row">
			<div class="col-12">
				<form  class="mx-5 my-5" method="POST" action="{{route('newArticleSubmit')}}" enctype="multipart/form-data">
					@csrf
					
					{{-- creare un input con type hidden e con value il secret --}}
					<input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="mb-3">
								<label class="form-label">{{__('ux.annuncioTitle')}}</label>
								<input type="string" name="title" value="{{ old('title') }}"
									class="form-control @error('title') is-invalid @enderror">
								@error('title')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
					
							{{-- Menù a tendina per la selezione della categoria --}}
							<div class="mb-3">
								<label class="form-label">{{__('ux.annuncioCategory')}}</label>
								<select name="category">
									@foreach ($categories as $category)
										<option value="{{ $category->id }}">{{ $category->categoryName }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="mb-3">
								<label class="form-label">{{__('ux.annuncioDescription')}}</label>
								<textarea class="mb-3 @error('description') is-invalid @enderror" name="description" cols="30"
									rows="10">{{ old('description') }}</textarea>
								@error('description')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
					
							<div class="mb-3">
								<label class="form-label">{{__('ux.annuncioPrice')}}</label>
								<input class="form-control @error('price') is-invalid @enderror" type="text" name="price">
								@error('price')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							{{-- Dropzone --}}
							<div>
								<label for="images">{{__('ux.annuncioImages')}}</label>
								<div class="dropzone" id="drophere"></div>
							</div>
						</div>
					</div>
					<div class="row justify-content-center mt-3">
						<div class="col-4 text-center">
							<button type="submit" class="btn btn-primary btn-revisor btn-primary-revisor">{{__('ux.annuncioPost')}}</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-layout>
