<x-layout pageTitle="">

    <div class="container-md vh-100 register-container-size text-start fw-bold font-personal">
        <form class="mx-5 my-5 register-border-box" method="POST" action="{{route('revisorSignUpSubmit')}}" enctype="multipart/form-data">
            <h1 class="fs-2 text-start my-3 mb-2 ms-2">{{__('ux.revisorTitleMain')}}</h1>
            @csrf
            <div class="mt-3 mb-3 mx-2 font-sz">
                <label class="form-label mb-0 mx-0 font-sz register-hover">{{__('ux.revisorMail')}}</label>
                <input type="email" name="email" class="form-control register-hover">
            </div>
            <div class="mt-3 mb-3 mx-2 font-sz">
                <label class="form-label mb-0 mx-0 font-sz ">{{__('ux.revisorName')}}</label>
                <input type="string" name="user"
                    class="form-control register-hover">
            </div>
            <div class="mt-3 mb-3 mx-2 font-sz">
                <p class="form-label mb-0 mx-0 font-sz">{{__('ux.revisorStory')}}</p>
                <textarea class="mt-3 mb-3 mx-2 font-sz" name="description"
                    cols="50" rows="5">{{ old('description') }}</textarea>
            </div>
            <div class="mt-3 mb-3 mx-2 form-check">
                <input type="checkbox" required class="form-check-input">
                <label class="fw-light m-0 fs-6" for="exampleCheck1">{{__('ux.revisorTerms1')}}<span><a href="https://www.privacypolicies.com/live/39eb5fff-7b0a-4356-acda-954dbd2c127a" target="_blank" rel="noopener noreferrer">{{__('ux.revisorTerms2')}}</a></span></label>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-color mb-3 col-6 mx-auto"
                    style="width: 80%;">{{__('ux.revisorSendRequest')}}</button>
            </div>
        </form>
    </div>

    <!-- <form>      
        <input name="name" type="text" class="feedback-input" placeholder="Name" />   
        <input name="email" type="text" class="feedback-input" placeholder="Email" />
        <textarea name="text" class="feedback-input" placeholder="Comment"></textarea>
        <input type="submit" value="SUBMIT"/>
    </form> -->

</x-layout>
